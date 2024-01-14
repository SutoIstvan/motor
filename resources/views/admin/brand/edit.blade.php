@extends('adminlte::page')

@section('title', 'Márka szerkesztése')

@section('content_header')
<h3></h3>
@stop

@section('content')

    @error('brand')
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
            <h3 class="card-title mt-1">Márka {{$brand->name}} szerkesztése</h3>
        </div>
        <form action="{{ route('admin.brand.update', $brand) }}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="card-body mt-3">
                <div class="form-group row">
                    <label for="brand_label" class="col-sm-2 col-form-label">Név</label>
                    <div class="col-sm-10">
                        <input name="brand" class="form-control"  id="brand" value="{{ $brand->name }}" required>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Mentés</button>

                <a href="{{ route('admin.brand.index')}}" class="btn btn-default float-right">
                    Mégse
                </a>

            </div>

        </form>
    </div>

@stop



@section('css')
@stop

@section('js')
@stop
