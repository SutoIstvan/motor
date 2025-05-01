@extends('adminlte::page')

@section('title', 'Euro árfolyam')

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
            <h3 class="card-title mt-1">Euro árfolyam</h3>
        </div>

        <form action="{{ route('admin.exchangerate.update', [$exchangeRate->id]) }}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')

            <div class="card-body mt-3">
                <div class="form-group row">
                    <label for="brand_label" class="col-sm-2 col-form-label">Euro árfolyam</label>
                    <div class="col-sm-10">
                        <input name="rate" class="form-control" id="brand" value="{{ $exchangeRate->rate }}"
                            placeholder="Euro árfolyam" maxlength="50" minlength="3" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="brand_label" class="col-sm-2 col-form-label">Sajat árfolyam</label>
                    <div class="col-sm-10">
                        <input name="manual_rate" class="form-control" id="brand" value="{{ $exchangeRate->manual_rate }}"
                            placeholder="Ad meg az euro árfolyamot ha nem mukodik a Banki árfolyam" maxlength="50" minlength="0">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="brand_label" class="col-sm-2 col-form-label">Euro szorzó</label>
                    <div class="col-sm-10">
                        <input name="manual_divider" class="form-control" id="brand" value="{{ $exchangeRate->manual_divider }}"
                            placeholder="Euro árfolyam szorzo" maxlength="50" minlength="3" required>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Mentés</button>
            </div>

        </form>
    </div>

@stop
