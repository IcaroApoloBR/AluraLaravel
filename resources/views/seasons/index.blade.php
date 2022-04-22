@extends('layout')

@section('title')
    Seasons of {{ $anime->name }}
@endsection

@section('content')
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-itens-center">
                <a href="/temporadas/{{ $season->id }}/episodios">
                    Season {{ $season->number }}
                </a>
                <span class="badge bg-danger">
                    {{ $season->getEpisodesAssisted()->count() }} / {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
@endsection