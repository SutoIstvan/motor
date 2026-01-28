@extends('adminlte::page')

@section('title', 'Banner szerkesztése')

@section('css')
<style>
    .note-btn.dropdown-toggle:after {
        content: none;
    }
    .note-dropdown-menu {
        min-width: 368px !important;
    }

    .banner-preview {
        max-width: 100%;
        max-height: 400px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }
</style>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
@stop



@section('content')

    {{-- Сообщения --}}
    @if (session('success'))
        <div class="callout callout-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title mt-1">Banner szerkesztése</h3>
        </div>

        <div class="card-body">

            {{-- ✅ Превью баннера --}}
            @if($banner && $banner->image_path)
                <div class="mb-3 text-center">
                    <p><strong>Aktuális banner:</strong></p>
                    <img src="{{ $banner->image_path }}" alt="Banner" class="banner-preview">
                </div>

                {{-- ❌ Кнопка удаления --}}
                <form action="{{ route('admin.banner.delete') }}" method="POST"
                      onsubmit="return confirm('Biztosan törlöd a bannert?');"
                      class="mb-4 text-center">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Banner törlése
                    </button>
                </form>
            @else
                <p class="text-muted text-center mb-4">
                    Nincs feltöltött banner.
                </p>
            @endif

            {{-- ⬆️ Загрузка нового баннера --}}
            <form action="{{ route('admin.banner.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf



                <div class="form-group">
                    <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="customFile">Új banner feltöltése</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">
                    Banner feltöltése
                </button>
            </form>

        </div>
    </div>

@stop
