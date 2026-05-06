<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 container py-3">
  <div class="container-fluid d-flex align-items-center flex-wrap">
    <!-- Кнопки с иконками -->
    <a href="{{ route('games') }}"  class="exitButton btn btn-secondary btn-sm me-2" title="Главная">
      <i class="fa fa-home"></i>
    </a>
    <a href="#" class="btn btn-secondary btn-sm " style="margin-left: -200px;" title="Категории">
      <i class="fa fa-list"></i> Категории
    </a>
    <!-- Поиск -->
    <form method="GET" action="#" class="d-flex flex-grow-1" style="max-width: 600px;">
      <div class="input-group w-100">
        <input type="text" class="form-control" placeholder="Поиск по играм" aria-label="Поиск" name="query" value="{{ request('query') }}">
        <button class="btn btn-outline-secondary" type="button" title="Настройки фильтров">
          <i class="fa fa-sliders"></i>
        </button>
        <button class="btn btn-primary" type="submit" title="Поиск">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </form>
    <!-- Профиль/вход -->
    <div class="d-flex ms-2">
      @if(Auth::check())
        <a href="{{ route('login') }}" class="exitButton btn btn-outline-primary" title="Профиль">
          <i class="fa fa-user"></i>
        </a>
      @else
        <a href="{{ route('login') }}" class="exitButton btn btn-outline-secondary" title="Войти">
          <i class="fa fa-sign-in"></i>
        </a>
      @endif
    </div>
  </div>
</nav>