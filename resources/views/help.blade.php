@extends('layouts.pages')

@section('title', 'Márka Motorcenter - Hasznos')
@section('description', 'Ezen az oldalon hasznos információkat talál a motorkerékpárok vásárlásával kapcsolatban.')

@section('content')

<section class="">

    <div class="" style="text-align: center;">
        <div class=" mt-5">
            <h2>Hasznos</h2>
            <div class="mb-1">Ezen az oldalon hasznos információkat talál a motorkerékpárok vásárlásával kapcsolatban.
            </div>
        </div>
    </div>


    <div class="container mb-5 mt-5">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            @php ($ico = 'fas fa-motorcycle')

            @endphp
            @foreach( $helps as $help )
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-heading{{ $help->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapse{{ $help->id }}" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapse{{ $help->id }}">
                            <h5 class="mb-0">
                                <i class="{{ $help->ico }} text-danger mb-1 text-center" style="width: 27px;"></i>
                                {{-- <i class="{{ $help->id }} me-2 text-danger mb-1"></i> --}}
                                {{ $help->title }}
                            </h5>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse{{ $help->id }}" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-heading{{ $help->id }}">
                        <div class="accordion-body">
                            <p>
                                {!! $help->content !!}
                                {{-- {{ $help->content }} --}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<script>
    window.onload = function() {
        var hash = window.location.hash;
        if (hash) {
            var target = document.querySelector(hash);
            if (target) {
                target.classList.add('show');
            }
        }
    };

</script>

@endsection
