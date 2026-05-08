<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Support\Facades\Auth; // Для аутентификации пользователей
use Illuminate\Http\RedirectResponse; // Для указания типа возвращаемого ответа при выходе из системы

class GamesController extends Controller
{
    public function index()
    {
        $games = Game::all(); // Получить все записи из таблицы games
        return view('home', compact('games'));
    }
    public function getUserProgress(Request $request)
    {
        $user = $request->user(); // или по auth
        $lastLevel = $user->levels()->max('level_number');
        return response()->json(['lastLevel' => $lastLevel ?? 0]);
    }
    
    public function updateUserProgress(Request $request)
    {
        // Проверка авторизации
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Получение уровня из запроса
        $level = $request->input('level');
        // if (is_null($level)) {
            
        //     $level = 1; // или другое значение по умолчанию
        // }
        // Добавляем или обновляем уровень в таблице user_levels
        \App\Models\UserLevel::updateOrCreate(
            [
                'user_id' => $user->id,
                'level_id' => $level,
            ],
            [
                'updated_at' => now(),
            ]
        );

        return redirect()->route('level'); 
    }
    public function showLevels()
    {
        $userId = auth()->id();

        $completedLevels = \DB::table('user_levels')
            ->where('user_id', $userId)
            ->pluck('level_id')
            ->toArray();

        return view('level_three_in_row', [
            'completedLevels' => $completedLevels,
        ]);
    }

    // public function showStatistics()
    // {
    //     $userId = auth()->id(); // или другой способ получения текущего пользователя

    //     // Получение уровней и дат прохождения
    //    $levels = \DB::table('user_levels')
    //     ->where('user_id', $userId)
    //     ->select('level_id', 'created_at')
    //     ->get()
    //     ->map(function($item) {
    //         $item->created_at = \Illuminate\Support\Carbon::parse($item->created_at);
    //         return $item;
    //     });
    //     // Передача данных в представление
    //     return view('statistics', [
    //         'completedLevels' => $levels,
    //     ]);
    // }
    public function showStatistics()
    {
        $userId = auth()->id();

        $levels = \App\Models\UserLevel::with(['level.game'])
            ->where('user_id', $userId)
            ->get()
            ->map(function($userLevel) {
                return [
                    'level_id' => $userLevel->level->id,
                    'created_at' => $userLevel->created_at,
                    'game_name' => $userLevel->level->game->name,
                ];
            });

        return view('statistics', [
            'completedLevels' => $levels,
        ]);
    }
}
