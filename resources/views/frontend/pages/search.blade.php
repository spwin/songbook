@extends('layout')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Rezultaty wyszukiwania ({{ count($songs) }})</h1>
                <h3>{{ $type == 'title' ? 'Tytuł: ' : 'Tag: ' }} {{ '"'.$q.'"' }}</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Tytuł</th>
                        <th>Link</th>
                        <th>Tagi</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($songs as $song)
                        <tr>
                            <td>{{ $song->title }}</td>
                            <td>
                                @if($song->sample)
                                    <a class="btn btn-default" href="{{ $song->sample }}" target="_blank"><i class="fa fa-youtube-play"></i></a>
                                @else
                                    Brak
                                @endif
                            </td>
                            <td>
                                <i class="fa fa-tags"></i>
                                @foreach($song->tags()->get() as $key => $tag)
                                    <span>
                                        {{ ($key != 0 ? ', ' : '') }}
                                        <a href="{{ action('FrontendController@search', ['q' => $tag->name, 'type' => 'tag']) }}">{{ $tag->name }}</a>
                                    </span>
                                @endforeach
                            </td>
                            <td class="w-200px">
                                <a href="{{ action('FrontendController@showSong', ['id' => $song->id]) }}" class="btn btn-default"><i class="fa fa-music"></i> Zobacz</a>
                                <a href="{{ action('FrontendController@editSong', ['id' => $song->id]) }}" class="btn btn-default"><i class="fa fa-edit"></i> Edytuj</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop