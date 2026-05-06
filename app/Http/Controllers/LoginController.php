<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Для аутентификации пользователей
use Illuminate\Http\RedirectResponse; // Для указания типа возвращаемого ответа при выходе из системы

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'], // Обязательное поле email в правильном формате
            'password' => ['required'], // Обязательное поле пароль
        ]);

        // Попытка входа 
        if (Auth::attempt($credentials)) {
            // Регистрация нового идентификатора сессии для защиты от атак "session fixation"
            $request->session()->regenerate();
            // Перенаправление пользователя 
            return redirect()->intended('login');
        }
        // Если аутентификация не удалась, возвращаем назад с ошибкой
        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->onlyInput('email', 'password'); // Сохраняем введенные email и пароль для формы
    }
    
    public function login(Request $request)
    {
        // Возвращаем представление формы логина, передавая текущего пользователя 
        return view('login', ['user' => Auth::user()]);
    }

    public function logout(Request $request): RedirectResponse
    {
        // Выход пользователя из системы
        Auth::logout();
        // Инвалидация текущей сессии для безопасности
        $request->session()->invalidate();
        // Генерация нового CSRF-токена для защиты формы
        $request->session()->regenerateToken();
        // Перенаправление на страницу входа
        return redirect('login');
    }
}
