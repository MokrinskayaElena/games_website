
@extends('layout')

@section('title', 'Три в ряд')

@section('content')

<div id="score-container">
<a  href="{{ route('level') }}" class="exitButton btn btn-secondary btn-sm ml-2" title="Назад">
     <i class="fa fa-arrow-left"></i>
</a>
<h2 id="levelTitle">"Три в ряд" Уровень: </h2>
</div>

<div id="score-container" style="justify-content: center;">
    <div style="text-align: center;">
        <a class="label">Ходов</a>
        <div class="score " id="move"></div>
  </div>
    <div style="text-align: center;">
        <a class="label">Необходимо</a>
        <div class="score">
            <a id="currentLevel"></a>
        </div>
  </div>
  <div style="text-align: center;">
        <a class="label">Полученно</a>
        <div class="score " id="score"></div>
  </div>
    
</div>
<!-- <button id="exitButton" class="btn btn-danger">Выйти</button> -->

<!-- Модальное окно победы-->
<div id="customMessageWin" class="customMessage"style="display: none;">
  <div class="message-content">
    
    <div id="messageTextWin"></div>

     <form method="post" action="{{ url('progress') }}">
      @csrf
      <input type="hidden" name="level" id="hiddenLevel" value="">
      <button type="submit" class="btn btn-primary w-100 mb-1 mt-3">Завершить</button>
    </form>

  </div>
</div>
<!-- Модальное окно поражения-->
<div id="customMessage" class="customMessage"style="display: none;">
  <div class="message-content">
    <span class="close-btn" id="closeMessage">&times;</span>
    <div id="messageText"></div>

     <button type="submit" id="reloadButton" class="btn btn-primary w-100 mb-1 mt-3">Заново</button>

  </div>
</div>

<!-- Окно подтверждения выхода -->
<div id="exitConfirm" class="customMessage" style="display: none;">
  <div class="message-content">
    <div id="exitMessage">Вы уверены, что хотите закончить игру?</div>
    <div style="margin-top: 20px;">
      <button id="confirmExit">Да</button>
      <button id="cancelExit">Отмена</button>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script>
// Код для получения уровня из URL и старта уровня
$(document).ready(function() {
    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    const levelParam = getQueryParam('level');
    const level = levelParam !== null ? parseInt(levelParam) : 0; // по умолчанию 0

      const currentLevel = levels[level] || levels[0];
     // Вывод уровня в заголовок
    // $('#levelTitle').text('Три в ряд: ' + level);
    $('#levelTitle').text('"Три в ряд" Уровень: ' + (level + 1));
    $('#currentLevel').text(' ' + currentLevel.requiredScore);
    $('#hiddenLevel').val(level);
    
    // Вызов  функции для запуска уровня
    startLevel(level);
});
const previousUrl = "{{ url()->previous() }}";


function showMessage(message) {
  const messageDiv = document.getElementById('customMessage');
  const messageText = document.getElementById('messageText');
  messageText.innerHTML = message;
  messageDiv.style.display = 'block';

  // Обработчик крестика
  document.getElementById('closeMessage').onclick = () => {
    messageDiv.style.display = 'none';
  };
}
// const previousUrl = "{{ route('progress') }}";

function endLevel(message, level) {
  showMessage(message);
  // После закрытия — переход
  document.getElementById('closeMessage').onclick = () => {
    document.getElementById('customMessage').style.display = 'none';
    // saveProgress(level); // сохраняем прогресс
    window.location.href = previousUrl;
  };
  document.getElementById('reloadButton').onclick = () => {
    document.getElementById('customMessage').style.display = 'none';
    location.reload();
  };
}
function endLevelWin(message, level) {
  const messageDiv = document.getElementById('customMessageWin');
  const messageText = document.getElementById('messageTextWin');
  messageText.innerHTML = message;
  messageDiv.style.display = 'block';

}

function showExitConfirmation(url) {
  document.getElementById('exitConfirm').style.display = 'block';
  document.body.style.overflow = 'hidden';

  document.getElementById('confirmExit').onclick = () => {
    // Пользователь подтвердил выход
    document.getElementById('exitConfirm').style.display = 'none';
    document.body.style.overflow = '';
    // window.location.href = previousUrl;
    window.location.href = url;
  };

  document.getElementById('cancelExit').onclick = () => {
    // Отмена, закрываем окно
    document.getElementById('exitConfirm').style.display = 'none';
    document.body.style.overflow = '';
  };
}
document.querySelectorAll('.exitButton').forEach(button => {
  button.addEventListener('click', (e) => {
    e.preventDefault();
    const url = e.currentTarget.href; // получаем адрес ссылки
    showExitConfirmation(url);
    // window.location.href = url;
  });
});
// document.getElementById('exitButton').addEventListener('click', (e) => {
//   e.preventDefault(); // Отменяем переход по ссылке  
//   showExitConfirmation();
// });
// // Обработчик для выхода
// document.getElementById('exitButton').addEventListener('click', () => {
//   showExitConfirmation();
// });

// window.addEventListener('beforeunload', function (e) {
//   e.preventDefault(); // Стандарт
//   e.returnValue = ''; // Стандартизированное сообщение (браузеры показывают свое окно)
// });

</script>

@endsection
