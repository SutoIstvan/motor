<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Márka Motorcenter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="57x57" href="./assets/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./assets/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./assets/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./assets/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./assets/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./assets/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./assets/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./assets/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./assets/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="./assets/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Latest compiled and minified CSS -->
    <link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/js/bootstrap.min.js">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- StyleSheet link CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/mediaqueries.css" rel="stylesheet" type="text/css">
    <link href="assets/css/owl.theme.default.min.css" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="assets/css/index.css" rel="stylesheet" type="text/css">

</head>
<style>
    .imgc img {
        width: 100%; /* Ширина картинки 100% от родительского контейнера */
        height: 20vw; /* Фиксированная высота картинки */
        object-fit: cover; /* Заполнение контейнера, сохраняя пропорции картинки и обрезая лишнее */

        @media (max-width: 768px) {
            height: auto; /* Автоматическая высота для меньших экранов */
            max-height: 290px; /* Ограничение высоты до 100% */
        }

    }



</style>

<body>

    <div class="banner-section-outer">
        <header>
            <div class="main_header">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a class="navbar-brand" href="#">
                            <figure class=""><img src="/assets/images/marka_logo.png" style="height: 40px; width: 183px;"
                                    alt="" class="img-fluid"></figure>
                        </a>
                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                @foreach($menus as $menu)
                                    @if($menu->is_visible)
                                    <li class="nav-item {{ request()->is('/') && $menu->url == '/' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ $menu->url }}">{{ $menu->title }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- BANNER SECTION -->
        <section class="banner-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-md-left text-center">
                        <div class="banner-section-content">
                            <h1 data-aos="fade-up">{{ $index->title }}</h1>
                            <p data-aos="fade-right" style="color: #292929">
                                {{ $index->description }}
                            </p>
                            <div class="btn_wrapper" data-aos="fade-up">
                                <a class="text-decoration-none getstarted_btn" href="{{ route('about')}}">Részletek</a>
                                <a class="text-decoration-none aboutus_btn" href="{{ route('contacts')}}">Elérhetőségek</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="banner-section-image">
                            <figure class="mt-3">
                                <div id="carouselExampleIndicators4" class="carousel slide" data-bs-ride="carousel">

                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                        <img src="./assets/images/banner_right_image3.png" class="d-block w-100" alt="...">
                                      </div>
                                      <div class="carousel-item">
                                        <img src="./assets/images/banner_right_image8.png" class="d-block w-100" alt="...">
                                      </div>
                                      <div class="carousel-item">
                                        <img src="./assets/images/banner_right_image9.png" class="d-block w-100" alt="...">
                                      </div>
                                    </div>

                                  </div>

                            </figure>
                        </div>

                    </div>
                </div>

                <figure class="banner_right_top_icon mb-0">
                    <img src="./assets/images/banner_right_top_transparent_icon.png" alt="" class="img-fluid">
                </figure>
                <figure class="banner_right_bottom_icon mb-0">
                    <img src="./assets/images/banner_right_bottom_icon.png" alt="" class="img-fluid">
                </figure>
            </div>
        </section>
    </div>

    <section class="team_member_section" id="team_members">
        <div class="container">
            <div class="row aos-init aos-animate" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="team_member-content">
                        <h6 class="mb-4 mt-3">Motorok szurese</h6>
                    </div>
                </div>
            </div>

            <form action="{{ route('search') }}" method="GET">
                <div class="row aos-init aos-animate" >
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
                <div class="btn_wrapper">
                    <button type="submit" class="text-decoration-none viewall_btn mt-3 search-btn">
                        Keresés
                    </button>
                </div>
            </form>
        </div>
    </section>

        <!-- MOTOR SECTION -->
        <section class="case_studies_section">

            <div class="container">
                <div class="case_studies-content">
                    <h6 class="mb-4">Kiemelt Motorok</h6>
                </div>
                <div class="row" data-aos="fade-up ">

                    @foreach ($topmotors as $motor)
                    <div class="col-lg-4 col-md-4 col-xs-12 mb-4">
                        <a href="{{ route('motor.show', $motor) }}" style="text-decoration: none; color: inherit;">

                            <div class="tile">
                                <div class="wrapper">


                                    <div class="dates">
                                        <div class="start">
                                            <div class="card-title">{{ $motor->name }}</div>
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
                                        <div id="carouselExampleIndicators{{ $motor->id }}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000000" data-bs-touch="true">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators{{ $motor->id }}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                @foreach ($motor->images as $key => $image)
                                                    <button type="button" data-bs-target="#carouselExampleIndicators{{ $motor->id }}" data-bs-slide-to="{{ $key + 1 }}"></button>
                                                @endforeach
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="imgc carousel-item active">
                                                    <img src="{{ $motor->main_image }}" class="d-block w-100" alt="...">
                                                </div>
                                                @foreach ($motor->images as $key => $image)
                                                    <div class="imgc carousel-item">
                                                        <img src="{{ $image->url }}" class="d-block w-100" alt="...">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{ $motor->id }}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{ $motor->id }}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>


                                    <div class="stats">
                                        <div>
                                            {{ $motor->year }} <strong>Évjárat</strong>
                                        </div>
                                        <div>
                                            {{ $motor->cylinders_cm3 }} <strong>cm<sup>3</sup></strong>
                                        </div>
                                        <div>
                                            {{ $motor->km }} <strong>km</strong>
                                        </div>
                                    </div>
                                    <div class="dates" style="color: #727272;">
                                        <div>
                                            Egyéb opciók:{{ Str::limit($motor->short_description, 70) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="btn_wrapper mt-5">
                <a class="text-decoration-none viewall_btn" href="{{ route('motors') }}">Összes motor</a>
            </div>
        </section>

        <!-- MOTOR SECTION -->
        {{-- <section class="case_studies_section">

            <div class="container">
                <div class="case_studies-content">
                    <h6 class="mb-4">Kiemelt Motorok</h6>
                </div>
                <div class="row" data-aos="fade-up ">

                    <div class="col-lg-4 col-md-4 col-xs-12 mb-4">
                        <a href="motor.html" style="text-decoration: none; color: inherit;">

                            <div class="tile">
                                <div class="wrapper">


                                    <div class="dates">
                                        <div class="start">
                                            <div class="card-title">BMW T9034 RX</div>
                                            <div>
                                                <div class="price">1 699 999 Ft</div>
                                                <div class="price float-end" style="text-decoration: line-through; font-size: 13px; margin-block: -30px;">
                                                1 899 999 Ft
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="banner-img">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000000" data-bs-touch="true">
                                            <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./assets/bikes-001.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./assets/bikes-002.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./assets/bikes-003.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="stats">

                                        <div>
                                            2007
                                            <strong>Évjárat</strong>
                                        </div>

                                        <div>
                                            800
                                            <strong>cm<sup>3</sup></strong>
                                        </div>

                                        <div>
                                            15,785
                                            <strong>km</strong>
                                        </div>

                                    </div>

                                    <div class="dates" style="color: #727272;">
                                        <div>
                                            Egyéb opciók: ABS, Automata váltó, Bukócső, Gyári kulcs, Markolatfűtés, Önindító, Tárcsafék
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </a>

                    </div>

                    <div class="col-lg-4 col-md-4 col-xs-12 mb-4">
                        <a href="motor.html" style="text-decoration: none; color: inherit;">

                            <div class="tile">
                                <div class="wrapper">

                                    <div class="dates">
                                        <div class="start">
                                            <!-- <h3>Honda VFR 800 X CrossRunner ABS</h3>  -->
                                            <div class="card-title">Honda VFR 800</div>
                                            <div class="price">399 999 Ft</div>
                                        </div>

                                    </div>

                                    <div class="banner-img">
                                        <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000000" data-bs-touch="true">
                                            <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./assets/bikes-004.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./assets/bikes-002.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./assets/bikes-003.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <!-- <img src="./assets/bikes-004.jpg" alt="Image 1"> -->
                                    </div>

                                    <div class="stats">

                                        <div>
                                            2007
                                            <strong>Évjárat</strong>
                                        </div>

                                        <div>
                                            800
                                            <strong>cm<sup>3</sup></strong>
                                        </div>

                                        <div>
                                            15,785
                                            <strong>km</strong>
                                        </div>

                                    </div>

                                    <div class="dates" style="color: #727272;">
                                        <div>
                                            Egyéb opciók: ABS, Automata váltó, Bukócső, Gyári kulcs, Markolatfűtés, Önindító, Tárcsafék
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12 mb-4">
                        <a href="motor.html" style="text-decoration: none; color: inherit;">

                            <div class="tile">
                                <div class="wrapper">
                                    <!-- <div class="header">
                                        <h2>BMW T9034 RX</h2>
                                        <h5>500</h5>
                                        <h4>400</h4>
                                        <h3>300</h3>
                                    </div> -->

                                    <div class="dates">
                                        <div class="start">
                                            <div class="card-title">Honda VFR 800</div>
                                            <div class="price">399 999 Ft</div>
                                        </div>

                                    </div>

                                    <div class="banner-img">
                                        <div id="carouselExampleIndicators3" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000000" data-bs-touch="true">
                                            <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./assets/bikes-003.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./assets/bikes-002.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./assets/bikes-004.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <!-- <img src="./assets/bikes-003.jpg" alt="Image 1"> -->
                                    </div>

                                    <div class="stats">

                                        <div>
                                            2007
                                            <strong>Évjárat</strong>
                                        </div>

                                        <div>
                                            800
                                            <strong>cm<sup>3</sup></strong>
                                        </div>

                                        <div>
                                            15,785
                                            <strong>km</strong>
                                        </div>

                                    </div>

                                    <div class="dates" style="color: #727272;">
                                        <div>
                                            <div>
                                                Egyéb opciók: ABS, Automata váltó, Bukócső, Gyári kulcs, Markolatfűtés, Önindító, Tárcsafék
                                            </div>
                                    </div>


                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="btn_wrapper mt-5">
                <a class="text-decoration-none viewall_btn" href="#">Összes motor</a>
            </div>
        </section> --}}


    <!-- OUR SERVICES SECTION -->
    <section class="services_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="services_content"  data-aos="fade-right">
                        <!-- <h6>Bemutatkozás</h6> -->
                        <h2>{{ $index->service_title }}</h2>
                        <ul class="list-unstyled">
                            <li>
                                <i class="fa fa-check" aria-hidden="true"></i>{{ $index->service1 }}
                            </li>
                            <li>
                                <i class="fa fa-check" aria-hidden="true"></i>{{ $index->service2 }}
                            </li>
                            <li>
                                <i class="fa fa-check" aria-hidden="true"></i>{{ $index->service3 }}
                            </li>
                            <li>
                                <i class="fa fa-check" aria-hidden="true"></i>{{ $index->service4 }}
                            </li>
                        </ul>
                        <div class="btn_wrapper">
                            <a class="text-decoration-none get_started_btn" href="{{ route('about') }}">Részletek</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row" data-aos="fade-up">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="services_box_wrapper">
                                <figure>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="63" height="63" fill="#d74949"
                                        class="bi bi-cash-coin" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                        <path
                                            d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                        <path
                                            d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                        <path
                                            d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                    </svg>
                                </figure>
                                <h7>{{ $index->service1 }}</h7>
                                <!-- <a href="./services.html">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a> -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="services_box_wrapper">
                                <figure>
                                    <svg width="63" height="63" fill="#d74949" viewBox="0 0 32 32" data-name="Layer 1"
                                        id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <defs></defs>
                                            <title></title>
                                            <path class="cls-1"
                                                d="M22,27a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4h9.76L15,4V8a3,3,0,0,0,3,3l2-2H18a1,1,0,0,1-1-1V5.41L20.29,8.7l.89-.89.52-.52L17.59,3.17A4,4,0,0,0,14.76,2H5A3,3,0,0,0,2,5V27a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V19.42l-2,2Z">
                                            </path>
                                            <path class="cls-1"
                                                d="M29,7.24a2.86,2.86,0,0,0-4.39,0l-2,2L14.11,17.7a6.09,6.09,0,0,0-.93,1.23L10.69,24H7a1,1,0,0,0,0,2h4a1,1,0,0,0,.67-.27.58.58,0,0,0,.18,0L17.36,23a5.87,5.87,0,0,0,1.14-.9l.56-.55h0L27,13.62l2-2a3.07,3.07,0,0,0,1-2.19A3.11,3.11,0,0,0,29,7.24ZM16.67,21l-.27.19-2.8,1.38,1.33-2.73a3.88,3.88,0,0,1,.47-.6l.61.61.92.93Zm1.69-1.63-.78-.77-.78-.79,6.5-6.5,1.56,1.56Zm9.19-9.19L26.27,11.5,24.71,9.93,26,8.66a1.29,1.29,0,0,1,.78-.45,1.31,1.31,0,0,1,.78.45,1.34,1.34,0,0,1,.45.78A1.37,1.37,0,0,1,27.55,10.22Z">
                                            </path>
                                        </g>
                                    </svg>
                                </figure>
                                <h7>{{ $index->service2 }}</h7>
                                <!-- <a href="./services.html">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a> -->
                            </div>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="services_box_wrapper">
                                <figure>
                                    <svg width="63" height="63" fill="#d74949" viewBox="0 0 1024 1024"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M187.698 120.105c41.846-15.492 89.309-5.554 121.432 26.561 44.941 44.941 44.941 117.826-.002 162.769-44.953 44.953-117.828 44.953-162.781 0-32.25-32.25-42.125-79.975-26.367-121.934 3.977-10.589-1.383-22.396-11.972-26.373s-22.396 1.383-26.373 11.972c-21.357 56.869-7.968 121.581 35.749 165.298 60.949 60.949 159.758 60.949 220.707 0 60.939-60.939 60.939-159.758 0-220.697-43.541-43.53-107.898-57.005-164.614-36.008-10.607 3.927-16.023 15.709-12.096 26.316s15.709 16.023 26.316 12.096z">
                                            </path>
                                            <path
                                                d="M161.408 118.082l52.879 52.869c4.331 4.334 4.331 11.381-.001 15.713l-27.924 27.924c-4.341 4.341-11.373 4.341-15.714 0l-52.594-52.584c-7.999-7.997-20.966-7.996-28.963.003s-7.996 20.966.003 28.963l52.593 52.582c20.336 20.336 53.302 20.336 73.639-.001l27.924-27.924c20.326-20.326 20.326-53.297.006-73.634l-52.887-52.877c-7.999-7.997-20.966-7.996-28.963.003s-7.996 20.966.003 28.963zM836.42 904.635c-41.846 15.492-89.309 5.554-121.432-26.561-44.941-44.941-44.941-117.826.002-162.769 44.953-44.953 117.828-44.953 162.781 0 32.25 32.25 42.125 79.975 26.367 121.934-3.977 10.589 1.383 22.396 11.972 26.373s22.396-1.383 26.373-11.972c21.357-56.869 7.968-121.581-35.749-165.298-60.949-60.949-159.758-60.949-220.707 0-60.939 60.939-60.939 159.758 0 220.697 43.541 43.53 107.898 57.005 164.614 36.008 10.607-3.927 16.023-15.709 12.096-26.316s-15.709-16.023-26.316-12.096z">
                                            </path>
                                            <path
                                                d="M862.712 906.659l-52.869-52.869c-4.34-4.34-4.34-11.377-.006-15.708l27.923-27.933c4.339-4.339 11.37-4.339 15.711.003l52.594 52.584c7.999 7.997 20.966 7.996 28.963-.003s7.996-20.966-.003-28.963l-52.593-52.582c-20.336-20.336-53.302-20.336-73.639.001l-27.917 27.927c-20.335 20.319-20.335 53.299.003 73.638l52.869 52.869c7.998 7.998 20.965 7.998 28.963 0s7.998-20.965 0-28.963zM674.469 738.186l-391.26-391.26c-7.998-7.998-20.965-7.998-28.963 0s-7.998 20.965 0 28.963l391.26 391.26c7.998 7.998 20.965 7.998 28.963 0s7.998-20.965 0-28.963zM343.768 279.258l400.374 400.374c7.998 7.998 20.965 7.998 28.963 0s7.998-20.965 0-28.963L372.731 250.295c-7.998-7.998-20.965-7.998-28.963 0s-7.998 20.965 0 28.963zm255.917 112.52l176.732-176.732c7.998-7.998 7.998-20.965 0-28.963s-20.965-7.998-28.963 0L570.722 362.815c-7.998 7.998-7.998 20.965 0 28.963s20.965 7.998 28.963 0zm214.393-149.914L631.53 422.641c-8.037 7.959-8.1 20.926-.141 28.963s20.926 8.1 28.963.141L842.9 270.968c8.037-7.959 8.1-20.926.141-28.963s-20.926-8.1-28.963-.141z">
                                            </path>
                                            <path
                                                d="M945.721 131.005a20.48 20.48 0 014.873 21.176l-28.201 81.531a20.481 20.481 0 01-12.659 12.66l-81.541 28.211a20.48 20.48 0 01-21.179-4.874l-53.32-53.33a20.48 20.48 0 01-4.872-21.175l28.201-81.531a20.478 20.478 0 0112.658-12.659l81.531-28.211a20.478 20.478 0 0121.178 4.873l53.33 53.33zm-73.228-15.302l-60.012 20.765-20.758 60.014 35.194 35.201 60.021-20.766 20.758-60.012-35.202-35.202zm-421.165 544.57L208.763 902.838c-7.497 7.497-16.502 8.466-19.734 5.237l-74.541-74.541c-3.223-3.226-2.254-12.226 5.248-19.733l242.089-242.079c7.998-7.998 7.998-20.965.001-28.963s-20.965-7.998-28.963-.001L90.769 784.842c-22.28 22.295-26.003 56.877-5.249 77.648l74.553 74.553c20.778 20.76 55.375 17.036 77.654-5.243l242.565-242.565c7.998-7.998 7.998-20.965 0-28.963s-20.965-7.998-28.963 0z">
                                            </path>
                                        </g>
                                    </svg>
                                </figure>
                                </figure>
                                <h7>{{ $index->service3 }}</h7>
                                <!-- <a href="./services.html">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a> -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="services_box_wrapper">
                                <figure>
                                    <svg width="63" height="63" fill="#d74949" viewBox="0 0 32 32" data-name="Layer 1"
                                        id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <defs></defs>
                                            <title></title>
                                            <path class="cls-1"
                                                d="M28,5H4A2,2,0,0,0,2,7V24a2,2,0,0,0,2,2H18v3a1,1,0,0,0,.53.88,1,1,0,0,0,1-.05L22,28.2l2.45,1.63A1,1,0,0,0,26,29V26h2a2,2,0,0,0,2-2V7A2,2,0,0,0,28,5ZM22.59,21.94a3,3,0,1,1,2.35-2.35A3,3,0,0,1,22.59,21.94ZM24,27.13l-1.45-1a1,1,0,0,0-1.1,0l-1.45,1V23.58a5,5,0,0,0,4,0ZM28,24H26V22s0,0,0,0a4.93,4.93,0,0,0,.88-4.1A5,5,0,0,0,17,19a4.93,4.93,0,0,0,1,3s0,0,0,0v2H4V7H28Z">
                                            </path>
                                            <path class="cls-1" d="M7,12H25a1,1,0,0,0,0-2H7a1,1,0,0,0,0,2Z"></path>
                                            <path class="cls-1" d="M7,16h8a1,1,0,0,0,0-2H7a1,1,0,0,0,0,2Z"></path>
                                            <path class="cls-1" d="M7,20h8a1,1,0,0,0,0-2H7a1,1,0,0,0,0,2Z"></path>
                                        </g>
                                    </svg>
                                </figure>
                                <h7>{{ $index->service4 }}</h7>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="our_process_section" id="process">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="our_process-content">
                        <h6></h6>
                        <h2>Visszajelzés vásárlóinktól</h2>
                        <p>{{ $index->feedback_title }}</p>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="our_process_box_content">
                        <span class="process_box_heading">{{ $index->feedback1_name }}</span>
                        <span class="process_box_number">
                            <svg height="35px" width="35px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#f77f7f" stroke="#f77f7f"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#e65656;} </style> <g> <path class="st0" d="M119.472,66.59C53.489,66.59,0,120.094,0,186.1c0,65.983,53.489,119.487,119.472,119.487 c0,0-0.578,44.392-36.642,108.284c-4.006,12.802,3.135,26.435,15.945,30.418c9.089,2.859,18.653,0.08,24.829-6.389 c82.925-90.7,115.385-197.448,115.385-251.8C238.989,120.094,185.501,66.59,119.472,66.59z"></path> <path class="st0" d="M392.482,66.59c-65.983,0-119.472,53.505-119.472,119.51c0,65.983,53.489,119.487,119.472,119.487 c0,0-0.578,44.392-36.642,108.284c-4.006,12.802,3.136,26.435,15.945,30.418c9.089,2.859,18.653,0.08,24.828-6.389 C479.539,347.2,512,240.452,512,186.1C512,120.094,458.511,66.59,392.482,66.59z"></path> </g> </g></svg>
                        </span>
                        <p class="process_box_paragraph">{{ $index->feedback1 }}</p>
                        <footer class="blockquote-footer pt-3 mt-3 border-top">
                            Google
                            <div class="float-end">
                                <i class="fa fa-star " style="color: #FF9747"></i>
                                <i class="fa fa-star" style="color: #FF9747"></i>
                                <i class="fa fa-star" style="color: #FF9747"></i>
                                <i class="fa fa-star" style="color: #FF9747"></i>
                                <i class="fa fa-star" style="color: #FF9747"></i>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="our_process_box_content">
                        <span class="process_box_heading">{{ $index->feedback2_name }}</span>
                        <span class="process_box_number">
                            <svg height="35px" width="35px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#f77f7f" stroke="#f77f7f"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#e65656;} </style> <g> <path class="st0" d="M119.472,66.59C53.489,66.59,0,120.094,0,186.1c0,65.983,53.489,119.487,119.472,119.487 c0,0-0.578,44.392-36.642,108.284c-4.006,12.802,3.135,26.435,15.945,30.418c9.089,2.859,18.653,0.08,24.829-6.389 c82.925-90.7,115.385-197.448,115.385-251.8C238.989,120.094,185.501,66.59,119.472,66.59z"></path> <path class="st0" d="M392.482,66.59c-65.983,0-119.472,53.505-119.472,119.51c0,65.983,53.489,119.487,119.472,119.487 c0,0-0.578,44.392-36.642,108.284c-4.006,12.802,3.136,26.435,15.945,30.418c9.089,2.859,18.653,0.08,24.828-6.389 C479.539,347.2,512,240.452,512,186.1C512,120.094,458.511,66.59,392.482,66.59z"></path> </g> </g></svg>
                        </span>
                        <p class="process_box_paragraph">{{ $index->feedback2 }}</p>
                        <footer class="blockquote-footer pt-3 mt-3 border-top">
                            Google
                            <div class="float-end">
                                <i class="fa fa-star " style="color: #FF9747"></i>
                                <i class="fa fa-star" style="color: #FF9747"></i>
                                <i class="fa fa-star" style="color: #FF9747"></i>
                                <i class="fa fa-star" style="color: #FF9747"></i>
                                <i class="fa fa-star" style="color: #FF9747"></i>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="our_process_box_content mb-0">
                        <span class="process_box_heading launch_track_padding">{{ $index->feedback3_name }}</span>
                        <span class="process_box_number">
                            <svg height="35px" width="35px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#f77f7f" stroke="#f77f7f"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#e65656;} </style> <g> <path class="st0" d="M119.472,66.59C53.489,66.59,0,120.094,0,186.1c0,65.983,53.489,119.487,119.472,119.487 c0,0-0.578,44.392-36.642,108.284c-4.006,12.802,3.135,26.435,15.945,30.418c9.089,2.859,18.653,0.08,24.829-6.389 c82.925-90.7,115.385-197.448,115.385-251.8C238.989,120.094,185.501,66.59,119.472,66.59z"></path> <path class="st0" d="M392.482,66.59c-65.983,0-119.472,53.505-119.472,119.51c0,65.983,53.489,119.487,119.472,119.487 c0,0-0.578,44.392-36.642,108.284c-4.006,12.802,3.136,26.435,15.945,30.418c9.089,2.859,18.653,0.08,24.828-6.389 C479.539,347.2,512,240.452,512,186.1C512,120.094,458.511,66.59,392.482,66.59z"></path> </g> </g></svg>
                        </span>
                        <p class="process_box_paragraph">{{ $index->feedback3 }}</p>
                        <footer class="blockquote-footer pt-3 mt-3 border-top">
                            Google
                            <div class="float-end">
                                <i class="fa fa-star " style="color: #FF9747"></i>
                                <i class="fa fa-star" style="color: #FF9747"></i>
                                <i class="fa fa-star" style="color: #FF9747"></i>
                                <i class="fa fa-star" style="color: #FF9747"></i>
                                <i class="fa fa-star" style="color: #FF9747"></i>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ABOUT US SECTION -->
    <section class="choose_us-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="fade-right">
                <div class="choose_us_content">
                    <h6>{{ $index->about_title }}</h6>
                    <h2>{{ $index->about1 }}</h2>
                    <p>{!! $index->about2 !!}</p>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"  data-aos="fade-up">
                <div class="choose_us_image">
                    <figure class="mb-0">
                        <img src="assets/images/aboutus5.png" alt="" class="img-fluid">
                    </figure>
                </div>
            </div>
        </div>

    </div>
</section>

    <!-- FOOTER SECTION -->
    <section class="footer-section">
        <div class="container">
            <div class="middle-portion">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 d-lg-block d-none"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="about_col">
                            <h4>Figyelem</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <p class="pp">Motorjaink előzetes telefonos bejelentkezés alapján, nyitvatartáson
                                        kívüli időpontban is megtekinthetőek!</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-3 col-xs-12 d-md-block d-none">
                        <div class="links_col">
                            <h4>Linkek</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">Címlap</a>
                                </li>
                                <li>
                                    <a href="#">Motorok</a>
                                </li>
                                <li>
                                    <a href="#">Elérhetőségek</a>
                                </li>
                                <li>
                                    <a href="#">Bemutatkozás</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 d-lg-block d-none">
                        <div class="explore_col">
                            <h4>Social</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">Facebook</a>
                                </li>
                                <li>
                                    <a href="#">Instagram</a>
                                </li>
                                <li>
                                    <a href="#">Youtube</a>
                                </li>
                                <li>
                                    <a href="#">Tik Tok</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="contact_col">
                            <h4>Elérhetőségek</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <i class="fa-solid fa-phone"></i>
                                    <a href="tel:+61383766284" class="text-decoration-none">+36 30 293 - 6241</a>
                                </li>
                                <li>
                                    <i class="fa-sharp fa-solid fa-envelope"></i>
                                    <a href="mailto:info@markamotor.hu"
                                        class="text-decoration-none">info@markamotor.hu</a>
                                </li>
                                <li class="mb-0">
                                    <i class="fa-solid fa-location-dot location"></i>
                                    <a class="text-decoration-none">7030, Paks Nyárfa utca 2</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-portion">
            <div class="copyright col-xl-12">
                <p>Copyright 2023 All Rights Reserved.</p>
            </div>
        </div>


    </section>
    <!-- Latest compiled JavaScript -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/animation.js"></script>
</body>

</html>
