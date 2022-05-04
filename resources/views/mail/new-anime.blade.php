@component('mail::message')
# Hello bro, you added a new anime in your list.

Anime => {{$name}}<br>
Seasons => {{$qtdSeasons}}<br>
Episodes => {{$qtdEpisodes}}

@component('mail::button', ['url' => ''])
It's a simple Button
@endcomponent

Thanks, MyAnimeList clone<br>
{{ config('app.name') }}
@endcomponent
