@extends('layout')

@section('title', 'Три в ряд. Уровни')

@section('content')

<div id="score-container">
    <a href="{{ route('games') }}" class="btn btn-secondary btn-sm ml-2" title="Назад">
        <i class="fa fa-arrow-left"></i>
    </a>
<h2>Список уровней "Три в ряд" </h2>
</div>
  <div class= "level mt-3" id="levels-container">
    <button id="level1" class="btn btn-secondary btn-sm me-2" title="Первый уровень">
        <img class="images" src="{{ asset('images/Three_in_row1.png') }}" alt="Описание изображения"> 
        <!-- <br>Первый уровень -->
    </button>
    <button id="level2" class="btn btn-secondary btn-sm me-2" title="Второй уровень">
        <img class="images" src="{{ asset('images/Three_in_row2.png') }}" alt="Описание изображения"> 
        <!-- <br>Второй уровень -->
    </button>
    <button id="level3" class="btn btn-secondary btn-sm me-2" title="Третий уровень">
        <img class="images" src="{{ asset('images/Three_in_row3.png') }}" alt="Описание изображения"> 
        <!-- <br>Третий уровень -->
    </button>
</div>
@if(!empty($completedLevels))
    <h3>Пройденные уровни:</h3>
    <ul>
        @foreach($completedLevels as $level)
            <li>Уровень {{ $level }}</li>
        @endforeach
    </ul>
@else
    <p>Вы еще не прошли ни одного уровня.</p>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/levelsButtons.js') }}"></script>
<script>
    const routeThreeInRow = "http://f1265267.xsph.ru/games_website/public/index.php/three_in_row";
    // const routeThreeInRow = "{{ route('three_in_row') }}";
    document.addEventListener('DOMContentLoaded', function () {
        // Получаем массив пройденных уровней из Blade
        const completedLevels = @json($completedLevels);

        // Уровни нумеруются с 0
        const levels = [0, 1, 2];

        levels.forEach(level => {
            const button = document.getElementById('level' + (level + 1));
            // Проверяем, прошел ли предыдущий уровень (для уровня 0 - всегда доступен)
            if (level > 0 && !completedLevels.includes(level - 1)) {
                // Блокируем уровень, если предыдущий не пройден
                button.disabled = true;
            } else {
                // Разблокируем уровень
                button.disabled = false;
            }
        });
    });


</script>
@endsection