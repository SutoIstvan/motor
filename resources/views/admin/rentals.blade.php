@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="">
        <div class="row mb-2">
            <div class="col-sm-2">
                <h1>Kölcsönzés</h1>
            </div>
            <div class="col-sm-10">
                <form method="post" action="{{ route('rentals.updateVisibility', $menu) }}">
                    @csrf
                    @method('PATCH')

                    <button type="submit" name="is_visible" class="btn btn-{{ $menu->is_visible ? 'danger' : 'success' }} btn-sm mb-3"
                        value="{{ $menu->is_visible ? 0 : 1 }}">
                        <i class="fas fa-power-off fa-sm"></i>
                        {{ $menu->is_visible ? 'Kikapcsolás' : 'Aktiválás' }}
                    </button>

                </form>
            </div>
        </div>
    </div>
@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>


<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: '600px',
        selectable: true,

      });
      calendar.render();
    });

  </script>
@endsection

@section('content')

    <div id='calendar' class="pb-4"></div>

@stop
