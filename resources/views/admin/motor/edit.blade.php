@extends('adminlte::page')

@section('title', 'Motor szerkesztése')

@section('content_header')
    <h3></h3>
@stop

@push('css')

<style>
    .note-btn.dropdown-toggle:after {
        content: none;
    }
    .note-dropdown-menu {
        min-width: 368px !important;
    }
</style>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/lang/summernote-hu-HU.min.js" integrity="sha512-jGhbe/5rvn7nWezY4crH/Qys+oJxOHCv9ACxjyys/pHGN/wbsnQRzBFfe9rHiF5qHKtksFFQ6VljJLH8nfruMw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


{{-- <script src="https://unpkg.com/sortablejs-make/Sortable.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-2.2.4.js"></script> --}}


    <!-- jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <!-- SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <!-- jQuery SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>


@endpush


@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif
<div class="conteiner pb-3">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title mt-1">Motor szerkesztése</h3>
        </div>
        {{-- @dump($motor) --}}
        <form action="{{ route('admin.motor.update' , $motor) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body mt-3">

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input name="top" type="checkbox" class="custom-control-input" id="customSwitch1" {{ $motor->top == 1 ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customSwitch1">Kiemelt Motor</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name_label" class="col-sm-1 col-form-label">Név</label>
                    <div class="col-sm-10">
                        <input name="name" class="form-control" id="name" value="{{ $motor->name }}"
                            placeholder="Ad meg a motor nevét" maxlength="80" minlength="3" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ár</label>
                            <input name="price" class="form-control" id="price" value="{{ $motor->price }}"
                                   placeholder="Ad meg a motor árát" maxlength="80" minlength="3" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Régi ár</label>
                            {{-- <label>Akcios ár</label> --}}
                            <input name="discount_price" class="form-control" id="discount_price"
                            value="{{ $motor->discount_price }}" placeholder="Ad meg a motor akcios árát" maxlength="80"
                            minlength="3" readonly>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="description_label" class="col-sm-12 col-form-label">Részletes leírás</label>
                    <div class="col-sm-12">
                        <textarea name="description" class="form-control" class="summernote" id="summernote" rows="5"
                            placeholder="Ad meg a motor leirását" maxlength="8000" minlength="3" required>{{ $motor->description }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="short_description_label" class="col-sm-2 col-form-label">További opciók</label>
                    <div class="col-sm-10">
                        <input name="short_description" class="form-control" id="short_description"
                            value="{{ $motor->short_description }}" placeholder="Ad meg a motor rövid leirását"
                            maxlength="180" minlength="3" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Évjárat</label>
                            <input name="year" class="form-control" id="year" value="{{ $motor->year }}"
                                   placeholder="Ad meg a motor évjáratát" maxlength="80" minlength="2" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Dátum</label>
                            <input name="driver_license" class="form-control" id="driver_license"
                            value="{{ $motor->driver_license }}" placeholder="Ad meg a motor dátumát" maxlength="80"
                            minlength="1">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Munkaütem</label>
                            <input name="cylinders" class="form-control" id="cylinders"
                            value="{{ $motor->cylinders }}" placeholder="Ad meg a motor munkaütemét" maxlength="80"
                            minlength="1">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Futott km</label>
                            <input name="km" class="form-control" id="km" value="{{ $motor->km }}"
                                   placeholder="Ad meg a motor futott km" maxlength="80" minlength="1" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Teljesítmény</label>
                            <input name="performance" class="form-control" id="performance"
                            value="{{ $motor->performance }}" placeholder="Ad meg a motor teljesítményét" maxlength="80"
                            minlength="1">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Hengerűrtartalom</label>
                            <input name="cylinders_cm3" class="form-control" id="cylinders_cm3"
                            value="{{ $motor->cylinders_cm3 }}" placeholder="Ad meg a motor hengerűrtartalmát" maxlength="80"
                            minlength="1">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label>Márka</label>
                            <select name="brand" class="form-control">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $motor->brand_id == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Kivitel</label>
                            <select name="category" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $motor->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Állapot</label>
                            <input name="condition" class="form-control" id="condition"
                            value="{{ $motor->condition }}" placeholder="Ad meg a motor állapotát" maxlength="80"
                            minlength="1">
                        </div>
                    </div>
                    <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label>Vezetői engedély</label>
                            <select name="driver_license" class="form-control">
                                <option value="yes" {{ $motor->driver_license == '1' ? 'selected' : '' }}>Szükséges</option>
                                <option value="no" {{ $motor->driver_license == '0' ? 'selected' : '' }}>Nem szükséges</option>
                            </select>
                        </div>
                    </div> -->
                </div>

                <div class="form-group">
                    <img src="{{ asset($motor->main_image) }}" class="img-thumbnail mb-3" alt="..." style="width: 100px;">

                    <div class="custom-file">
                        <input name="main_image" type="file" class="custom-file-input" id="main_image">
                        <label class="custom-file-label" for="customFile" >Fő kép</label>
                    </div>
                </div>



                <div class="form-group" >
                    <div id="items-1" class="sortable">
                        @foreach ($motor->images->sortBy('position') as $image)
                            <img src="{{ asset($image->url) }}" id="{{$image->url}}" data-id="{{$image->id}}" class="img-thumbnail mb-3" alt="..." style="width: 100px; max-height: 77px; cursor: move; object-fit: cover;">
                        @endforeach
                    </div>
                    

                    <input type="hidden" name="image_order" id="image_order" value="">


                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="images_id[]" multiple>
                        <label class="custom-file-label" for="customFile">Összes kép</label>
                    </div>
                    
                </div>



                <div class="form-group row">
                    <label class="ps-2" style="margin-left: 10px;">Youtube link</label>
                    <div class="col-sm-12">
                        <input name="video" class="form-control" id="video" value="{{ $motor->video }}"
                            placeholder="{{ $motor->video }}" maxlength="280" minlength="0">
                    </div>
                </div>
            </div>



            <div class="card-footer">
                <button type="submit" class="btn btn-success">Modosit</button>

                <a href="{{ route('admin.motor.index') }}" class="btn btn-default float-right">
                    Mégse
                </a>

            </div>

        </form>
    </div>

</div>


<script>
    // Summernote:
    $('#summernote').summernote({
        height: 150,
        lang: 'hu-HU',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });


    document.addEventListener('DOMContentLoaded', function () {
        const priceInput = document.getElementById('price');

        priceInput.addEventListener('input', function (e) {
            // Удаляем все пробелы
            let value = e.target.value.replace(/\s+/g, '');

            // Проверяем, что это число
            if (!isNaN(value)) {
                // Добавляем пробелы каждые три цифры
                e.target.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
            } else {
                // Если введено не число, очищаем поле
                e.target.value = '';
            }
        });

        // Форматируем поле при загрузке (если есть старое значение)
        if (priceInput.value) {
            priceInput.value = priceInput.value.replace(/\s+/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
                const discount_priceInput = document.getElementById('discount_price');

                discount_priceInput.addEventListener('input', function (e) {
                    // Удаляем все пробелы
                    let value = e.target.value.replace(/\s+/g, '');

                    // Проверяем, что это число
                    if (!isNaN(value)) {
                        // Добавляем пробелы каждые три цифры
                        e.target.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
                    } else {
                        // Если введено не число, очищаем поле
                        e.target.value = '';
                    }
                });

                // Форматируем поле при загрузке (если есть старое значение)
                if (discount_priceInput.value) {
                    discount_priceInput.value = discount_priceInput.value.replace(/\s+/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
                }
            });

    // SortJS Without options:


//     document.addEventListener('DOMContentLoaded', function () {
//     let sortable = new Sortable(document.getElementById('items-1'), {
//         animation: 150,
//         ghostClass: 'blue-background-class',
//         onSort: function (evt) {
//             updateImageOrder();
//         }
//     });

//     // Функция для обновления скрытого поля
//     function updateImageOrder() {
//         let order = [];
//         document.querySelectorAll('#items-1 img').forEach((img, index) => {
//             order.push({
//                 id: img.getAttribute('data-id'),
//                 position: index + 1
//             });
//         });
//         document.getElementById('image_order').value = JSON.stringify(order);
//         console.log('Image Order Updated:', document.getElementById('image_order').value); // Проверка в консоли
//     }

//     // Также обновляем перед отправкой формы на всякий случай
//     document.querySelector('form').addEventListener('submit', function () {
//         updateImageOrder();
//     });
// });




$('#items-1').sortable({
    group: 'list',
    animation: 200,
    ghostClass: 'ghost',
    onSort: updateImageOrder, // Обновляем порядок при каждом изменении
});

// Функция обновления порядка в скрытом инпуте
function updateImageOrder() {
    var order = [];
    $('#items-1 img').each(function (index) {
        order.push({
            id: $(this).data('id'),
            position: index + 1
        });
    });

    $('#image_order').val(JSON.stringify(order)); // Записываем в скрытый инпут
    console.log('Image Order Updated:', $('#image_order').val()); // Проверка в консоли
}

// Дополнительная проверка по кнопке (если нужна)
$('#get-order').click(function () {
    var sort1 = $('#items-1').sortable('toArray');
    console.log('Current order:', sort1);
});

</script>

@stop