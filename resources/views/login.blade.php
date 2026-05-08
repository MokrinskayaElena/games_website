@extends('layout')

@section('title', 'Вход / Личный кабинет')

@section('content')
    @if($user)
        <div class="card p-4">
            <h1>Ваш профиль</h1>
            <section class="section">       
                <div class="between">
                    <div>
                        <div class="between">
                            <div class="section1">
                                <i class=' fa fa-user-circle-o ' style='font-size: 150px;'></i> <br>
                                <a href="#" class="btn btn-primary mt-3 px-4 d-block w-100"> <i class=' fa fa-cog'>  </i> Настройки</a><br>
                                <a href="#" class="btn btn-primary  px-4 d-block w-100"> <i class=' fa fa-lock'>  </i> Безопасность</a><br>
                                <a href="{{ route('logout') }}" class="btn btn-primary px-4 d-block w-100">Выйти из системы</a>
                            </div>
                            <div class="section2">
                                <h2> Информация о пользователе </h2>
                                <p>Здравствуйте, {{ $user->name }}</p>
                                <p>Ваша почта: {{ $user->email }}</p>
                                <p>Дата регистрации: {{ $user->created_at }}</p>
                                <div>
                                    <a href="#" class="btn btn-primary  px-4 d-flex align-items-center w-100"> <i class=' fa fa-heart-o fs-5 me-2'>  </i> Избранное</a><br>
                                    <a href="{{ route('statistics') }}" class="btn btn-primary  px-4 d-flex align-items-center w-100"> <i class=' fa fa-bar-chart-o fs-5 me-2'>  </i> Статистика прохождений</a><br>
                                </div>                   
                            </div>              
                        </div>
                    </div>     
                    <div class="section3">
                        <h2> Ваши карты </h2>
                        <i class='user fa fa-credit-card-alt ' style='font-size: 150px;'></i><br>
                        <a href="#" class="btn btn-primary mt-3 px-4 d-block w-100"> + Добавить способ оплаты </a><br>
                    </div>
                </div>        
            </section>
            <!-- <h2>Здравствуйте, {{ $user->name }}</h2>
            <a href="{{ route('logout') }}" class="btn btn-primary mt-3">Выйти из системы</a> -->
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