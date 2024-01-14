@extends('adminlte::page')

@section('title', 'Címlap szerkesztése')

@section('css')
    <style>
        .note-btn.dropdown-toggle:after {
            content: none;
        }

        .note-dropdown-menu {
            min-width: 368px !important;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/lang/summernote-hu-HU.min.js"
        integrity="sha512-jGhbe/5rvn7nWezY4crH/Qys+oJxOHCv9ACxjyys/pHGN/wbsnQRzBFfe9rHiF5qHKtksFFQ6VljJLH8nfruMw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                <h3 class="card-title mt-1">Címlap szerkesztése</h3>
            </div>
            <form action="{{ route('admin.index.update', $index) }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="card-body mt-3">
                    <div class="form-group row">
                        <div class="col">
                            <input name="title" class="form-control" value="{{ $index->title }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input name="description" class="form-control" value="{{ $index->description }}" required>
                        </div>
                    </div>

                    {{-- SERVICE --}}
                    <div class="form-group row mt-3">
                        <div class="col">
                            <label>Szolgáltatássok</label>
                            <input name="service_title" class="form-control" value="{{ $index->service_title }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="service1" class="form-control" value="{{ $index->service1 }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="service2" class="form-control" value="{{ $index->service2 }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="service3" class="form-control" value="{{ $index->service3 }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="service4" class="form-control" value="{{ $index->service4 }}" required>
                            </div>
                        </div>
                    </div>

                    {{-- FEEDBACK --}}
                    <div class="form-group row mt-3">
                        <div class="col">
                            <label>Hozzászólások</label>
                            <input name="feedback_title" class="form-control" value="{{ $index->feedback_title }}"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input name="feedback1_name" class="form-control" value="{{ $index->feedback1_name }}" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input name="feedback2_name" class="form-control" value="{{ $index->feedback2_name }}" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input name="feedback3_name" class="form-control" value="{{ $index->feedback3_name }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <textarea name="feedback1" class="form-control" rows="3" required>{{ $index->feedback1 }} </textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <textarea name="feedback2" class="form-control" rows="3" required> {{ $index->feedback2 }} </textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <textarea name="feedback3" class="form-control" rows="3" required> {{ $index->feedback3 }} </textarea>
                            </div>
                        </div>
                    </div>


                    {{-- ABOUT --}}
                    <div class="form-group row mt-3">
                        <div class="col">
                            <label>Bemutatkozás</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="about_title" class="form-control" value="{{ $index->about_title }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="about1" class="form-control" value="{{ $index->about1 }}" required>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea name="about2" class="summernote" id="summernote" required>{{ $index->about2 }}</textarea>
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
    </script>
@stop
