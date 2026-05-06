@extends('layout')

@section('title', 'Вход / Личный кабинет')

@section('content')
    @if($user)
        <div class="card p-4">
            <h2>Здравствуйте, {{ $user->name }}</h2>
            <a href="{{ route('logout') }}" class="btn btn-primary mt-3">Выйти из системы</a>
        </div>
    @else
        <div class="card p-4 mx-auto" style="max-width: 400px;">
            <h2 class="mb-4">Вход в систему</h2>
            <form method="post" action="{{ url('auth') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Введите email">
                    @error('email')
                        <div class="is-invalid">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Пароль</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Введите пароль">
                    @error('password')
                        <div class="is-invalid">{{ $message }}</div>
                    @enderror
                </div>
                @error('error')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary w-100 mb-3">Войти</button>
                <a href="{{ route('register') }}" class="btn btn-primary w-100">Перейти к регистрации</a>
            </form>
        </div>
    @endif
@endsection