@extends('layout')

@section('title')
    My Anime List
@endsection

@section('content')

@if(!empty($message))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

    <a href="/animes/criar" class="btn btn-dark mt-2 mb-2">Add Animes to List</a>

    <ul class="list-group">
        @foreach ($animes as $anime)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                
                {{ $anime->name }}
                <span class="d-flex">
                    <a href="/animes/{{ $anime->id }}/temporadas" class="btn btn-info btn-sm m-2">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <form method="post" action="/animes/{{$anime->id}}"
                        onsubmit="return confirm('Are you sure you want to delete?')" >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm m-2"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
@endsection