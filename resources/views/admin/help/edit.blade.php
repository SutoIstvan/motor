@extends('adminlte::page')

@section('title', 'Márka szerkesztése')

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
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
        </div>
    @endif

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title mt-1">{{$help->title}} szerkesztése</h3>
        </div>
        <form action="{{ route('admin.help.update', $help) }}" method="POST" class="form-horizontal" >
            @csrf
            @method('PUT')
            <div class="card-body mt-3">
                <div class="form-group row">
                    <label for="help_label" class="col-sm-2 col-form-label">Név</label>
                    <div class="col-sm-10">
                        <input name="title" class="form-control" id="help" value="{{ $help->title }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        {{-- <textarea name="content" value="{{ $help->title }}" required></textarea> --}}

                        <textarea name="content" class="form-control" id="summernote" required>{{ $help->content }}</textarea>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Mentés</button>

                <a href="{{ route('admin.help.index') }}" class="btn btn-default float-right">
                    Mégse
                </a>

            </div>

        </form>
    </div>

    <script>
        $('#summernote').summernote({
             height: 200,
             lang: 'hu-HU',
             toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
         });
    </script>

@stop
