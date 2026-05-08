@extends('layout')

@section('title', 'Статистика пользователя')

@section('content')

<div id="score-container">
    <a href="{{ route('login') }}" class="btn btn-secondary btn-sm ml-2" title="Назад">
        <i class="fa fa-arrow-left"></i>
    </a>
<h2>Статистика прохождений </h2>
</div>

@if(isset($completedLevels) && $completedLevels->count())
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>№</th>
                <th>Уровень</th>
                <th>Название игры</th>
                <th>Дата прохождения</th>
            </tr>
        </thead>
        <tbody>
            @foreach($completedLevels as $index => $level)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $level['level_id'] + 1 }}</td>
                <td>{{ $level['game_name'] }}</td>
                <td>{{ $level['created_at']->format('d.m.Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Пользователь не прошел уровни или уровень не сохранен.</p>
@endif

@endsection