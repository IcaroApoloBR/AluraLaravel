@extends('layout')

@section('title')
    Episodes
@endsection

@section('content')

@include('message', ['message' => $message])

    <form action="/temporadas/{{ $seasonId }}/episodios/assistir" method="POST">
        @csrf
        <ul class="list-group">
            @foreach($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-itens-center">
                    Episode {{ $episode->number }}
                    <input type ="checkbox" 
                        name="episodes[{{ $episode->id }}][assisted]" 
                        {{ $episode->assisted ? 'checked' : '' }}>
                </li>
            @endforeach
        </ul>
        <button class="btn btn-primary mt-2 mb-2">Save</button>
    </form>
@endsection