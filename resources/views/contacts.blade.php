@extends('layouts.pages')

@section('css')
<style>
p {
    font-size: 16px;
    line-height: 5px;
}
</style>
@stop

@section('content')

<section class="send_message_section" style="padding: 31px 0px 65px 0px;">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                <div class="mt-4">
                    <h6>{{ $contacts->title }}</h6>

                    <div class="mb-5 mt-3">{!! $contacts->content1 !!}</div>
                </div>
            </div>
        </div>

        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                <div class="mt-1 mb-5">
                    <h6>Nyitvatartásunk</h6>

                    <div>{{ $contacts->content2 }}</div>
                    <div>{{ $contacts->content3 }}</div>
                    <div>{{ $contacts->content4 }}</div>
                </div>
            </div>
        </div>

        <div class="row mb-5" data-aos="fade-up">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="in_touch_box in_touch_box2">
                        <div class="in_touch_box_image">
                            <figure class="mb-0">
                                <img src="./assets/images/contact_location_image.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="in_touch_box_content">
                            <h4>{{ $contacts->address1 }}</h4>
                            <p class="mb-0"><a  class="text-decoration-none">
                                {{ $contacts->address2 }}</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="in_touch_box in_touch_box2">
                        <div class="in_touch_box_image">
                            <figure class="mb-0">
                                <img src="./assets/images/contact_phone_image.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="in_touch_box_content">
                            <h4>Hívjon még ma:</h4>
                            <p class="mb-0"><a href="tel:(+61383766284)" class="text-decoration-none">
                                {{ $contacts->phone }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="in_touch_box in_touch_box2">
                        <div class="in_touch_box_image">
                            <figure class="mb-0">
                                <img src="./assets/images/contact_mail_image.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="in_touch_box_content">
                            <h4>Email</h4>
                            <p class="mb-0"><a href="mailto:{{ $contacts->email }}"
                                    class="text-decoration-none">{{ $contacts->email }}</a></p>

                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10962.45902940224!2d18.8530333!3d46.6146158!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47425c5fe20dd68d%3A0x4411e2d0ea9303fe!2sM%C3%A1rka%20Motorcenter%20Bt.!5e0!3m2!1sru!2sua!4v1697271680727!5m2!1sru!2sua"
                width="100%" height="500px" style="border:0; border-radius: 15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>


        {{-- <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="send_message_box_content">
                    <h6>Nyitvatartásunk:</h6>
                    <br>
                    <div style="color: #fff;">{{ $contacts->content2 }}</div>
                    <div style="color: #fff;">{{ $contacts->content3 }}</div>
                    <div style="color: #fff;">{{ $contacts->content4 }}</div>

                    <br>
                    <div style="align-content: center;">
                        <div class="mb-4   ">
                            <i class="fa-sharp fa-solid fa-envelope"></i>
                            <span class="call_us d-block">email</span>
                            <span class="phone_num">{{ $contacts->email }}</span>
                        </div>
                        <div class="mb-4   ">
                            <i class="fa-solid fa-location-dot location"></i>
                            <span class="call_us d-block">{{ $contacts->address1 }}</span>
                            <span class="phone_num">{{ $contacts->address2 }}</span>
                        </div>
                        <div class="mb-4   ">
                            <i class="fa-solid fa-phone"></i>
                            <span class="call_us d-block">Hívjon még ma:</span>
                            <span class="phone_num">{{ $contacts->phone }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10962.45902940224!2d18.8530333!3d46.6146158!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47425c5fe20dd68d%3A0x4411e2d0ea9303fe!2sM%C3%A1rka%20Motorcenter%20Bt.!5e0!3m2!1sru!2sua!4v1697271680727!5m2!1sru!2sua"
                    width="100%" height="100%" style="border:0; border-radius: 15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div> --}}
    </div>
</section>

@endsection
