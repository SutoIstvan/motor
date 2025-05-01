@extends('layouts.pages')

@section('title', 'Márka Motorcenter - Felvásárlás')
@section('description', 'Cégünk foglakozik azonnali, készpénzes motor felvásárlással, rögtön a kezébe adjuk a pénzt, ha előnyös üzletet tudunk kötni.')

@section('css')
    <style>
        p {
            font-size: 16px;
            line-height: 5px;
        }

        .send_message_form_box_content textarea {
            border-radius: 5px !important;
        }

        ::placeholder {
            color: #ff0000;
        }

        #cc-cvv::placeholder {
            color: #ff0000 !important;
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

            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning mt-5 justify-content-center" style="text-align: center" role="alert">
                        <strong>{{ $error }}</strong>
                    </div>
                @endforeach
            @endif

            <div class="row aos-init aos-animate" data-aos="fade-up">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                    <div class="mt-5">
                        <h6 class="">{{ $felvasarlas->name }}</h6>

                        <h2>{{ $felvasarlas->title }}</h2>

                        <div class="mb-5 mt-3">
                            <p>
                                {{ $felvasarlas->content1 }}
                            </p>
                            <p>
                                {{ $felvasarlas->content2 }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container ">

        <div class="row  mb-5 g-2 d-flex justify-content-center">

            <div class="mx-1 col-lg-4 col-md-4 col-sm-12 col-xs-12 order-md-last rounded-4"
                style="
                    background-color: #d74949;
                    ">

                <div class="send_message_box_content mt-5 mt-3 p-3">
                    <h6>Kérem</h6>
                    <p style="color: #fff;">
                        {{ $felvasarlas->content3 }}
                    </p>
                    {{-- <p style="color: #fff;">
                        Elsősorban Japán motorok 500-800 ccm-ig, 2004-2010- évjáratig érdekelnek bennünket, de természetesen
                        meghallgatunk minden ajánlatot. Ép, motorhibás, makulátlan, külföldi- és magyar rendszámos (hitellel
                        terhelt) motor is CSAKIS RENDEZETT PAPÍROKKAL. KÉSZPÉNZBEN FIZETÜNK AZONNAL, de kérem csak alkalmi
                        ajánlatokkal keressenek. Amennyiért ön sem gondolkodna, ha ön lenne a vevő helyében!
                    </p> --}}
                </div>
            </div>
            <div class="mx-1 col-lg-7 col-md-7 col-sm-12 col-xs-12 buying">
                <h4 class="mb-3">Ajánlat kérés</h4>
                {{-- <form action="test" class="" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <label for="email" class="form-label">E-mail cím</label>
                            <input name="email" type="email" class="form-control" id="email" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="phone" class="form-label">Telefonszám</label>
                            <input name="phone" type="text" class="form-control" id="phone" required>
                        </div>

                        <div class="col-sm-4">
                            <label for="name" class="form-label">Név</label>
                            <input name="name" type="text" class="form-control" id="name" required>
                        </div>

                        <hr class="my-4">

                        <div class="col-md-4">
                            <label for="gyartmany" class="form-label">Gyártmány</label>
                            <input name="gyartmany" type="text" class="form-control" id="gyartmany" required>
                        </div>

                        <div class="col-md-4">
                            <label for="tipus" class="form-label">Típus</label>
                            <input name="tipus" type="text" class="form-control" id="tipus" required>
                        </div>

                        <div class="col-md-4">
                            <label for="km" class="form-label">Km</label>
                            <input name="km" type="text" class="form-control" id="km" required>
                        </div>
                    </div>


                    <div class="row gy-3 mt-2">

                        <div class="col-md-4">
                            <label for="allapot" class="form-label">Állapot</label>
                            <input name="allapot" type="text" class="form-control" id="allapot" required>
                        </div>

                        <div class="col-md-4">
                            <label for="ev" class="form-label">Évjárat</label>
                            <input name="ev" type="text" class="form-control" id="ev" required>
                        </div>

                        <div class="col-md-4">
                            <label for="ar" class="form-label">Irányár</label>
                            <input name="ar" type="text" class="form-control" id="ar" required>
                        </div>

                        <div class="col-md-12">
                            <label for="link" class="form-label">Link: hasznaltauto.hu stb.</label>
                            <input name="link" type="text" class="form-control" id="link" required>
                        </div>

                        <div class="col-md-12">
                            <label for="leiras" class="form-label">Egyéb opciók, leírások</label>
                            <textarea name="leiras" type="text" class="form-control" id="leiras" required></textarea>
                        </div>
                    </div>

                    <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label mt-3">Okmányok jellege</label>
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="magyar" onchange="toggleInput()">
                                    <label class="form-check-label" for="inlineRadio1">Magyarországi</label>
                                </div>
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="kulfoldi" onchange="toggleInput()">
                                    <label class="form-check-label" for="inlineRadio2">Külföldi</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3" id="rendszam" style="display: none">
                                <label for="rendszam" class="form-label">Rendszám</label>
                                <input name="rendszam" type="text" class="form-control" id="rendszam" required>
                            </div>
                    </div>

                    <hr class="my-4">

                    <div class="mt-3">
                            <label for="formFileMultiple" class="form-label">Fényképek (jpg, jpeg, gif)</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple>
                        </div>

                    <div class="col-sm-12 mt-4">

                            <p style="  font-size: 14px;">Az alábbi űrlap kitöltésével Ön beleegyezik személyes adatainak gyűjtésébe és tárolásába. Az adatokat kizárólag a webhelyünkön történő kommunikációra használjuk, és semmilyen körülmények között nem adjuk át harmadik feleknek.</p>

                            <input type="checkbox" id="gdprCheckbox" name="gdprCheckbox">
                            <label for="gdprCheckbox">Elfogadom az <a href="#">adatkezelési feltételeket.</a></label>
                        </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="w-50 btn btn-danger  rounded-pill btn-lg mt-3">Ajánlat
                            kérés</button>
                    </div>

                </form> --}}


                <form action="{{ route('buying.store') }}" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="col-md-4">
                        <label for="validationname" class="form-label">Név</label>
                        <input name="name" type="text" class="form-control" id="validationname" required>
                        <div class="valid-feedback">
                            Helyes!
                        </div>
                        <div class="invalid-feedback">
                            Név kötelező!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationtel" class="form-label">Telefonszám</label>
                        <input name="tel" type="text" class="form-control" id="validationtel" required>
                        <div class="valid-feedback">
                            Helyes!
                        </div>
                        <div class="invalid-feedback">
                            Telefonszám kötelező!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationemail" class="form-label">E-mail cím</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input name="email" type="email" class="form-control" id="validationemail"
                                aria-describedby="inputGroupPrepend" required>
                            <div class="valid-feedback">
                                Helyes!
                            </div>
                            <div class="invalid-feedback">
                                Korekt e-mail cím kötelező!
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="validationgyartmany" class="form-label">Gyártmány</label>
                        <input name="gyartmany" type="text" class="form-control" id="validationgyartmany" required>
                        <div class="valid-feedback">
                            Helyes!
                        </div>
                        <div class="invalid-feedback">
                            Gyártmány kötelező!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationtipus" class="form-label">Típus</label>
                        <input name="tipus" type="text" class="form-control" id="validationtipus" required>
                        <div class="valid-feedback">
                            Helyes!
                        </div>
                        <div class="invalid-feedback">
                            Típus kötelező!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationkm" class="form-label">Km</label>
                        <input name="km" type="text" class="form-control" id="validationkm" required>
                        <div class="valid-feedback">
                            Helyes!
                        </div>
                        <div class="invalid-feedback">
                            Km kötelező!
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="validationallapot" class="form-label">Állapot</label>
                        <input name="allapot" type="text" class="form-control" id="validationallapot" required>
                        <div class="valid-feedback">
                            Helyes!
                        </div>
                        <div class="invalid-feedback">
                            Állapot kötelező!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationev" class="form-label">Évjárat</label>
                        <input name="ev" type="text" class="form-control" id="validationev" required>
                        <div class="valid-feedback">
                            Helyes!
                        </div>
                        <div class="invalid-feedback">
                            Évjárat kötelező!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationar" class="form-label">Irányár</label>
                        <input name="ar" type="text" class="form-control" id="validationar" required>
                        <div class="valid-feedback">
                            Helyes!
                        </div>
                        <div class="invalid-feedback">
                            Irányár kötelező!
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="validationlink" class="form-label">Link a létező hirdetményre: hasznaltauto.hu kepesmotor.hu stb.</label>
                        <input name="link" type="text" class="form-control" id="validationlink">
                        <div class="valid-feedback">
                            Helyes!
                        </div>
                        <div class="invalid-feedback">
                            Link kötelező!
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="validationleiras" class="form-label">Egyéb opciók, leírások</label>
                        <textarea name="leiras" rows="3" class="form-control" id="validationleiras" required></textarea>
                        {{-- <input name="leiras" type="text" class="form-control" id="validationleiras" required> --}}
                        <div class="valid-feedback">
                            Helyes!
                        </div>
                        <div class="invalid-feedback">
                            Egyéb opciók, leírások kötelezőek!
                        </div>
                    </div>

                    {{-- <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">City</label>
                        <input type="text" class="form-control" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">State</label>
                        <select class="form-select" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="validationCustom05" required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div> --}}

                    <div class="row mt-3 col-md-8">
                        <label for="validationleiras" class="form-label">Okmányok jellege</label>

                        <div class="form-check col-md-5 ms-3 mt-3">
                            <input type="radio" class="form-check-input" id="validationFormCheck2" name="inlineRadioOptions" value="magyar" onchange="toggleInput()" required>
                            <label class="form-check-label" for="validationFormCheck2">Magyarországi</label>
                            <div class="invalid-feedback">Kötelező!</div>

                        </div>
                          <div class="form-check col-md-3 mt-3">
                            <input type="radio" class="form-check-input" id="validationFormCheck3" name="inlineRadioOptions" value="kulfodi" onchange="toggleInput()" required>
                            <label class="form-check-label" for="validationFormCheck3">Külföldi</label>
                            {{-- <div class="invalid-feedback">More example invalid feedback text</div> --}}
                          </div>

                    </div>
                    <div class="col-md-4 mt-3" id="rendszamDiv" style="display: none">
                        <label for="rendszam" class="form-label">Rendszám</label>
                        <input name="rendszam" type="text" class="form-control" id="rendszam" >
                        <div class="invalid-feedback">Rendszám kötelező!</div>
                    </div>


                    <div class="mb-2 mt-4">
                        <label for="validationleiras" class="form-label">Fényképek száma 5 - 10 kép, mindegyik mérete max 5 MB (jpg, jpeg)</label>
                        <input type="file" class="form-control" aria-label="file example" id="images" name="images_id[]" accept=".jpg, .jpeg" multiple required>
                        <div class="valid-feedback">Helyes!</div>
                        <div class="invalid-feedback">Fényképek feltöltése kötelező! Legalább 5 kép, max 10 kép, mindegyik mérete legfeljebb 5 MB lehet. Formátum (jpg, jpeg)</div>
                    </div>

                    <div class="col-md-12">
                        <p class="me-1 ms-1" style="font-size: 16px">Az alábbi űrlap kitöltésével Ön beleegyezik személyes adatainak gyűjtésébe és tárolásába. Az adatokat kizárólag a webhelyünkön történő kommunikációra használjuk, és semmilyen körülmények között nem adjuk át harmadik feleknek.</p>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Elfogadom az <a href="{{ route('gdpr') }}" target="_blank">adatkezelési feltételeket.</a>
                            </label>
                            <div class="invalid-feedback">
                                Az adatkezelési feltételeket kötelező elfogadni.
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                          <button class="btn btn-primary" type="submit">Submit form</button>
                        </div> --}}
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="w-50 btn btn-danger  rounded-pill btn-lg mt-3">Ajánlat
                            kérés</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        (() => {
            'use strict';

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        // После успешной валидации переходим на нужный маршрут
                        window.location.href = form.getAttribute('action');
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();

        function toggleInput() {
            var radio = document.querySelector('input[name="inlineRadioOptions"]:checked');
            var plateNumberInput = document.getElementById('rendszam');
            var rendszamDiv = document.getElementById('rendszamDiv'); // Получаем элемент родителя инпута

            if (radio && radio.value === 'magyar') {
                rendszamDiv.style.display = 'block'; // Отображаем родительский блок
                plateNumberInput.setAttribute('required', 'required'); // Устанавливаем атрибут required для инпута
            } else {
                rendszamDiv.style.display = 'none'; // Скрываем родительский блок
                plateNumberInput.removeAttribute('required'); // Удаляем атрибут required для инпута
            }
        }

        document.getElementById('images').addEventListener('change', function() {
            const files = this.files;
            const maxFiles = 10;
            const minFiles = 5;
            const maxSize = 5 * 1024 * 1024; // 3MB in bytes
            let valid = true;

            if (files.length < minFiles || files.length > maxFiles) {
                valid = false;
            }

            for (let i = 0; i < files.length; i++) {
                if (files[i].size > maxSize) {
                    valid = false;
                    break;
                }
            }

            if (!valid) {
                this.setCustomValidity('Kérjük, töltsön fel 5-10 képet, mindegyik legfeljebb 3 MB méretű.');
            } else {
                this.setCustomValidity('');
            }
        });

    </script>

@endsection
