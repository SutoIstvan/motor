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

                <div class="float-right">
                    <form method="get" action="{{ url()->current() }}">
                        <select class="form-control form-control-sm" name="perPage" id="perPage" onchange="this.form.submit()">
                            <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped">
                {{-- <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>név</th>
                        <th style="width: 150px">szerkésztes</th>
                        <th style="width: 120px">törlés</th>
                    </tr>
                </thead> --}}
                <tbody>

                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->name }}</td>
                            <td style="width: 150px">
                                <a href="{{ route('admin.brand.edit', $brand) }}"
                                    class="btn btn-outline-success btn-block btn-sm">
                                    <i class="fas fa-edit mr-2"></i> Szerkesztés
                                </a>
                            </td>
                            <td style="width: 120px">

                                <form method="POST" action="{{ route('admin.brand.destroy', $brand->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-danger btn-block btn-sm">
                                        <i class="fa fa-trash mr-2"></i> Törlés
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>



    <div class="d-flex justify-content-center mb-4 mt-3">
        {{ $brands->links() }}
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
