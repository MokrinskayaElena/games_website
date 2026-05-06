<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesControllerApi extends Controller
{
    // public function updateProgress(Request $request)
    // {
    //     $user = auth()->user();
    //     if (!$user) {
    //         return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
    //     }

    //     $levelNumber = $request->input('level_number');

    //     // Предположим, у вас есть модель UserLevel
    //     UserLevel::updateOrCreate(
    //         ['user_id' => $user->id, 'level_number' => $levelNumber],
    //         ['updated_at' => now()]
    //     );

    //     return response()->json(['status' => 'success']);
    // }
}
