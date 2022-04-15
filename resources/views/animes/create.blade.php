@extends('layout')

@section('title')
    Add Animes
@endsection

@section('content')
<div>
    <form method="POST">
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        
        <button type="submit" class="btn btn-primary mt-2">Add to List</button>
    </form>
</div>
@endsection