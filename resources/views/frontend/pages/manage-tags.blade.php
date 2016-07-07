@extends('layout')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Lista tagów</h1>
                <h3>Ilość: {{ count($tags) }}</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nazwa</th>
                        <th>Piosenek</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->songs()->count() }}</td>
                            <td class="w-180px">
                                <a href="{{ action('FrontendController@search', ['q' => $tag->name, 'type' => 'tag']) }}" class="btn btn-default"><i class="fa fa-search"></i> Pokaż piosenki</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop