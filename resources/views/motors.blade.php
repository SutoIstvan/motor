@extends('layouts.pages')

@section('stylesheet')

<link rel="stylesheet" href="assets/css/sidebars.css" />

    <style>
        .form-check-input[type='checkbox']:checked {
            background-color: #ea7575;
            border-color: #ea7575;
        }

        .form-check-input[type='checkbox']:focus {
            outline: none;
            border-color: #ea7575;
            box-shadow: 0 0 5px #ea7575;
        }

        .form-outline input[type='number']:focus {
            outline: none;
            border-color: #ea7575;
            box-shadow: 0 0 5px #ea7575;
        }

        .btn_wrapper_filter .getstarted_btn {
            margin-right: 12px;
            font-size: 16px;
            line-height: 18px;
            padding: 10px 18px;
            text-align: center;
            color: var(--e-global-color-white);
            display: inline-block;
            background-color: #d74949;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
        }

        .page-link {
            color: #d74949;
        }

        .page-link:focus {
            outline: none;
            border-color: #ea7575 !important;
            box-shadow: 0 0 5px #ea7575 !important;
        }

        .col-12 {
            max-width: 15%;
        }

        .card_box {
            background-color: var(--e-global-color-white);
            position: absolute;
            /* width: 78%; */
            display: inline-block;
            align-items: center;
            padding: 26px 40px 30px;
            /* left: 40px; */
            bottom: -185px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 0px 100px 0px rgb(226 228 231);
            border-bottom: 2px solid var(--e-global-color-accent);
        }

        .tile {
            width: 100%;
            /* background: #fff; */
            background: #f7f7f7;

            border-radius: 5px;
            border-bottom: 1px solid var(--e-global-color-accent);
            box-shadow: 0px 0px 3px -1px rgb(139 139 139 / 40%);
            /* box-shadow: 0px 2px 3px -1px rgba(151, 171, 187, 0.7); */
            /* box-shadow: 1px 0px 5px -1px rgba(151, 171, 187, 0.7);  */
            float: left;
            transform-style: preserve-3d;
            /* margin: 10px 5px; */

        }

        .header {
            border-bottom: 1px solid #ebeff2;
            padding: 19px 0;
            text-align: center;
            color: #59687f;
            font-size: 600;
            font-size: 19px;
            position: relative;
        }

        .price {
            font-family: 'Jost', sans-serif;
            font-size: 20px;
            line-height: 30px;

            color: #d74949;
        }

        .card-title {
            /* height: 32px; */
            font-size: 1.3vw;
            font-weight: 700;
            color: var(--e-global-color-primary);
        }

        .banner-img {
            /* padding: 5px 5px 0; */
            padding: 0px 0px 0;
        }

        .banner-img img {
            width: 100%;
            border-radius: 0px;
        }

        .dates {
            /* border: 1px solid #ebeff2; */
            border-radius: 5px;
            /* padding: 20px 0px;
            margin: 10px 20px; */
            padding: 10px 0px !important;
            margin: 10px 10px !important;
            font-size: 14px;
            /* color: #5aadef; */
            /* font-weight: 600; */
            overflow: auto;
        }

        .dates div {
            /* float: left; */
            /* width: 100%; */
            /* text-align: center; */
            position: relative;
        }

        .dates strong,
        .stats strong {
            display: block;
            color: #adb8c2;
            font-size: 11px;
            font-weight: 700;
        }

        .dates span {
            width: 1px;
            height: 40px;
            position: absolute;
            right: 0;
            top: 0;
            background: #ebeff2;
        }

        .stats {
            border-top: 1px solid #ebeff2;
            background: #f7f8fa;
            overflow: auto;
            padding: 15px 0;
            font-size: 16px;
            color: #59687f;
            font-weight: 600;
            /* border-radius: 0 0 5px 5px; */
            border-bottom: 0.0625rem solid #dddddd;
        }

        .stats div {
            /* border-right: 1px solid #ebeff2; */
            border-right: 0.0625rem solid #dddddd;
            width: 33.33333%;
            float: left;
            text-align: center
        }

        .stats div:nth-of-type(3) {
            border: none;
        }

        div.footer {
            text-align: right;
            position: relative;
            margin: 20px 5px;
        }

        div.footer a.Cbtn {
            padding: 10px 25px;
            background-color: #DADADA;
            color: #666;
            margin: 10px 2px;
            text-transform: uppercase;
            font-weight: bold;
            text-decoration: none;
            border-radius: 3px;
        }

        div.footer a.Cbtn-primary {
            background-color: #5AADF2;
            color: #FFF;
        }

        div.footer a.Cbtn-primary:hover {
            background-color: #7dbef5;
        }

        div.footer a.Cbtn-danger {
            background-color: #fc5a5a;
            color: #FFF;
        }

        div.footer a.Cbtn-danger:hover {
            background-color: #fd7676;
        }

        .our_choose_box_content img {
            width: 70%;
            /* Ширина изображения по умолчанию */
            opacity: 0.5;
        }

        @media (max-width: 768px) {
            .our_choose_box_content img {
                width: 100%;
                /* Ширина изображения для экранов менее 500px */
            }
        }

        @media (max-width: 576px) {
            .our_choose_box_content img {
                width: 130%;
                /* Ширина изображения для экранов менее 500px */
            }
        }

        .new-product-corner {
            position: absolute;
            top: 0px;
            /* Регулируйте верхнее расположение изображения */
            right: 0px;
            /* Регулируйте правое расположение изображения */
            max-width: 20%;
            /* Регулируйте максимальную ширину изображения */
            opacity: 70%;
        }

        .banner-img {
            position: relative;
        }

        .imgc img {
            width: 100%;
            /* Ширина картинки 100% от родительского контейнера */
            height: 15vw;
            /* Фиксированная высота картинки */
            object-fit: cover;
            /* Заполнение контейнера, сохраняя пропорции картинки и обрезая лишнее */

            @media (max-width: 768px) {
                height: auto;
                /* Автоматическая высота для меньших экранов */
                max-height: 290px;
                /* Ограничение высоты до 100% */
            }

        }

        .active>.page-link, .page-link.active {
            z-index: 3;
            color: var(--bs-pagination-active-color);
            background-color: #f76f6f !important;
            border-color: #d74949 !important;
        }


    </style>
@endsection

@section('content')
    <section class="send_message_section" style="padding: 0px 0px 65px 0px;">

        <div class="container py-2">

            <div class="d-none d-lg-block p-3 mt-3">
                <!-- Breadcrumb -->
                <nav class="d-flex justify-content-end">
                    <h6 class="mb-0">
                        <a href="{{ url()->current() }}?orderBy={{ request('orderBy') == 'asc' ? 'desc' : 'asc' }}" class="small" style="color: #666; text-decoration: none;">
                            Dátum
                        </a>
                        {{-- <a href="" class="small" style="color: #666; text-decoration: none;">Datum</a> --}}
                        <span>/</span>
                        <a href="{{ url()->current() }}?orderDir={{ request('orderDir') == 'asc' ? 'desc' : 'asc' }}" class="small" style="color: #666; text-decoration: none;">
                            Ár
                        </a>
                        {{-- <a href="" class="small" style="color: #666; text-decoration: none;">Ar</a> --}}
                    </h6>
                </nav>
                <!-- Breadcrumb -->
            </div>
        </div>

        <div class="conteiner">
        <form action="{{ route('search') }}" method="GET">
            <div class="d-lg-none conteiner mt-3" >
                <div class="row mx-1">

                <div class="col-lg-4 col-md-4 col-xs-12 mb-2 form-floating">
                    <select name="brands[]" class="form-select select mb-1" id="marka" aria-label="Large select example">
                        <option  value="">Összes márka</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <label for="marka" style="left: 12px;">Márka</label>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12 mb-2 form-floating">
                    <select name="categories[]" class="form-select select mb-1" id="marka" aria-label="Large select example">
                        <option value="">Összes kivitel</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <label for="marka" style="left: 12px;">Kivitel</label>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12 mb-2 form-floating">
                    <select class="form-select select mb-1" id="marka" aria-label="Large select example">
                        <option value="1">Szükséges</option>
                        <option value="2">Nem szükséges</option>

                    </select>
                    <label for="marka" style="left: 12px;">Vezetői engedély</label>
                </div>
                </div>
            </div>
            <div class="d-lg-none btn_wrapper_filter mt-2 mb-4 d-flex justify-content-center">
                <button type="submit" class="search-btn text-decoration-none getstarted_btn"
                    href="#">Keresés</button>
            </div>
            {{-- <div class="btn_wrapper">
                <button type="submit" class="text-decoration-none viewall_btn mt-3 search-btn">
                    Keresés
                </button>
            </div> --}}
        </form>
    </div>
        {{-- <div class="d-lg-none container">
            <div class="row mx-1">
                <div class="col-lg-4 col-md-4 col-xs-12 mb-2 form-floating">
                    <select class="form-select select mb-1" id="marka" aria-label="Large select example">
                        <option value="1">Összes márka</option>
                        <option value="2">Aprilia</option>
                        <option value="3">BMW</option>
                        <option value="4">KTM</option>
                    </select>
                    <label for="marka" style="left: 12px;">Márka</label>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12 mb-2 form-floating">
                    <select class="form-select select mb-1" id="marka" aria-label="Large select example">
                        <option value="1">Összes kivitel</option>
                        <option value="2">Enduro</option>
                        <option value="3">Sport</option>
                        <option value="4">Naked</option>
                    </select>
                    <label for="marka" style="left: 12px;">Kivitel</label>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12 mb-2 form-floating">
                    <select class="form-select select mb-1" id="marka" aria-label="Large select example">
                        <option value="1">Nem szükséges</option>
                        <option value="2">A1 kategóriás</option>
                        <option value="2">A2 kategóriás</option>
                        <option value="2">AM kategóriás</option>

                    </select>
                    <label for="marka" style="left: 12px;">Vezetői engedély</label>
                </div>

            </div>
            <div class="btn_wrapper_filter mb-3 d-flex justify-content-center">
                <a class="text-decoration-none getstarted_btn" href="#">
                    Keresés
                </a>
            </div>
        </div> --}}

        <!-- MOTOR SECTION -->
        <div class="container">
            <div class="row">



                <div class="col-lg-3 d-none d-lg-block">

                    <form action="{{ route('search') }}" method="GET">

                        <div class="flex-shrink-0">

                            <ul class="list-unstyled ps-0">
                                <li class="mb-1">
                                    <div class="btn btn-toggle d-inline-flex align-items-center rounded border-0 "
                                        data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                        Márka
                                    </div>
                                    <div class="collapse show" id="home-collapse">

                                        @foreach ($brands as $brand)
                                            @if ($brand->motorcycles->count() > 0)
                                                <label class="list-group-item d-flex gap-2 px-4">
                                                    <input name="brands[]" class="form-check-input flex-shrink-0"
                                                        type="checkbox" value="{{ $brand->id }}"
                                                        {{ in_array($brand->id, $selectedBrands) ? 'checked' : '' }}>
                                                    <span class="small mt-1">
                                                        {{ $brand->name }} ({{ $brand->motorcycles->count() }})
                                                    </span>
                                                </label>
                                            @endif
                                        @endforeach


                                        {{-- @foreach ($brands as $brand)
                                            <label class="list-group-item d-flex gap-2 px-4">
                                                <input name="brands[]" class="form-check-input flex-shrink-0"
                                                    type="checkbox" value="{{ $brand->id }}"
                                                    {{ in_array($brand->id, $selectedBrands) ? 'checked' : '' }}>
                                                <span class="small mt-1">
                                                    {{ $brand->name }} ({{ $brand->motorcycles->count() }})
                                                </span>
                                            </label>
                                        @endforeach --}}

                                    </div>
                                </li>

                                <li class="mb-1">
                                    <div
                                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true">
                                        Kivitel
                                    </div>
                                    <div class="collapse show" id="dashboard-collapse">

                                        @foreach ($categories as $category)
                                            @if ($category->motorcycles->count() > 0)
                                                <label class="list-group-item d-flex gap-2 px-4">
                                                    <input name="categories[]" class="form-check-input flex-shrink-0"
                                                        type="checkbox" value="{{ $category->id }}"
                                                        {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }}>
                                                    <span class="small mt-1">
                                                        {{ $category->name }} ({{ $category->motorcycles->count() }})
                                                    </span>
                                                </label>
                                            @endif
                                        @endforeach

                                    </div>
                                </li>
                                {{-- <li class="mb-1">
                                    <div
                                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="true">
                                        Vezetői engedély
                                    </div>
                                    <div class="collapse show" id="orders-collapse">

                                        <label class="list-group-item d-flex gap-2 px-4">
                                            <input class="form-check-input flex-shrink-0" type="checkbox" value="">
                                            <span class="small mt-1">
                                                Szükséges
                                            </span>
                                        </label>

                                        <label class="list-group-item d-flex gap-2 px-4">
                                            <input class="form-check-input flex-shrink-0" type="checkbox" value="">
                                            <span class="small mt-1">
                                                Nem szükséges
                                            </span>
                                        </label>

                                    </div>
                                </li> --}}
                                <!-- <li class="border-top my-3"></li> -->

                                {{-- Price --}}

                                <li class="mb-1">

                                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="true">
                                        Szürök
                                    </button>
                                    <label class="list-group-item d-flex gap-2 px-4">
                                        <input class="form-check-input flex-shrink-0" type="checkbox" value="">
                                        <span class="small mt-1">
                                            A2-es kategória (35 kW-ig)
                                        </span>
                                    </label>
                                    <li class="border-top mt-3 ms-3 me-3"></li>
                                    <div class="collapse show" id="account-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <div class="row px-4 mt-2">
                                            <div class="mb-1">Ár forintban</div>
                                            <div class="col-6">

                                            <div class="form-outline">
                                                <input type="number" id="typeNumber" class="form-control" value="600000">
                                                {{-- <label class="form-label" for="typeNumber" style="margin-left: 0px;">$0</label> --}}
                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 22.4px;"></div><div class="form-notch-trailing"></div></div></div>
                                            <p class="mb-0 ms-1 small">
                                                Min
                                            </p>
                                            </div>
                                            <div class="col-6">

                                            <div class="form-outline">
                                                <input type="number" id="typeNumber" class="form-control" value="6000000">
                                                {{-- <label class="form-label" for="typeNumber" style="margin-left: 0px;">$1,0000</label> --}}
                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 54.4px;"></div><div class="form-notch-trailing"></div></div></div>
                                            <p class="mb-0 ms-1 small">
                                                Max
                                            </p>
                                            </div>
                                        </div>
                                    </ul>

                                    <li class="border-top mt-1 ms-3 me-3"></li>

                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <div class="row px-4 mt-2">
                                            <div class="mb-2">Évjarat</div>
                                            <div class="col-6">

                                            <div class="form-outline">
                                                <input type="number" id="typeNumber" class="form-control" value="2007">
                                                {{-- <label class="form-label" for="typeNumber" style="margin-left: 0px;">2007</label> --}}
                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 22.4px;"></div><div class="form-notch-trailing"></div></div></div>
                                            <p class="mb-0 ms-1 small">
                                                tól
                                            </p>
                                            </div>
                                            <div class="col-6">

                                            <div class="form-outline">
                                                <input type="number" id="typeNumber" class="form-control" value="2021">
                                                {{-- <label class="form-label" for="typeNumber" style="margin-left: 0px;">2021</label> --}}
                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 54.4px;"></div><div class="form-notch-trailing"></div></div></div>
                                            <p class="mb-0 ms-1 small">
                                                ig
                                            </p>
                                            </div>
                                        </div>
                                    </ul>

                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="btn_wrapper_filter mt-4 d-flex justify-content-center">
                            <button type="submit" class="search-btn text-decoration-none getstarted_btn"
                                href="#">Keresés</button>
                        </div>
                    </form>

                </div>

                <div class="col-lg-9">

                    <div class="container">

                        <div class="row">
                            @foreach ($motors as $motor)
                                <div class="col-lg-4 col-md-4 col-xs-12 mb-4">
                                    <a href="{{ route('motor.show', $motor) }}" style="text-decoration: none; color: inherit;">

                                        <div class="tile">
                                            <div class="wrapper">
                                                <div class="dates">
                                                    <div class="start">
                                                        <div class="card-title ms-auto">{{ $motor->name }}

                                                            {{-- Youtube icon --}}
                                                            {{-- @if (!empty($motor->video))
                                                            <svg class="mb-1 " xmlns="http://www.w3.org/2000/svg" height="18" width="21" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#b81e1e" d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg>
                                                            @endif --}}

                                                        </div>

                                                        <div>
                                                            @if($motor->discount_price)
                                                                <div class="price">{{ number_format($motor->discount_price, 0, '.', ' ') }} ft</div>
                                                                <div class="price float-end" style="text-decoration: line-through; font-size: 13px; margin-block: -30px;">
                                                                    {{ number_format($motor->price, 0, '.', ' ') }} Ft
                                                                </div>
                                                            @else
                                                                <div class="price">{{ number_format($motor->price, 0, '.', ' ') }} ft</div>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="banner-img">

                                                    <div id="carouselExampleIndicators{{ $motor->id }}" class="carousel slide"
                                                        data-bs-ride="carousel" data-bs-interval="5000000"
                                                        data-bs-touch="true">

                                                        <div class="carousel-indicators">
                                                            <button type="button"
                                                                data-bs-target="#carouselExampleIndicators{{ $motor->id }}"
                                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                                aria-label="Slide 1"></button>
                                                            @foreach ($motor->images as $key => $image)
                                                                <button type="button"
                                                                    data-bs-target="#carouselExampleIndicators{{ $motor->id }}"
                                                                    data-bs-slide-to="{{ $key + 1 }}"></button>
                                                            @endforeach
                                                        </div>

                                                        <div class="carousel-inner imgc">
                                                            <div class="carousel-item active ">
                                                                <img src="{{ asset($motor->main_image) }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                            @foreach ($motor->images as $key => $image)
                                                                <div class="imgc carousel-item">
                                                                    <img src="{{ $image->url }}" class="d-block w-100" alt="...">
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselExampleIndicators{{ $motor->id }}"
                                                            data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselExampleIndicators{{ $motor->id }}"
                                                            data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>

                                                        @if ($motor->created_at->diffInDays(now()) <= 30)
                                                            <div class="new-product-corner">
                                                                <img src="{{ asset('assets/new.png') }}" alt="New Product">
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>

                                                <div class="stats">
                                                    <div>
                                                        {{ $motor->year }}<strong>Évjárat</strong>
                                                    </div>
                                                    <div>
                                                        {{ $motor->cylinders_cm3 }}<strong>cm<sup>3</sup></strong>
                                                    </div>
                                                    <div>
                                                        {{ $motor->km }}<strong>km</strong>
                                                    </div>
                                                </div>

                                                <div class="dates" style="color: #727272;">
                                                    <div>
                                                        Egyéb opciók:{{ Str::limit($motor->short_description, 50) }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="d-flex justify-content-center pb-3 mt-3">
                        {{-- {{ $motors->links() }} --}}
                        {{ $motors->appends(request()->query())->links() }}

                    </div>

                    {{-- <div class="d-flex justify-content-center mb-4 mt-3">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}

    </section>
@endsection
