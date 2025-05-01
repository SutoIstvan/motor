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

    <div class="pb-2">
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

                    <div class="icons">
                        <div class="form-group row">
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" value="fas fa-motorcycle"
                                {{ $help->ico == 'fas fa-motorcycle' ? 'checked' : '' }}>
                                <label for="customRadio1" class="custom-control-label"><i class="fas fa-motorcycle"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" value="fas fa-passport"
                                {{ $help->ico == 'fas fa-passport' ? 'checked' : '' }}>
                                <label for="customRadio2" class="custom-control-label"><i class="fas fa-passport"></i></label>
                            </div>

                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio3" name="customRadio" value="fas fa-vote-yea"
                                {{ $help->ico == 'fas fa-vote-yea' ? 'checked' : '' }}>
                                <label for="customRadio3" class="custom-control-label"><i class="fas fa-vote-yea"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio4" name="customRadio" value="fas fa-users"
                                {{ $help->ico == 'fas fa-users' ? 'checked' : '' }}>
                                <label for="customRadio4" class="custom-control-label"><i class="fas fa-users"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio5" name="customRadio" value="fas fa-university"
                                {{ $help->ico == 'fas fa-university' ? 'checked' : '' }}>
                                <label for="customRadio5" class="custom-control-label"><i class="fas fa-university"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio6" name="customRadio" value="fas fa-umbrella"
                                {{ $help->ico == 'fas fa-umbrella' ? 'checked' : '' }}>
                                <label for="customRadio6" class="custom-control-label"><i class="fas fa-umbrella"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio7" name="customRadio" value="fas fa-key"
                                {{ $help->ico == 'fas fa-key' ? 'checked' : '' }}>
                                <label for="customRadio7" class="custom-control-label"><i class="fas fa-key"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio8" name="customRadio" value="fas fa-file-alt"
                                {{ $help->ico == 'fas fa-file-alt' ? 'checked' : '' }}>
                                <label for="customRadio8" class="custom-control-label"><i class="fas fa-file-alt"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio9" name="customRadio" value="fas fa-tools"
                                {{ $help->ico == 'fas fa-tools' ? 'checked' : '' }}>
                                <label for="customRadio9" class="custom-control-label"><i class="fas fa-tools"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio10" name="customRadio" value="fas fa-money-bill-alt"
                                {{ $help->ico == 'fas fa-money-bill-alt' ? 'checked' : '' }}>
                                <label for="customRadio10" class="custom-control-label"><i class="fas fa-money-bill-alt"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio11" name="customRadio" value="fas fa-question-circle"
                                {{ $help->ico == 'fas fa-question-circle' ? 'checked' : '' }}>
                                <label for="customRadio11" class="custom-control-label"><i class="fas fa-question-circle"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio12" name="customRadio" value="fas fa-hands-helping"
                                {{ $help->ico == 'fas fa-hands-helping' ? 'checked' : '' }}>
                                <label for="customRadio12" class="custom-control-label"><i class="fas fa-hands-helping"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio13" name="customRadio" value="fas fa-info-circle"
                                {{ $help->ico == 'fas fa-info-circle' ? 'checked' : '' }}>
                                <label for="customRadio13" class="custom-control-label"><i class="fas fa-info-circle"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio14" name="customRadio" value="fas fa-file-invoice-dollar"
                                {{ $help->ico == 'fas fa-file-invoice-dollar' ? 'checked' : '' }}>
                                <label for="customRadio14" class="custom-control-label"><i class="fas fa-file-invoice-dollar"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio15" name="customRadio" value="fas fa-binoculars"
                                {{ $help->ico == 'fas fa-binoculars' ? 'checked' : '' }}>
                                <label for="customRadio15" class="custom-control-label"><i class="fas fa-binoculars"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio16" name="customRadio" value="fas fa-id-badge"
                                {{ $help->ico == 'fas fa-id-badge' ? 'checked' : '' }}>
                                <label for="customRadio16" class="custom-control-label"><i class="fas fa-id-badge"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio17" name="customRadio" value="fas fa-credit-card"
                                {{ $help->ico == 'fas fa-credit-card' ? 'checked' : '' }}>
                                <label for="customRadio17" class="custom-control-label"><i class="fas fa-credit-card"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio18" name="customRadio" value="fas fa-plus-square"
                                {{ $help->ico == 'fas fa-plus-square' ? 'checked' : '' }}>
                                <label for="customRadio18" class="custom-control-label"><i class="fas fa-plus-square"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio19" name="customRadio" value="fas fa-id-card"
                                {{ $help->ico == 'fas fa-id-card' ? 'checked' : '' }}>
                                <label for="customRadio19" class="custom-control-label"><i class="fas fa-id-card"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio20" name="customRadio" value="fas fa-lightbulb"
                                {{ $help->ico == 'fas fa-lightbulb' ? 'checked' : '' }}>
                                <label for="customRadio20" class="custom-control-label"><i class="fas fa-lightbulb"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio21" name="customRadio" value="fas fa-sliders-h"
                                {{ $help->ico == 'fas fa-sliders-h' ? 'checked' : '' }}>
                                <label for="customRadio21" class="custom-control-label"><i class="fas fa-sliders-h"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio22" name="customRadio" value="fas fa-paperclip"
                                {{ $help->ico == 'fas fa-paperclip' ? 'checked' : '' }}>
                                <label for="customRadio22" class="custom-control-label"><i class="fas fa-paperclip"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio23" name="customRadio" value="fas fa-globe-americas"
                                {{ $help->ico == 'fas fa-globe-americas' ? 'checked' : '' }}>
                                <label for="customRadio23" class="custom-control-label"><i class="fas fa-globe-americas"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio24" name="customRadio" value="fas fa-globe"
                                {{ $help->ico == 'fas fa-globe' ? 'checked' : '' }}>
                                <label for="customRadio24" class="custom-control-label"><i class="fas fa-globe"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio25" name="customRadio" value="fas fa-flag"
                                {{ $help->ico == 'fas fa-flag' ? 'checked' : '' }}>
                                <label for="customRadio25" class="custom-control-label"><i class="fas fa-flag"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio26" name="customRadio" value="fas fa-comments"
                                {{ $help->ico == 'fas fa-comments' ? 'checked' : '' }}>
                                <label for="customRadio26" class="custom-control-label"><i class="fas fa-comments"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio27" name="customRadio" value="fas fa-comment"
                                {{ $help->ico == 'fas fa-comment' ? 'checked' : '' }}>
                                <label for="customRadio27" class="custom-control-label"><i class="fas fa-comment"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio28" name="customRadio" value="fas fa-check-circle"
                                {{ $help->ico == 'fas fa-check-circle' ? 'checked' : '' }}>
                                <label for="customRadio28" class="custom-control-label"><i class="fas fa-check-circle"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio29" name="customRadio" value="fas fa-map-marked-alt"
                                {{ $help->ico == 'fas fa-map-marked-alt' ? 'checked' : '' }}>
                                <label for="customRadio29" class="custom-control-label"><i class="fas fa-map-marked-alt"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio30" name="customRadio" value="fas fa-hand-point-up"
                                {{ $help->ico == 'fas fa-hand-point-up' ? 'checked' : '' }}>
                                <label for="customRadio30" class="custom-control-label"><i class="fas fa-hand-point-up"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio31" name="customRadio" value="fas fa-box-open"
                                {{ $help->ico == 'fas fa-box-open' ? 'checked' : '' }}>
                                <label for="customRadio31" class="custom-control-label"><i class="fas fa-box-open"></i></label>
                            </div>
                            <div class="custom-control custom-radio ml-3 mt-2">
                                <input class="custom-control-input" type="radio" id="customRadio32" name="customRadio" value="fas fa-toolbox"
                                {{ $help->ico == 'fas fa-toolbox' ? 'checked' : '' }}>
                                <label for="customRadio32" class="custom-control-label"><i class="fas fa-toolbox"></i></label>
                            </div>
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
