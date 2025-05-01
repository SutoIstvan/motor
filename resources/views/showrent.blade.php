@extends('layouts.pages')

@section('stylesheet')
<meta property="og:title"              content="{{ $motor->title }}" />
{{-- <meta property="og:description"        content="How much does culture influence creative thinking?" /> --}}
<meta property="og:image"              content="{{ asset( $motor->main_image) }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro/build/vanilla-calendar.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro/build/vanilla-calendar.min.js" defer></script>

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

        .vanilla-calendar {
            /* padding: 0px !important; */
        }
        .vanilla-calendar-day {
            width: 36px !important;
            height: 36px !important;

        }
        .vanilla-calendar-day__btn {
            font-size: 14px !important;
        }
        .vanilla-calendar-day__btn_selected {
            font-size: 14px !important;
        }
        [data-calendar-theme=light] .vanilla-calendar-day__btn_disabled {
            color: #ffa3af !important;
            text-decoration: line-through !important;
        }

    </style>

@endsection

@section('content')

<section class="">

    <div class="">

        {{-- @dump($motor) --}}

        <div class="container py-2">

            <div class="p-3 mt-3">
                <nav class="d-flex">
                  <h6 class="mb-0">
                    <a href="{{ route('index') }}" class="" style="color: #666; text-decoration: none;">Címlap</a>
                    <span>/</span>
                    <a href="{{ route('motors') }}" class="" style="color: #666; text-decoration: none;">Motor kölcsönzés</a>
                    <span>/</span>
                    <a href="{{ route('motors', ['category_id[]' => $motor->category->id]) }}" class="" style="color: #666; text-decoration: none;">{{ $motor->name }}</a>

                  </h6>
                </nav>
            </div>
        </div>

        <section class="">
            <div class="container">
                <div class="row">
                    <aside class="col-lg-6 col-md-5">
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
                                @if (!empty($motor->video))
                                    <a style="margin-left: 10px;" href="{{ $motor->video }}" class="glightbox col imgc" data-gallery="gallery1">
                                        <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" height="46" width="40" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#b81e1e" d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg>
                                    </a>
                                @endif

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


                        <!-- Calendar -->

                    <main class="col-lg-6 col-md-6">
                        <div class="container">




                            <h4 class="title text-dark mt-2">
                               {{ $motor->name }}
                            </h4>
                            <div class="mb-3 mt-3">
                                <span class="h5 text-danger">{{ number_format($motor->price, 0, '.', ' ') }} Ft</span>
                                <span style="color: #666; text-decoration: none;">/ {{ number_format($motor->price / $euro, 0, '.', ' ') }} €</span>

                                @if($motor->discount_price)
                                    <span class="price ms-3" style="text-decoration: line-through; font-size: 14px;">
                                        {{ number_format($motor->discount_price, 0, '.', ' ') }} Ft
                                        <span style="color: #666; text-decoration: none;">/ régi ár</span>
                                    </span>
                                @endif
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
                                <dd class="col-6">{{ $motor->performance }} kW ({{ round($motor->performance * 1.36) }} LE)</dd>
                            </div>

                            {{-- <div>
                                Amennyiben felkeltette érdeklődését, kérjük lépjen kapcsolatba velünk az alábbi telefonszámon
                                <a href="tel:(+61383766284)" class="text-decoration-none">
                                    {{ $contacts->phone }}
                                </a>
                                és
                                <a href="mailto:{{ $contacts->email }}"
                                    class="text-decoration-none">{{ $contacts->email }}
                                </a>
                            </div> --}}

                            <div>
                                <br>
                                <div>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http://muka.neeka.org/motor/{{$motor->id}}" class="btn btn-outline-secondary btn-sm mb-2" target="_blank" >
                                        <i class="fa-brands fa-facebook"></i>
                                        Facebook
                                    </a>
                                    <a href="#" class="btn btn-outline-secondary btn-sm mb-2" target="_blank" >
                                        <i class="fa-brands fa-instagram"></i>
                                        instagram
                                    </a>
                                    <a id="viber_share" class="btn btn-outline-secondary btn-sm mb-2">
                                        <i class="fa-brands fa-viber"></i>
                                        Viber
                                    </a>
                                    <a class="btn btn-outline-secondary btn-sm mb-2">
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
                Motor kölcsönzés
            </h4>

            <div class="row">
                <div class="col-md-6 mb-4" id="calendar"></div>

                <div class="col-md-6 mb-4 mt-3">
                    <ul class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <h6 class="my-0">Bérlet 1-2 napra:</h6>
                          <small class="">
                            Ha a bérlés 1 vagy 2 napra van, a napi ár 44 900 forint.
                          </small>
                        </div>
                        <span class="mt-2">44 900 Ft / nap</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                        <div>
                          <h6 class="my-0">Bérlet 3-5 napra:</h6>
                          <small class="">
                            Ha a bérlés 3 vagy 5 napra van, a napi ár 39 900 forint.
                          </small>
                        </div>
                        <span class="mt-2">39 900 Ft / nap</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed ">
                        <div>
                          <h6 class="my-0">Hosszabb időre bérlés:</h6>
                          <small class="">
                            Ha a bérlés töb mint 5 nap, a napi ár 29 900 forint.
                          </small>
                        </div>
                        <span class="mt-2">29 900 Ft / nap</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                          {{-- <h6 class="my-0">Kivalsztot napok szama</h6> --}}
                          <small>Kiválsztot napok száma</small>
                        </div>
                        <span class="text-success">
                            <span id="total-price3"></span>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between">
                        <span>Összes (ft)</span>
                        <strong><span id="total-price2"></span> ft
                        </strong>
                      </li>
                    </ul>

                    {{-- <form class="card p-2">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                      </div>
                    </form> --}}
                  </div>
            </div>
            <div id="calendar"></div>

            <div class="row">
                <input class="mt-4 form-control col-3 pe-2 d-none" type="text" id="calendar-input">
                <input class="mt-4 form-control col-3 pe-2 d-none" type="text" id="days-input">
                <input class="mt-4 form-control col-3 pe-2 d-none" type="text" id="price">
                <input class="mt-4 form-control col-3 pe-2 d-none" type="text" id="total-price">


            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="firstName">Nev</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                          Valid first name is required.
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="lastName">Tel</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                          Valid last name is required.
                        </div>
                      </div>
                    <div class="col-md-3 mb-3">
                        <label for="firstName">e-mail</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                          Valid first name is required.
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                          Valid last name is required.
                        </div>
                      </div>
                    </div>
            </div>

            <div class="row gx-4">
                <div class="mb-4">
                    <div class="px-3 py-2 bg-white ">
                        <p class="text-center" style="font-size: 15px;">
                            {{-- {{ $motor->description }} --}}
                            *Foglalás értelmezése: a bérlés időtartama 24 órára vonatkozik. Tehát ha egy adott napon 9 órakor átveszed a motort a bérlés a következő nap 9 óráig érvényes.
                        </p>
                    </div>
                </div>
            </div>

    </div>

</section>

@endsection

@section('js')

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const disabledDates = [];
        @foreach ($events as $start => $end)
            disabledDates.push('{{ $start }}:{{ $end }}');
        @endforeach

        const totalPriceElement = document.getElementById('total-price2');
        const totalPriceElement2 = document.getElementById('total-price3');

        const inputElement = document.getElementById('calendar-input');
        const inputElement2 = document.getElementById('days-input');
        const pricePerDay = 44900;
        const pricePerDay2 = 39900;
        const pricePerDay3 = 29900;

        const inputElement3 = document.getElementById('total-price');
        const inputElement4 = document.getElementById('price');

        const options = {
            type: 'multiple',
            months: 2,
            jumpMonths: 2,
            settings: {
                range: {
                    disableGaps: true,
                    disablePast: true,
                    disabled: disabledDates,
                },
                selection: {
                    // time: 24,
                    day: 'multiple-ranged',
                },
                visibility: {
                    weekend: false,
                    daysOutside: false,
                },
                lang: 'Hu',
            },
            actions: {
                clickDay(event, self) {
                const selectedDates = self.selectedDates;
                const selectedDatesCount = selectedDates.length;

                if (selectedDatesCount > 5) {
                    pricePerDayValue = pricePerDay3;
                    totalPrice = selectedDatesCount * pricePerDay3;
                } else if (selectedDatesCount > 2) {
                    pricePerDayValue = pricePerDay2;
                    totalPrice = selectedDatesCount * pricePerDay2;
                } else {
                    pricePerDayValue = pricePerDay;
                    totalPrice = selectedDatesCount * pricePerDay;
                }

                inputElement.value = self.selectedDates.join(' - ');
                inputElement2.value = `${selectedDatesCount} дата(ы) выбрано`;
                inputElement3.value = `Сумма: ${totalPrice} форинтов`;
                inputElement4.value = `Цена: ${pricePerDayValue} форинтов`;

                totalPriceElement2.textContent = `${selectedDatesCount} * ${pricePerDayValue} ft`;

                totalPriceElement.textContent = `${totalPrice}`;

                },
            },

        };

        const calendar = new VanillaCalendar('#calendar', options);
        calendar.init();
    });



</script>


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

