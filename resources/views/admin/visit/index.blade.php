@extends('adminlte::page')

@section('css')
<!-- Date Range Picker CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

<!-- Moment.js -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>

<style>
.form-group {
    margin-bottom: 0rem !important;
    margin-left: 19px;
}
</style>



@stop

@section('title', 'Vezérlőpult')

@section('content_header')
    <h1></h1>
@stop

@section('content')


    <div>
        {{-- Visitor: {{$visit->visit_count_total}} --}}
    </div>

    <div>
        {{-- @foreach ($popularmotor as $motor)
            Nev:{{ $motor->name }} visit:{{ $motor->visit_count_total }} <br>
        @endforeach --}}

        <div class="btn-group mb-3">
            <a href="{{ route('admin.visit.filter', 'all') }}" class="btn btn-{{ $period == 'all' ? 'primary' : 'secondary' }}">Összes idő</a>
            <a href="{{ route('admin.visit.filter', 'week') }}" class="btn btn-{{ $period == 'week' ? 'primary' : 'secondary' }}">Ezen a héten</a>
            <a href="{{ route('admin.visit.filter', 'month') }}" class="btn btn-{{ $period == 'month' ? 'primary' : 'secondary' }}">Ebben a hónapban</a>
            <a href="{{ route('admin.visit.filter', 'last-month') }}" class="btn btn-{{ $period == 'last-month' ? 'primary' : 'secondary' }}">Múlt hónapban</a>
            <a href="{{ route('admin.visit.filter', 'year') }}" class="btn btn-{{ $period == 'year' ? 'primary' : 'secondary' }}">Ebben az évben</a>
            
        
        
        <!-- Форма для выбора дат -->
        <form action="{{ route('admin.visit.custom') }}" method="GET" class="d-flex align-items-center">
            @php
                $config = [
                    "locale" => ["format" => "YYYY-MM-DD"],
                    "opens" => "center",
                ];
            @endphp
        
            <x-adminlte-date-range name="date_range" :config="$config" style="margin-bottom: 0px !important">
                <x-slot name="prependSlot" >
                    <div class="input-group-text bg-gradient-info" >
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-date-range>
        
            {{-- <button type="submit" class="btn btn-primary">Показать</button> --}}
        </form>

        
        </div>



        <div class="card card-default mt-4">
            <div class="card-header">
                <h3 class="card-title">Legnézetteb motorok</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>


    
            {{-- <div class="card-body"> --}}
            <div class="">
    
                <div class="chart">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    {{-- <canvas id="myChart" style="width:100%;height:300px"></canvas> --}}
                    <div class="card-footer p-0">
    
                        <ul class="nav flex-column">
    
                            @foreach ($popularmotor as $motor)
                                <li class="nav-item">
    
                                    <a href="{{ route('motor.show', $motor) }}" target="_blank" class="nav-link">
                                        <img src="{{ asset($motor->main_image) }}" height="40px" style="width: 60px; height:40px ;object-fit: cover; margin-right: 8px;">
    
                                        {{ $motor->name }} <span class="float-right badge bg-info mt-2">{{ $motor->visit_count_total }}</span>
                                    </a>
                                </li>
                            @endforeach
    
                        </ul>
                    </div>
    
                </div>
            </div>
        </div>
        <br>
    </div>


@stop


@section('js')

<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script>
$(document).ready(function () {
    // Получаем параметры из URL
    const urlParams = new URLSearchParams(window.location.search);
    const dateRange = urlParams.get('date_range');

    // Устанавливаем начальные значения в Date Range Picker
    $('#date_range').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD',
            applyLabel: 'Alkalmaz',
            cancelLabel: 'Mégsem',
            fromLabel: 'Kezdő dátum',
            toLabel: 'Befejező dátum',
            customRangeLabel: 'Egyedi tartomány',
            daysOfWeek: ['V', 'H', 'K', 'Sze', 'Cs', 'P', 'Szo'],
            monthNames: ['Január', 'Február', 'Március', 'Április', 'Május', 'Június', 'Július', 'Augusztus', 'Szeptember', 'Október', 'November', 'December'],
            firstDay: 1 // Понедельник как первый день недели
        },
        opens: 'center',
        startDate: dateRange ? dateRange.split('+-+')[0] : moment().format('YYYY-MM-DD'),
        endDate: dateRange ? dateRange.split('+-+')[1] : moment().format('YYYY-MM-DD')
    }, function (start, end) {
        let startDate = start.format('YYYY-MM-DD');
        let endDate = end.format('YYYY-MM-DD');
        let url = `${window.location.origin}${window.location.pathname}?date_range=${startDate}+-+${endDate}`;
        
        // Переход по новому URL
        window.location.href = url;
    });

    // Обработчик события "Apply"
    $('#date_range').on('apply.daterangepicker', function (ev, picker) {
        // Получаем выбранные даты
        var startDate = picker.startDate.format('YYYY-MM-DD');
        var endDate = picker.endDate.format('YYYY-MM-DD');
        
        // Строим ссылку с датами
        var url = '/admin/visit/custom?date_range=' + startDate + ' +-+ ' + endDate;

        // Перенаправляем пользователя на эту ссылку
        window.location.href = url;
    });

    // Устанавливаем значение в input (если параметр есть в URL)
    if (dateRange) {
        $('#date_range').val(dateRange);
    }
});


</script>
@endsection
