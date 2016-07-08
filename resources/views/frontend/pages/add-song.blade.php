@extends('layout')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Dodaj piosenkę</h1>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open([
                    'role' => 'form',
                    'url' => action('FrontendController@saveSong'),
                    'method' => 'POST'
                ]) !!}
                    <div class="form-group">
                        <label>Tytuł piosenki</label>
                        <input type="text" class="form-control" name="title" placeholder="Tytuł">
                    </div>
                    <div class="form-group">
                        <label>Link na youtube</label>
                        <input type="text" class="form-control" name="sample" placeholder="Youtube link">
                    </div>
                    <div class="form-group">
                        <label for="words">Słowa piosenki</label>
                        <textarea name="words" id="words"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="chords">Chwyty</label>
                        <textarea name="chords" id="chords"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tagi</label><br/>
                        <input type="text" class="form-control" name="tags" placeholder="Dodaj tag.." data-role="tagsinput">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Dodaj</button>
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