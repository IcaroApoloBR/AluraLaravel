@extends('layout')

@section('title')
    Anime List
@endsection

@section('content')

@if(!empty($message))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

    <a href="/animes/criar" class="btn btn-dark mb-2">Add Animes to List</a>

    <ul class="list-group">
        @foreach ($animes as $anime)
            <li class="list-group-item">{{ $anime->name }}
                <form method="post" action="/animes/{{$anime->id}}"
                    onsubmit="return confirm('Tem certeza?')" >
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection