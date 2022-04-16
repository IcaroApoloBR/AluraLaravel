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
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        
        <button type="submit" class="btn btn-primary mt-2">Add to List</button>
    </form>
</div>
@endsection