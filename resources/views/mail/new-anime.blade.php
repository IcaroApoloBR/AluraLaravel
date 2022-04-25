@component('mail::message')
# Introduction

The body of your message.
Anime {{$name}}
Seasons {{$qtdSeasons}}
Episodes {{$qtdEpisodes}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
