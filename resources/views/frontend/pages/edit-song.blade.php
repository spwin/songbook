@extends('layout')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if (Session::has('flash_notification.message'))
                    <div class="col-xs-12">
                        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('flash_notification.message') }}
                        </div>
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::model($song, [
                    'role' => 'form',
                    'url' => action('FrontendController@updateSong', ['id' => $song->id]),
                    'method' => 'POST'
                ]) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Tytuł piosenki') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Tytuł']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('sample', 'Link na youtube') !!}
                    {!! Form::text('sample', null, ['class' => 'form-control', 'placeholder' => 'Youtube link']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('words', 'Słowa piosenki') !!}
                    {!! Form::textarea('words') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('chords', 'Chwyty') !!}
                    {!! Form::textarea('chords') !!}
                </div>
                <div class="form-group">
                    <label>Tagi</label><br/>
                    <input type="text" value="{{ implode(', ', $song->tags()->lists('name')->toArray()) }}" class="form-control" name="tags" placeholder="Dodaj tag.." data-role="tagsinput">
                </div>
                <button type="submit" class="btn btn-default">Zapisz</button>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
    @include('footer')
@stop
@push('scripts')
<script src="{{ url()->to('/') }}/plugins/ckeditor/ckeditor.js"></script>
<script src="{{ url()->to('/') }}/js/bootstrap-tagsinput.js"></script>
<script>
    $(document).on('keyup keypress', '.bootstrap-tagsinput input[type="text"]', function(e) {
        if(e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });
    CKEDITOR.config.height = 200;
    CKEDITOR.config.width = 'auto';
    var words = CKEDITOR.document.getById( 'words' );
    CKEDITOR.replace( 'words' );

    var chords = CKEDITOR.document.getById( 'chords' );
    CKEDITOR.replace( 'chords' );
</script>
@endpush