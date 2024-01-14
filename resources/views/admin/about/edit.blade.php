@extends('adminlte::page')

@section('title', 'Bemutatkozás szerkesztése')

@section('css')
<style>
    .note-btn.dropdown-toggle:after {
        content: none;
    }
    .note-dropdown-menu {
        min-width: 368px !important;
    }
</style>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/lang/summernote-hu-HU.min.js" integrity="sha512-jGhbe/5rvn7nWezY4crH/Qys+oJxOHCv9ACxjyys/pHGN/wbsnQRzBFfe9rHiF5qHKtksFFQ6VljJLH8nfruMw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stop

@section('content_header')
<h3></h3>
@stop

@section('content')

    @error('help')
        <div class="callout callout-success">
            <p>{{ $message }}</p>
        </div>
    @enderror

    @if ($errors->any())
        <div class="alert alert-success">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
        </div>
    @endif

    <div class="pb-2">

    <div class="card card-secondary ">
        <div class="card-header">
            <h3 class="card-title mt-1">Bemutatkozás szerkesztése</h3>
        </div>
        <form action="{{ route('admin.about.update', $about ) }}" method="POST" class="form-horizontal" >
            @csrf
            @method('PUT')
            <div class="card-body mt-3">
                <div class="form-group row">
                    <div class="col">
                        <input name="title" class="form-control" id="help" value="{{ $about->title }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea name="content1" class="summernote" id="summernote"  required>{{ $about->content1 }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea name="content2" class="summernote2" id="summernote2" required>{{ $about->content2 }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea name="content3" class="summernote3" id="summernote3" required>{{ $about->content3 }}</textarea>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Mentés</button>

                <a href="{{ route('admin.index') }}" class="btn btn-default float-right">
                    Mégse
                </a>

            </div>

        </form>
    </div>
</div>


    <script>
        $('#summernote').summernote({
             height: 150,
             lang: 'hu-HU',
             toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
         });

         $('#summernote2').summernote({
             height: 150,
             lang: 'hu-HU',
             toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
         });

         $('#summernote3').summernote({
             height: 150,
             lang: 'hu-HU',
             toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
         });
    </script>

@stop
