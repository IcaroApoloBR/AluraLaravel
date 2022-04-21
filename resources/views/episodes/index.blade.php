@extends('layout')

@section('title')
    Episodes
@endsection

@section('content')
    <form action="">
        <ul class="list-group">
            @foreach($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-itens-center">
                    Episode {{ $episode->number }}
                    <input type ="checkbox">
                </li>
            @endforeach
        </ul>
        <button class="btn btn-primary mt-2 mb-2">Save</button>
    </form>
@endsection