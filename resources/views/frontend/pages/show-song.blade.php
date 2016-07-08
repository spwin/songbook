@extends('layout')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 show-song">
                @if (Session::has('flash_notification.message'))
                    <div class="col-xs-12 no-padding">
                        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('flash_notification.message') }}
                        </div>
                    </div>
                @endif
                <h1>{{ $song->title }} <a href="{{ action('FrontendController@editSong', ['id' => $song->id]) }}" class="btn btn-default"><i class="fa fa-edit"></i> Edytuj</a></h1>
                <div class="youtube-preview">
                    @if($song->sample)
                        <iframe width="560" height="315" src="{{ str_replace("watch?v=", "v/", $song->sample) }}" frameborder="0" allowfullscreen></iframe>
                    @endif
                </div>
                @if($song->chords)
                    <h3>Chwyty</h3>
                    <div class="chords">
                        {!! $song->chords !!}
                    </div>
                @endif
                @if($song->words)
                    <h3>Tekst</h3>
                    <div class="words">
                        {!! $song->words !!}
                    </div>
                @endif
                @if($song->tags()->count() > 0)
                    <div class="tags">
                        <i class="fa fa-tags"></i>
                        @foreach($song->tags()->get() as $key => $tag)
                            <span>
                                {{ ($key != 0 ? ', ' : '') }}
                                <a href="{{ action('FrontendController@search', ['q' => $tag->name, 'type' => 'tag']) }}">{{ $tag->name }}</a>
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
    @include('footer')
@stop