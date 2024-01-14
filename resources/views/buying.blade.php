@extends('layouts.pages')

@section('css')
    <style>
        p {
            font-size: 16px;
            line-height: 5px;
        }

        .send_message_form_box_content textarea {
            border-radius: 5px !important;
        }

        /* .send_message_form_box_content {
            background-color: #9c5252;
            width: 99%;
            border-radius: 15px;
            padding: 60px 25px;
            border-bottom: 2px solid var(--e-global-color-accent);
            margin-left: 10px;
        } */
    </style>
@stop

@section('content')

    <section class="send_message_section" style="padding: 10px 0px 0px 0px;">
        <div class="container">
            <div class="row aos-init aos-animate" data-aos="fade-up">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                    <div class="mt-5">
                        <h6 class="">Kérem, figyelmesen olvassa el a tájékoztatót!</h6>

                        <h2>Tisztelt Felhasználó!</h2>

                        <div class="mb-5 mt-3">
                            <p>
                                Cégünk foglakozik azonnali, készpénzes felvásárlással, rögtön a kezébe adjuk a pénzt, ha
                                előnyös üzletet tudunk kötni, viszont pár dolgot ehhez érdemes tudni.
                            </p>
                            <p>
                                Sajnos idős motorokat nem áll módunkban felvásárolni, ugyanis az öreg motorok is viszonylag
                                értékállóak, azonban az eladásuk rendkívül nehéz, mivel aránylag kicsi árbeli különbséggel,
                                klasszisokkal jobb évjáratot lehet kapni! Pl: egy 1999-es (Naked bike) 600-as piaci ára most
                                is 400.000 Ft-tól 750.000 Ft-ig terjed, viszont egy 2005-ös modellt már 650.000 Ft-tól
                                800.000Ft-ig meg lehet vásárolni! Itt annyira kicsi az áruk közti különbség, hogy nem éri
                                meg az időset választani. Mellesleg a koros motor hitelképtelen! Ezért főképp 2002 utáni
                                motor érdekel bennünket. Az ennél fiatalabbat klasszisokkal jobb árban kell vennünk, mint a
                                piaci ára, különben mi sem tudjuk értékesíteni!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container ">
        <div class="row  mb-5 g-2 d-flex justify-content-center">
                <div class="mx-1 col-lg-4 col-md-4 col-sm-12 col-xs-12 order-md-last rounded-4" style="
                    background-color: #d74949;
                    ">

                    <div class="send_message_box_content mt-5 mt-3 p-3">
                        <h6>Kérem</h6>
                        <p style="color: #fff;">
                            csak abban az esetben küldje el az ajánlatkérését, ha sürgős az eladás, illetve valóban el
                            szeretné adni a járgányát. és elfogadta, hogy mélyen piaci ár alatt tudunk csak adni érte!!!
                            Tömegével érkeznek az eladásra felkínált járművek (napi 30-50db) , így valóban, csak a
                            rendkívül alkalmi áras motorokat tudjuk felvásárolni, kérem ennek tudatában adja meg az
                            irányárat!
                        </p>
                        <p style="color: #fff;">
                            Elsősorban Japán motorok 500-800 ccm-ig, 2004-2010- évjáratig érdekelnek bennünket, de természetesen meghallgatunk minden ajánlatot. Ép, motorhibás,  makulátlan, külföldi- és magyar rendszámos (hitellel  terhelt) motor is CSAKIS RENDEZETT PAPÍROKKAL. KÉSZPÉNZBEN FIZETÜNK AZONNAL, de kérem csak alkalmi ajánlatokkal keressenek. Amennyiért ön sem gondolkodna, ha ön lenne a vevő helyében!
                        </p>
                    </div>
                </div>
                <div class="mx-1 col-lg-7 col-md-7 col-sm-12 col-xs-12     buying">
                    <h4 class="mb-3">Ajánlat kérés</h4>
                    <form class="needs-validation" novalidate="">
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <label for="firstName" class="form-label">E-mail cím</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value=""
                                    required="">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label for="lastName" class="form-label">Telefonszám</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value=""
                                    required="">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label for="lastName" class="form-label">Nev</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value=""
                                    required="">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="col-md-4">
                                <label for="country" class="form-label">Gyártmány</label>
                                <select class="form-select" id="country" required="">
                                    <option value="">Kérem válasszon...</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">Kivitel</label>
                                <select class="form-select" id="state" required="">
                                    <option value="">Kérem válasszon...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="zip" class="form-label">Típus</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>


                        <div class="row gy-3 mt-2">

                            <div class="col-md-4">
                                <label for="state" class="form-label">Állapot</label>
                                <select class="form-select" id="state" required="">
                                    <option value="">Kérem válasszon...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">Évjárat</label>
                                <select class="form-select" id="state" required="">
                                    <option value="">Kérem válasszon...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="cc-cvv" class="form-label">Irányár</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">km</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">

                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-md-8">
                                <label for="cc-cvv" class="form-label">Link</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="hasznaltauto.hu stb." required="">
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="cc-name" class="form-label">Egyéb opciók, leírások</label>
                                <textarea type="text" class="form-control" id="cc-name" placeholder="" required=""></textarea>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>
                        </div>

                        <label for="cc-name" class="form-label mt-3">Okmányok jellege</label>

                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Magyarországi</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Külföldi</label>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="mt-3">
                            <label for="formFileMultiple" class="form-label">Fényképek (jpg, jpeg, gif)</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple>
                        </div>

                        <div class="col-sm-12 mt-4">
                            {{-- <input type="checkbox" class="form-check-input" id="save-info">
                            <label class="form-check-label" for="save-info">Elfogadom</label> --}}

                            <p style="  font-size: 14px;">Az alábbi űrlap kitöltésével Ön beleegyezik személyes adatainak gyűjtésébe és tárolásába. Az adatokat kizárólag a webhelyünkön történő kommunikációra használjuk, és semmilyen körülmények között nem adjuk át harmadik feleknek.</p>

                            <input type="checkbox" id="gdprCheckbox" name="gdprCheckbox">
                            <label for="gdprCheckbox">Elfogadom az <a href="#">adatkezelési feltételeket.</a></label>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button class="w-50 btn btn-danger  rounded-pill btn-lg mt-3" type="submit">Ajánlat kérés</button>
                        </div>

                    </form>
                </div>
        </div>
    </div>

@endsection
