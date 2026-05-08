@extends('layout')

@section('title', 'Игры')

@section('content')

<h2>Список всех игр </h2>

<a href="{{ route('level') }}" class="btn btn-secondary btn-sm me-2 mt-3" title="Три в ряд">
      <!-- <img class="images" src="images/Three_in_row.png" alt="Описание изображения"> -->
      <img class="images" src="{{ asset('images/Three_in_row.png') }}" alt="Описание изображения">
</a>

@endsection