@extends('layouts.pages')

@section('content')

<section class="send_message_section" style="padding: 0px 0px 65px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="fade-right">
                <div class="choose_us_content">
                    <h6 class="mt-3">{{ $about->name }}</h6>
                    <h2>{{ $about->title }}</h2>
                    <p>
                        {!! $about->content1 !!}
                    </p>
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


<section class="choose_us-section" style="padding: 0px 0px 65px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="fade-up">
                <div class="choose_us_image">
                    <figure class="mb-0">
                        <img src="assets/images/aboutus6.png" alt="" class="img-fluid">
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"  data-aos="fade-up">
                <div class="choose_us_content">
                    <h6 class="mt-3">{{ $about->name }}</h6>
                    <p>
                        {!! $about->content2 !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="send_message_section" style="padding: 0px 0px 65px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="fade-right">
                <div class="choose_us_content">
                    <h6 class="mt-5">{{ $about->name }}s</h6>
                    <p>
                        {!! $about->content3 !!}
                    </p>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"  data-aos="fade-up">
                <div class="choose_us_image">
                    <figure class="mb-0">
                        <img src="assets/images/aboutus2.png" alt="" class="img-fluid">
                    </figure>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
