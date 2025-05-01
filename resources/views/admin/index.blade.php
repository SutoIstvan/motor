@extends('adminlte::page')

@section('title', 'Vezérlőpult')

@section('content_header')
    <h1>Vezérlőpult</h1>
@stop

@section('content')
    {{-- <p>Welcome to this beautiful admin panel.</p> --}}
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $motors }}</h3>
                    <p>Motorok száma</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-motorcycle"></i>
                </div>
                <a href="/admin/motor" class="small-box-footer">Bővebben <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $buying }}</h3>
                    <p>Ajánlat kérések száma</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-cart-plus"></i>
                </div>
                <a href="/admin/buying" class="small-box-footer">Bővebben <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $users }}</h3>
                    <p>Felhasználók száma</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-user"></i>
                </div>
                <a href="/admin/user" class="small-box-footer">Bővebben <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-olive">
                <div class="inner">
                    <h3>{{ $euro->rate }}</h3>
                    <p>Euro árfolyam</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-euro-sign"></i>
                </div>
                <a href="/admin/exchangerate" class="small-box-footer">Bővebben <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


    </div>



    <h5 class="mb-2 grey mt-2" style="color: #7b7b7b;">Egyedi látogatottsági statisztika</h5>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-light"><i class="far fa-chart-bar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Évi statisztika</span>
                    <span class="info-box-number">
                        @foreach ($visityear as $item)
                            {{ $item['visit_count_total'] }}
                        @endforeach
                        <small>látogato</small>
                    </span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-light"><i class="far fa-chart-bar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Hónapi statisztika</span>
                    <span class="info-box-number">
                        @foreach ($visitmonth as $item)
                            {{ $item['visit_count_total'] }}
                        @endforeach
                        <small>látogato</small>
                    </span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-light"><i class="far fa-chart-bar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Héti statisztika</span>
                    <span class="info-box-number">
                        @foreach ($visitweek as $item)
                            {{ $item['visit_count_total'] }}
                        @endforeach
                        <small>látogato</small>
                    </span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-light"><i class="far fa-chart-bar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Napi statisztika</span>
                    <span class="info-box-number">
                        @foreach ($visitday as $item)
                            {{ $item['visit_count_total'] }}
                        @endforeach
                        <small>látogato</small>
                    </span>
                </div>

            </div>

        </div>

    </div>

    {{-- @dump($visitday) --}}

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

                                <a href="{{ route('motor.show', $motor) }}" target="_blank" class="nav-link" style="color: #585858;">
                                    <img src="{{ asset($motor->main_image) }}" height="40px" style="width: 60px; height:40px ;object-fit: cover; margin-right: 8px;">

                                    {{ $motor->name }} <span class="float-right badge bg-info mt-2">{{ $motor->visit_count_total }}</span>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>

            </div>
        </div>

        <div class="card-footer" style="background-color: #fff;">
            <a href="{{ route('admin.visit') }}" style="color: #767676;">Teljes lista megnyitása</a> 
        </div>
    </div>
    <br>


@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        // Функция для форматирования даты в формат 'DD MM'
        function formatDate(date) {
            let d = new Date(date);
            let day = '' + d.getDate();
            let month = '' + (d.getMonth() + 1);

            if (day.length < 2) day = '0' + day;
            if (month.length < 2) month = '0' + month;

            return [day, month].join(' ');
        }

        // Генерация массива дат
        const generateDates = (numDays) => {
            let dates = [];
            let today = new Date();

            for (let i = 0; i < numDays; i++) {
                let date = new Date();
                date.setDate(today.getDate() - i);
                dates.push(formatDate(date));
            }

            // Реверсируем порядок дат, чтобы самая старая дата была первой
            return dates.reverse();
        }

        // Создаем массив из 11 дат (сегодня и 10 предыдущих дней)
        const xValues = generateDates(11);


        const yValues = [1, 8, 8, 9, 9, 9, 10, 11, 12, 14, 0];

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
    </script>


@endsection
