@extends('adminlte::page')

@section('title', 'Felhasználó')

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
            <h3 class="card-title mt-1">Felhasználó hozáadasa</h3>
        </div>

        <form action="{{ route('admin.user.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="card-body mt-3">
                <div class="form-group row">
                    <label for="name_label" class="col-sm-2 col-form-label">Név</label>
                    <div class="col-sm-10">
                        <input name="name" class="form-control" id="name" value="{{ old('name') }}"
                            placeholder="Ad meg a felhasználó nevét" maxlength="50" minlength="3" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email_label" class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">
                        <input name="email" class="form-control" id="email" value="{{ old('email') }}"
                            placeholder="Ad meg a email cimet" maxlength="50" minlength="3" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_label" class="col-sm-2 col-form-label">Jelszó</label>
                    <div class="col-sm-10">
                        <input name="password" class="form-control" id="password" value="{{ old('password') }}"
                            placeholder="Ad meg a jelszavad" maxlength="50" minlength="3" required>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Hozáad</button>

                <a href="{{ route('admin.user.index') }}" class="btn btn-default float-right">
                    Mégse
                </a>

            </div>

        </form>
    </div>

@stop
