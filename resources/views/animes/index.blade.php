@extends('layout')

@section('title')
    Anime List
@endsection

@section('content')
    <a href="/animes/criar" class="btn btn-dark mb-2">Add Animes to List</a>

    <ul class="list-group">
        @foreach ($animes as $anime)
            <li class="list-group-item"><?= $anime; ?></li>
        @endforeach
    </ul>
@endsection