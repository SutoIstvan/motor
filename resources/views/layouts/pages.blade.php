<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Márka Motorcenter</title>
    <!-- /SEO Ultimate -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/images/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/images/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/images/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/images/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/images/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/images/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/images/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/images/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/images/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/images/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Latest compiled and minified CSS -->
    <link href="{{ asset('assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('assets/js/bootstrap.min.js') }}"> --}}
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- StyleSheet link CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/mediaqueries.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @yield('stylesheet')


</head>
<style>
    .col-12 {
        max-width: 15%;
    }

    .card_box {
        background-color: var(--e-global-color-white);
        position: absolute;
        display: inline-block;
        align-items: center;
        padding: 26px 40px 30px;
        bottom: -185px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0px 0px 100px 0px rgb(226 228 231);
        border-bottom: 2px solid var(--e-global-color-accent);
    }

    .tile {
        width: 100%;
        background: #f7f7f7;
        border-radius: 5px;
        border-bottom: 1px solid var(--e-global-color-accent);
        box-shadow: 0px 0px 3px -1px rgb(139 139 139 / 40%);
        float: left;
        transform-style: preserve-3d;
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
        font-size: 1.3vw;
        font-weight: 700;
        color: var(--e-global-color-primary);
    }

    .banner-img {
        padding: 0px 0px 0;
    }

    .banner-img img {
        width: 100%;
        border-radius: 0px;
    }

    .dates {
        border-radius: 5px;
        padding: 10px 0px;
        margin: 10px 30px;
        font-size: 14px;
        overflow: auto;
    }

    .dates div {
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
        border-bottom: 0.0625rem solid #dddddd;
    }

    .stats div {
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
        opacity: 0.5;
    }

    @media (max-width: 768px) {
        .our_choose_box_content img {
            width: 100%;
        }
    }
    @media (max-width: 576px) {
        .our_choose_box_content img {
            width: 130%;
        }
    }


    /* HELP STYLE */
    .accordion {
        z-index: 3;
        outline: 0;
        box-shadow: #fff;
    }

    .accordion-button:not(.collapsed) {
        color: #ffffff !important;
        background-color: #ffffff !important;
        box-shadow: #fff;
        --bs-accordion-btn-focus-box-shadow: 0 0 0 0.25rem rgba(232, 231, 231, 0.642) !important;
    }

    .accordion-button:focus {
        z-index: 3;
        border-color: #fff;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(213, 213, 213, 0.642) !important;
    }

</style>

<body>

    @include('layouts.header')

    @yield('content')

    <!-- FOOTER SECTION -->
    @include('layouts.footer')

    @yield('js')

    <!-- Latest compiled JavaScript -->
    {{-- <script src="{{ asset('/assets/js/jquery-3.6.0.min.js') }}"></script> --}}

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- <script src="assets/js/owl.carousel.js"></script> -->
    <!-- <script src="assets/js/carousel.js"></script> -->
    <script src="{{ asset('assets/js/counter.js') }}"></script>
    <script src="{{ asset('assets/js/animation.js') }}"></script>
</body>

</html>
