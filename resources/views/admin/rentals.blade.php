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

<style>

.vanilla-calendar-day {
    width: 33px !important;
    height: 33px !important;

}
.vanilla-calendar-day__btn {
    font-size: 14px !important;
}
.vanilla-calendar-day__btn_selected {
    font-size: 14px !important;
}

</style>

{{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>


<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',

        height: '600px',
        selectable: true,
        events: {!! json_encode($events) !!}, // Передаем события из PHP массива
        eventDisplay: 'block',
        displayEventTime: false,
      });
      calendar.render();
    });

  </script> --}}

  <link href="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro/build/vanilla-calendar.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro/build/vanilla-calendar.min.js" defer></script>


<script>
document.addEventListener('DOMContentLoaded', () => {
    const disabledDates = [];
    @foreach ($events as $start => $end)
        disabledDates.push('{{ $start }}:{{ $end }}');
    @endforeach

    const totalPriceElement = document.getElementById('total-price2');

    const inputElement = document.getElementById('calendar-input');
    const inputElement2 = document.getElementById('days-input');
    const pricePerDay = 100;
    const pricePerDay2 = 80;
    const pricePerDay3 = 50;

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
                time: 24,
                day: 'multiple-ranged',
            },
            visibility: {
                weekend: false,
                daysOutside: false,
            },
            lang: 'Hu',
        },
        actions: {
            // clickDay: function(event, self) {
            //     const selectedDates = self.selectedDates;
            //     const selectedDatesCount = selectedDates.length;
            //     inputElement2.value = `${selectedDatesCount} дата(ы) выбрано`;
            // },
            clickDay(event, self) {
            const selectedDates = self.selectedDates;
            const selectedDatesCount = selectedDates.length;

            if (selectedDatesCount > 7) {
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


            totalPriceElement.textContent = `Общая сумма: ${totalPrice} форинтов`;

            },
        },

    };

    const calendar = new VanillaCalendar('#calendar', options);
    calendar.init();
});



</script>

@endsection

@section('content')
{{-- @dump($events) --}}
    {{-- <div id='calendar' class="pb-4"></div> --}}
    <div id="calendar"></div>

    <div class="row">
        <input class="mt-4 form-control col-3 pe-2 d-none " type="text" id="calendar-input">
        <input class="mt-4 form-control col-3 pe-2" type="text" id="days-input">
        <input class="mt-4 form-control col-3 pe-2" type="text" id="price">
        <input class="mt-4 form-control col-3 pe-2" type="text" id="total-price">

        <div>total:
            <span id="total-price2"></span>
        </div>
    </div>


@stop
