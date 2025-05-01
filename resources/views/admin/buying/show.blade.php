@extends('adminlte::page')

@section('title', 'Motor Felvásárlása')



@section('content_header')
    {{-- <h1>Motor</h1> --}}
@stop

@section('content')

    <div class="row ">

        <div class="col-sm-8 mt-3">
            @if (session('success'))

            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}
            </div>

            @endif
        </div>
    </div>


    @if ($buying)

    
    <div class="card">
        <div class="card-header">
            <div class="conteiner">
                <div class="">
                    <h3 class="card-title">Felvásárlás</h3>
                </div>

            </div>
        </div>

        <div class="card-body row">
            <div class="col-md-4">
                <b>Nev:</b> {{$buying->name}}
            </div>
            <div class="col-md-4">
                <b>Tel:</b> {{$buying->tel}}
            </div>
            <div class="col-md-4">
                <b>Email:</b> {{$buying->email}}
            </div>
        </div>

        <hr class="p-0 m-0">

        <div class="card-body row">
            <div class="col-md-4">
                <b>Gyártmány:</b> {{$buying->gyartmany}}
            </div>
            <div class="col-md-4">
                <b>Tipus:</b> {{$buying->tipus}}
            </div>
            <div class="col-md-4">
                <b>Km:</b> {{$buying->km}}
            </div>
        </div>

        <hr class="p-0 m-0">

        <div class="card-body row">
            <div class="col-md-4">
                <b>Állapot:</b> {{$buying->allapot}}
            </div>
            <div class="col-md-4">
                <b>Évjárat:</b> {{$buying->ev}}
            </div>
            <div class="col-md-4">
                <b>Irányár:</b> {{$buying->ar}}
            </div>
        </div>

        <hr class="p-0 m-0">

        <div class="card-body row">
            <div class="col-md-12">
                <b>Egyéb opciók, leírások:</b> {{$buying->leiras}}
            </div>
        </div>

        <hr class="p-0 m-0">

        <div class="card-body row">
            <div class="col-md-6">
                <b>Okmányok jellege:</b> {{$buying->okmany}}
            </div>
            <div class="col-md-6">
                <b>Rendszám:</b> {{$buying->rendszam}}
            </div>
        </div>

        <hr class="p-0 m-0">

        <div class="card-body row">
            <div class="col-md-12">
                <b>Link:</b> <a href="{{$buying->link}}" target="_blank">{{$buying->link}}</a>
            </div>
        </div>

        @if($buying->images_id)
            <?php $images = explode(',', $buying->images_id); ?>
            @foreach($images as $image)
                <img src="{{ asset(trim($image)) }}" class="" alt="..." style="width: 100%">
            @endforeach
        @endif



    </div>


    @else
        <p>A motor nem található.</p>
    @endif



    <div class="d-flex justify-content-center pb-3 mt-3">
    </div>


@stop

@section('css')
    <style>

body {
    background-color: #f4f6f9 !important;
}

.alert {
    position: relative;
    padding: 0.35rem 1.25rem !important;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
}
.alert-dismissible .close {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    padding: 0.35rem 1.25rem !important;
    color: inherit;
}

        .form-check-input[type='checkbox']:checked {
            background-color: #ea7575;
            border-color: #ea7575;
        }

        .form-check-input[type='checkbox']:focus {
            outline: none;
            border-color: #ea7575 !important;
            box-shadow: 0 0 5px #ea7575 !important;
        }

        .form-outline input[type='number']:focus {
            outline: none;
            border-color: #ea7575 !important;
            box-shadow: 0 0 5px #ea7575 !important;
        }

        .btn_wrapper_filter .getstarted_btn {
            margin-right: 12px;
            font-size: 16px;
            line-height: 18px;
            padding: 10px 18px;
            text-align: center;
            color: var(--e-global-color-white);
            display: inline-block;
            background-color: #d74949 !important;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
        }

        .page-link {
            color: #d74949 !important;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #ffe7e7 !important;
            border-color: #fed2d2 !important;
        }
    </style>
@stop
