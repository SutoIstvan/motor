@extends('layouts.pages')

@section('stylesheet')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

    <style>
    .imgc img {
        width: 100%; /* Ширина картинки 100% от родительского контейнера */
        height: 43px; /* Фиксированная высота картинки */
        object-fit: cover; /* Заполнение контейнера, сохраняя пропорции картинки и обрезая лишнее */

        /* @media (max-width: 768px) {
            height: auto;
            max-height: 290px;
        } */

    }

    .play-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    fill: #fff; /* цвет иконки play */
    width: 40px; /* ширина иконки play */
    height: 40px; /* высота иконки play */
}


    </style>

@endsection

@section('content')

<section class="">

    <div class="">

        {{-- @dump($motor) --}}

        <div class="container py-2">

            <div class="p-3 mt-3">
                <!-- Breadcrumb -->
                <nav class="d-flex">
                  <h6 class="mb-0">
                    <a href="{{ route('index') }}" class="" style="color: #666; text-decoration: none;">Címlap</a>
                    <span>/</span>
                    <a href="{{ route('motors') }}" class="" style="color: #666; text-decoration: none;">Motorok</a>
                    <span>/</span>
                    <a href="{{ route('search', ['categories[]' => $motor->category->id]) }}" class="" style="color: #666; text-decoration: none;">{{ $motor->category->name }}</a>
                  </h6>
                </nav>
            </div>
        </div>

        <section class="">
            <div class="container">
                <div class="row">
                    <aside class="col-lg-6">
                        <div class=" d-flex justify-content-center">
                            <div class="container-fluid mt-2 mb-3">
                                <div class="row no-gutters">
                                    <div class="pr-2">
                                        <div class="rounded-3">
                                            <a href="{{ asset( $motor->main_image) }}" class="glightbox col-sm-12 " data-gallery="gallery1" data-zoomable="true">
                                                <img src="{{ asset( $motor->main_image) }}" alt="image" class="img-fluid"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- thumbs-wrap.// -->
                        <div class="container ">
                            <div class="row justify-content-center mb-2">

                                  <!-- Gallery -->
                                {{-- <a href="{{ asset( $motor->main_image) }}" class="glightbox col imgc" data-gallery="gallery1">
                                    <img src="{{ asset( $motor->main_image) }}" alt="image" class="img-fluid"/>
                                </a> --}}
                                @if (!empty($motor->video))
                                    <a style="margin-left: 10px;" href="{{ $motor->video }}" class="glightbox col imgc" data-gallery="gallery1">
                                        <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" height="46" width="40" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#b81e1e" d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg>
                                    </a>

                                @endif

                                {{-- @if (!empty($motor->video))
                                    <div class="position-relative glightbox col imgc">
                                        <a href="{{ $motor->video }}" class="glightbox col imgc" data-gallery="gallery1">
                                            <img src="{{ asset( $motor->main_image) }}" alt="image" class="img-fluid"/>
                                        </a>
                                        <svg class="mb-1 play-icon" xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 448 512">
                                            <path fill="#ff3333" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"/>
                                        </svg>
                                    </div>
                                @endif --}}



                                {{-- @foreach ($motor->images as $image)
                                    <a href="{{ asset( $image->url) }}" class="glightbox col imgc" data-gallery="gallery1">
                                        <img src="{{ asset( $image->url) }}" alt="image" class="img-fluid"/>
                                    </a>
                                @endforeach --}}

                                @php $counter = 0; $totalImages = count($motor->images); @endphp

                                @foreach ($motor->images as $image)
                                    @php $counter++; @endphp

                                    <a href="{{ asset($image->url) }}" class="glightbox col imgc" data-gallery="gallery1" style=" color: #5f5f5f; text-decoration: none; {{ $counter > 7 ? 'display:none;' : '' }}">
                                        <img src="{{ asset($image->url) }}" alt="image" class="img-fluid"/>
                                        @if ($counter == 7)
                                            <div class="mt-2 ms-2">
                                                <small>+ {{ $totalImages - 7 }} </small>
                                            </div>
                                        @endif
                                    </a>
                                @endforeach

                            </div>
                        </div>
                        <!-- gallery-wrap .end// -->
                    </aside>
                    <!-- <main class="col-lg-6" style="margin-left: 13px;"> -->

                    <main class="col-lg-6">
                        <div class="container">
                            <h4 class="title text-dark mt-2">
                                {{ $motor->name }}
                            </h4>
                            <div class="mb-3 mt-3">
                                <span class="h5 text-danger">{{ number_format($motor->price, 0, '.', ' ') }} Ft</span>
                                <span style="color: #666; text-decoration: none;">/ {{ number_format($motor->price / $euro, 0, '.', ' ') }} €</span>
                            </div>
                            <p>
                                {{ $motor->short_description }}
                            </p>

                            <div class="row">
                                <dt class="col-6">Hengerűrtartalom:</dt>
                                <dd class="col-6">{{ $motor->cylinders_cm3 }} cm3</dd>

                                <dt class="col-6">Munkaütem:</dt>
                                <dd class="col-6">{{ $motor->cylinders }}</dd>

                                <dt class="col-6">Kivitel:</dt>
                                <dd class="col-6">{{ $motor->category->name }}</dd>

                                <dt class="col-6">Évjárat:</dt>
                                <dd class="col-6">{{ $motor->year }}</dd>
                            </div>

                            <!-- <hr /> -->

                            <div class="row">
                                <dt class="col-6">Futott km:</dt>
                                <dd class="col-6">{{ $motor->km }}</dd>

                                <dt class="col-6">Teljesítmény:</dt>
                                <dd class="col-6">{{ $motor->performance }}</dd>

                                <dt class="col-6">Állapot:</dt>
                                <dd class="col-6">{{ $motor->condition }}</dd>
                            </div>

                            <div>
                                Amennyiben felkeltette érdeklődését, kérjük lépjen kapcsolatba velünk az alábbi telefonszámon
                                <a href="tel:(+61383766284)" class="text-decoration-none">
                                    {{ $contacts->phone }}
                                </a>
                                és
                                <a href="mailto:{{ $contacts->email }}"
                                    class="text-decoration-none">{{ $contacts->email }}
                                </a>
                            </div>

                            <div>
                                <br>
                                <!-- <div class="fb-share-button" data-href="http://muka.neeka.org/motor.html" data-layout="" data-size="large">
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmuka.neeka.org%2Fmotor.html&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore" style="color: #1a1a1a; text-decoration: none;">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                        </svg>
                                        Megosztás
                                    </a>
                                </div> -->

                                <!-- <a href="https://www.facebook.com/sharer/sharer.php?u=http://muka.neeka.org/motor.html" class="share-button" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                    </svg>
                                    Megosztás
                                </a> -->

                                <div>
                                    {{-- <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fmuka.neeka.org%2Fmotor.html&layout&size&width=77&height=20&appId&locale=hu_HU" width="120" height="40" class="fbbutton" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> --}}

                                    {{-- <a href="https://www.facebook.com/sharer/sharer.php?u=#url" target="_blank">
                                        Share
                                    </a> --}}
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http://muka.neeka.org/motor.html" class="btn btn-outline-primary btn-sm" target="_blank" >
                                        <i class="fa-brands fa-facebook"></i>
                                        Facebook
                                    </a>

                                    <a href="#" class="btn btn-outline-primary btn-sm" target="_blank" >
                                        <i class="fa-brands fa-instagram"></i>
                                        instagram
                                    </a>

                                    <a id="viber_share" class="btn btn-outline-primary btn-sm">
                                        <i class="fa-brands fa-viber"></i>
                                        Viber
                                    </a>

                                    {{-- <a class="mb-3" id="viber_share">Viber</a> --}}

                                    <a class="btn btn-outline-primary btn-sm">
                                        <i class="fa-brands fa-twitter"></i>
                                        Twitter
                                    </a>
                                </div>

                            </div>

                        </div>
                    </main>


                </div>
            </div>

        <div class="container">
            <!-- <hr> -->

            <h4 class="title text-dark d-flex justify-content-center mb-3 mt-5">
                Részletes leírás
            </h4>

            <div class="row gx-4">
                <div class="mb-4">
                    <div class="px-3 py-2 bg-white ">
                        <p class="text-center" style="font-size: 15px;">
                            {{ $motor->description }}
                        </p>
                    </div>
                </div>
            </div>

    </div>

</section>

@endsection

@section('js')


<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>

<script type="text/javascript">
    const lightbox = GLightbox({
        touchNavigation: true,
        loop: true,
        autoplayVideos: true,
        closeOnOutsideClick: true,
    });
</script>

<!-- Viber -->

<script>
    var buttonID = "viber_share";
    var text = "Motor: ";
    document.getElementById(buttonID)
        .setAttribute('href',"viber://forward?text=" + encodeURIComponent(text + " " + window.location.href));
</script>

<!-- Facebook -->
{{-- <div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script> --}}

<!-- Latest compiled JavaScript -->
{{-- <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script> --}}
@endsection

