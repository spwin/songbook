@extends('layout')
@section('content')
<header id="top" class="header">
    @if (Session::has('flash_notification.message'))
        <div class="col-xs-12 message-home no-padding">
            <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_notification.message') }}
            </div>
        </div>
    @endif
    <div class="text-vertical-center">
        <h1>Wyszukaj piosenkę</h1>
        {!! Form::open([
            'role' => 'form',
            'url' => action('FrontendController@search'),
            'method' => 'GET',
            'class' => 'homepage-form'
        ]) !!}
            <input class="search-input" name="q" type="text"><br>
            <div class="type-select">
                Szukaj według:
                <input type="radio" id="title" name="type" value="title" checked>
                <label for="title">tytułu</label>
                <input type="radio" id="tag" name="type" value="tag">
                <label for="tag">tagu</label>
            </div>
            <button type="submit" class="btn btn-dark btn-lg search-btn">Znajdź</button>
        {!! Form::close() !!}
    </div>
</header>
@stop