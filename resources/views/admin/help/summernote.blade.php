@extends('adminlte::page')

@section('title', 'Kivitel')



@section('content_header')
    <h1>Márka</h1>
@stop

@section('content')

    <div class="row ">
        <div class="col-sm-4">
            <a href="{{ route('admin.brand.create') }}" class="btn btn-success mb-3">
                <i class="fas fa-plus-square"></i> Márka hozáadasa
            </a>
        </div>
        <div class="col-sm-8">
            @if (session('success'))

            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                {{ session('success') }}
            </div>

            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="conteiner">
                <div class="">
                    <h3 class="card-title">Márka lista</h3>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div id="summernote"></div>

        </div>
    </div>

    <script>
        $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 5',
        tabsize: 2,
        height: 100
        });
    </script>

@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@stop

@section('js')


@stop
