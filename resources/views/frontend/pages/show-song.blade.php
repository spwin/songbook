@extends('layout')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 show-song">
                <h1>{{ $song->title }} <a href="{{ action('FrontendController@editSong', ['id' => $song->id]) }}" class="btn btn-default"><i class="fa fa-edit"></i> Edytuj</a></h1>
                <div class="youtube-preview">
                    @if($song->sample)
                        <iframe width="560" height="315" src="{{ str_replace("watch?v=", "v/", $song->sample) }}" frameborder="0" allowfullscreen></iframe>
                    @endif
                </div>
                <div class="words">
                    {!! $song->words !!}
                </div>
                <div class="chords">
                    {!! $song->chords !!}
                </div>
                <div class="tags">
                    <i class="fa fa-tags"></i>
                    @foreach($song->tags()->get() as $key => $tag)
                        <span>
                            {{ ($key != 0 ? ', ' : '') }}
                            <a href="{{ action('FrontendController@search', ['q' => $tag->name, 'type' => 'tag']) }}">{{ $tag->name }}</a>
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @include('footer')
@stop