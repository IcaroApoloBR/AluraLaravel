@extends('layout')

@section('title')
    Seasons of {{ $anime->name }}
@endsection

@section('content')

    @if($anime->picture)
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <a href="{{$anime->picture_url}}" target="_blank">
                    <img src="{{$anime->picture_url}}" class="img-thumbnail" height="400px" width="400px"/>
                </a>
            </div>
        </div>
    @endif

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