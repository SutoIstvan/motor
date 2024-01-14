@extends('adminlte::page')

@section('title', 'Kivitel')

@section('content_header')
    <h3></h3>
@stop

@section('content')

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
        </div>
    @endif

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title mt-1">Márka hozáadasa</h3>
        </div>

        <form action="{{ route('admin.brand.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="card-body mt-3">
                <div class="form-group row">
                    <label for="brand_label" class="col-sm-2 col-form-label">Nev</label>
                    <div class="col-sm-10">
                        <input name="brand" class="form-control" id="brand" value="{{ old('brand') }}"
                            placeholder="Ad meg a márka nevét" maxlength="50" minlength="3" required>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Hozáad</button>

                <a href="{{ route('admin.brand.index') }}" class="btn btn-default float-right">
                    Mégse
                </a>

            </div>

        </form>
    </div>

@stop
