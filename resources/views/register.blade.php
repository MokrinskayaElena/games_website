@extends('layout')

@section('title', 'Регистрация')

@section('content')
<div class="card p-4 mx-auto" style="max-width: 400px;">
    <h2 class="mb-4">Регистрация</h2>
    <form method="post" action="{{ url('register') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Имя</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Введите имя">
            @error('name')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Введите email">
            @error('email')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" placeholder="Введите пароль">
            @error('password')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Подтверждение пароля</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Подтвердите пароль">
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-3">Зарегистрироваться</button>
        <a href="{{ route('login') }}" class="btn btn-primary w-100">Вернуться ко входу</a>
    </form>
</div>
@endsection