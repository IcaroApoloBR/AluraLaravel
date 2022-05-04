@extends('layout')

@section('title')
    Add Animes
@endsection

@section('content')
@include('errors', ['errors' => $errors])

    <form method="post" enctype="multipart/form-data">
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
        <div class="row">
            <div class="col col-12">
                <label for="picture">Picture</label>
                <input type="file" class="form-control" name="picture" id="picture">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Add to List</button>
    </form>
@endsection