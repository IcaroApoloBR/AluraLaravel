@extends('layout')

@section('title')
    My Anime List
@endsection

@section('content')

@include('message', ['message' => $message])

@auth
<a href="/animes/criar" class="btn btn-dark mb-4">Add Animes to List</a>
@endauth

    <ul class="list-group">
        @foreach ($animes as $anime)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <img src="{{$anime->picture_url}}" class="img-thumbnail" height="100px" width="100px"/>
                    <span id="name-anime-{{ $anime->id }}">{{ $anime->name }}</span>
                </div>

                <div class="input-group w-50" hidden id="input-name-anime-{{ $anime->id }}">
                    <input type="text" class="form-control" value="{{ $anime->name }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editAnime({{ $anime->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>
                
                <span class="d-flex">
                    @auth
                    <button class="btn btn-info btn-sm m-1" onclick="toggleInput({{ $anime->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                    @endauth

                    <a href="/animes/{{ $anime->id }}/temporadas" class="btn btn-info btn-sm m-1">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    @auth
                    <form method="post" action="/animes/{{$anime->id}}"
                        onsubmit="return confirm('Are you sure you want to delete?')" >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm m-1"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                    @endauth
                </span>
            </li>
        @endforeach
    </ul>
<script>
    function toggleInput(animeId) {
        const nameAnimeEl = document.getElementById(`name-anime-${animeId}`);
        const inputAnimeEl = document.getElementById(`input-name-anime-${animeId}`);
        if (nameAnimeEl.hasAttribute('hidden')) {
            nameAnimeEl.removeAttribute('hidden');
            inputAnimeEl.hidden = true;
        } else {
            inputAnimeEl.removeAttribute('hidden');
            nameAnimeEl.hidden = true;
        }
    }

    function editAnime(animeId) {
        let formData = new FormData();
        const name = document.querySelector(`#input-name-anime-${animeId} > input`).value;
        const token = document.querySelector(`input[name="_token"]`).value;
        formData.append('name', name);
        formData.append('_token', token);

        const url = `/animes/${animeId}/editarNome`;
        fetch(url, {
            method: 'POST',
            body: formData,
        }).then(() => {
            toggleInput(animeId);
            document.getElementById(`name-anime-${animeId}`).textContent = name;
        });
    }
</script>
@endsection