@extends('adminlte::page')

@section('title', 'Motor')

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
        <div class="alert alert-danger mt-2">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif
<div class="conteiner pb-3">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title mt-1">Motor hozáadasa</h3>
        </div>

        <form action="{{ route('admin.motor.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card-body mt-3">

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input name="top" type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Kiemelt Motor</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">Név</label>
                    <div class="col-sm-10">
                        <input name="name" class="form-control" id="name" value="{{ old('name') }}"
                            placeholder="Ad meg a motor nevét" maxlength="80" minlength="3" autocomplete="name" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ár</label>
                            <input name="price" class="form-control" id="price" value="{{ old('price') }}"
                                   placeholder="Ad meg a motor árát" maxlength="80" minlength="3" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Akcios ár</label>
                            <input name="discount_price" class="form-control" id="discount_price"
                            value="{{ old('discount_price') }}" placeholder="Ad meg a motor akcios árát" maxlength="80"
                            minlength="3">
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Részletes leírás</label>
                    <div class="col-sm-12">
                        <textarea name="description" class="form-control" id="description" rows="5" placeholder="Ad meg a motor leirását" maxlength="8000" minlength="3" required>{{ old('description') }}</textarea>

                        {{-- <input name="description" class="form-control" id="description" value="{{ old('description') }}"
                            placeholder="Ad meg a motor leirását" maxlength="8000" minlength="3" required> --}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">További opciók</label>
                    <div class="col-sm-10">
                        <input name="short_description" class="form-control" id="short_description"
                            value="{{ old('short_description') }}" placeholder="Ad meg a motor rövid leirását"
                            maxlength="180" minlength="3" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Évjárat</label>
                            <input name="year" class="form-control" id="year" value="{{ old('year') }}"
                                   placeholder="Ad meg a motor évjáratát" maxlength="80" minlength="2" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Munkaütem</label>
                            <input name="cylinders" class="form-control" id="cylinders"
                            value="{{ old('cylinders') }}" placeholder="Ad meg a motor munkaütemét" maxlength="80"
                            minlength="1">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Hengerűrtartalom</label>
                            <input name="cylinders_cm3" class="form-control" id="cylinders_cm3"
                            value="{{ old('cylinders_cm3') }}" placeholder="Ad meg a motor hengerűrtartalmát" maxlength="80"
                            minlength="1">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Futott km</label>
                            <input name="km" class="form-control" id="km" value="{{ old('km') }}"
                                   placeholder="Ad meg a motor futott km" maxlength="80" minlength="1" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Teljesítmény</label>
                            <input name="performance" class="form-control" id="performance"
                            value="{{ old('performance') }}" placeholder="Ad meg a motor teljesítményét" maxlength="80"
                            minlength="1">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Állapot</label>
                            <input name="condition" class="form-control" id="condition"
                            value="{{ old('condition') }}" placeholder="Ad meg a motor állapotát" maxlength="80"
                            minlength="1">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label>Márka</label>
                            <select name="brand" class="form-control">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Kivitel</label>
                            <select name="category" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Vezetői engedély</label>
                            <select name="driver_license" class="form-control">
                                    <option value="yes">Szükséges</option>
                                    <option value="no">Nem szükséges</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-file">
                        <input name="main_image" type="file" class="custom-file-input" id="main_image">
                        <label class="custom-file-label" for="customFile">Fő kép</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="images_id[]" multiple>
                        <label class="custom-file-label" for="customFile">Összes kép</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="p-2">Youtube link</label>
                    <div class="col-sm-12">
                        <input name="video" class="form-control" id="video"
                            placeholder="Youtube link" maxlength="280" minlength="0">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Hozáad</button>

                <a href="{{ route('admin.motor.index') }}" class="btn btn-default float-right">
                    Mégse
                </a>

            </div>

        </form>
    </div>
</div>


@stop
{{--
@section('js')
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"><script>
<script src="{{ asset('assets/js/bs-custom-file-input.min.js') }}"><script>
@endsection --}}
