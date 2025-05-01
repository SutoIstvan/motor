@if ($view === 'grid')
    @foreach ($motors as $motor)
        <div class="col-lg-4 col-md-4 col-xs-12 mb-4">
            <a href="{{ route('motor.show', $motor) }}" style="text-decoration: none; color: inherit;">
                <div class="tile">
                    <div class="wrapper">
                        <div class="dates">
                            <div class="start">
                                {{-- <div class="card-title ms-auto">{{ Str::limit($motor->name, 22) }}</div> --}}
                                <div class="card-title ms-auto" style="min-height: 49px">{{ $motor->name }}</div>

                                <div>
                                    @if ($motor->discount_price)
                                        <div class="price">{{ number_format($motor->price, 0, '.', ' ') }} Ft</div>
                                        <div class="price float-end"
                                            style="text-decoration: line-through; font-size: 13px; margin-block: -30px;">
                                            {{ number_format($motor->discount_price, 0, '.', ' ') }} Ft
                                        </div>
                                    @else
                                        <div class="price">{{ number_format($motor->price, 0, '.', ' ') }} Ft</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="banner-img">
                            <div id="carouselExampleIndicators{{ $motor->id }}" class="carousel slide"
                                data-bs-ride="carousel" data-bs-interval="5000000" data-bs-touch="true">

                                <div class="carousel-indicators">
                                    <button type="button"
                                        data-bs-target="#carouselExampleIndicators{{ $motor->id }}"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    @foreach ($motor->images->take(5) as $key => $image)
                                        <button type="button"
                                            data-bs-target="#carouselExampleIndicators{{ $motor->id }}"
                                            data-bs-slide-to="{{ $key + 1 }}"></button>
                                    @endforeach
                                </div>

                                <div class="carousel-inner imgc">
                                    <div class="carousel-item active ">
                                        <img src="{{ asset($motor->main_image) }}" class="d-block w-100" alt="...">
                                    </div>
                                    @foreach ($motor->images->take(5) as $key => $image)
                                        <div class="imgc carousel-item">
                                            <img src="{{ $image->url }}" class="d-block w-100" alt="...">
                                        </div>
                                    @endforeach

                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators{{ $motor->id }}"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators{{ $motor->id }}"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                @if ($motor->created_at->diffInDays(now()) <= 30 || $motor->updated_at->diffInDays(now()) <= 30)
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
                                {{ $motor->performance }} <strong>Kw</strong>
                            </div>
                            <div>
                                {{ number_format($motor->km, 0, '', ' ') }}<strong>km</strong>
                            </div>
                        </div>

                        <div class="dates" style="color: #727272; font-size:13px">
                            <div>
                                Egyéb opciók: {{ Str::limit($motor->short_description, 50) }}
                            </div>
                        </div>

                    </div>
                </div>
            </a>
        </div>
    @endforeach
@else
    @foreach ($motors as $motor)
        <div class="col-lg-12 col-md-12 col-xs-12 mb-4">
            <a href="{{ route('motor.show', $motor) }}" style="text-decoration: none; color: inherit;">
                <div class="tilelist">
                    <div class="wrapper d-flex justify-content-between">
                        <div class="banner-img col-4">
                            <div id="carouselExampleIndicators{{ $motor->id }}" class="carousel slide"
                                data-bs-ride="carousel" data-bs-interval="5000000" data-bs-touch="true">

                                <div class="carousel-indicators">
                                    <button type="button"
                                        data-bs-target="#carouselExampleIndicators{{ $motor->id }}"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    @foreach ($motor->images->take(5) as $key => $image)
                                        <button type="button"
                                            data-bs-target="#carouselExampleIndicators{{ $motor->id }}"
                                            data-bs-slide-to="{{ $key + 1 }}"></button>
                                    @endforeach
                                </div>

                                <div class="carousel-inner imgc">
                                    <div class="carousel-item active ">
                                        <img src="{{ asset($motor->main_image) }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                    @foreach ($motor->images->take(5) as $key => $image)
                                        <div class="imgc carousel-item">
                                            <img src="{{ $image->url }}" class="d-block w-100" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators{{ $motor->id }}"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators{{ $motor->id }}"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                @if ($motor->created_at->diffInDays(now()) <= 30 || $motor->updated_at->diffInDays(now()) <= 30)
                                    <div class="new-product-corner">
                                        <img src="{{ asset('assets/new.png') }}" alt="New Product">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="dateslist col-8">
                            <div class="start" style="padding: 0px 20px 0px 20px">
                                <div class="card-title ms-auto ">{{ $motor->name }}
                                </div>
                                <div>
                                    @if ($motor->discount_price)
                                        <div class="price">{{ number_format($motor->price, 0, '.', ' ') }} Ft
                                            <small class="ms-3" style="text-decoration: line-through;">
                                                {{ number_format($motor->discount_price, 0, '.', ' ') }} Ft
                                            </small>
                                        </div>
                                    @else
                                        <div class="price">{{ number_format($motor->price, 0, '.', ' ') }} Ft
                                        </div>
                                    @endif
                                </div>
                                <div class="dateslist" style="color: #727272; height:85px">
                                    <div>
                                        Egyéb opciók: {{ Str::limit($motor->short_description, 190) }}
                                    </div>
                                </div>
                                <div class="d-flex justify-content">
                                    <div>
                                        Évjárat: <strong>{{ $motor->year }}</strong>
                                    </div>
                                    <div class="ms-3">
                                        cm<sup>3</sup>: <strong> {{ $motor->cylinders_cm3 }}</strong>
                                    </div>
                                    <div class="ms-3">
                                        {{ $motor->performance }} <strong>Kw</strong>
                                    </div>
                                    <div class="ms-3">
                                        Km: <strong>{{ number_format($motor->km, 0, '', ' ') }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@endif
