@extends('layout')

@section('title')
    Add Animes
@endsection

@section('content')
<div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="col col-2">
                <label for="qtd_seasons">Nº Seasons</label>
                <input type="number" class="form-control" name="qtd_seasons" id="qtd_seasons">
            </div>

            <div class="col col-2">
                <label for="episodes_season">Episodes</label>
                <input type="number" class="form-control" name="episodes_season" id="episodes_season">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Add to List</button>
    </form>
</div>
@endsection