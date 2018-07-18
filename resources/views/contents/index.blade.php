@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Top page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-2">
                        <form action="{{ url('index') }}" method="get">
                            <button class="form-control">更新する</button>
                        </form>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">


                        <div class="card">
                            <div class="card-header no-border">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">温度</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">現在の温度{{ $envs->first()->temperature }}℃</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                        <span class="text-success text-lg">{{ $envs->first()->created_at->addHour(9)->format('Y/m/d h:m') }}</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->

                                <input type="hidden" value="{{ count($temperatures) }}" id="temperature-count">
                                @foreach($temperatures as $key => $temperature)
                                    <input type="hidden" value="{{ $temperature }}" id="temperature-{{ $key }}">
                                @endforeach
                                <div class="position-relative mb-4">
                                    <canvas id="temperature-chart" height="200"></canvas>
                                </div>
                                <div class="d-flex flex-row justify-content-end">
                                    <span class="text-muted">Since 24h ago</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header no-border">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">湿度</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">現在の湿度{{ $envs->first()->humidity }}%</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                        <span class="text-success text-lg">{{ $envs->first()->created_at->addHour(9)->format('Y/m/d h:m') }}</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->

                                <input type="hidden" value="{{ count($humidities) }}" id="humidity-count">
                                @foreach($humidities as $key => $humidity)
                                    <input type="hidden" value="{{ $humidity }}" id="humidity-{{ $key }}">
                                @endforeach
                                <div class="position-relative mb-4">
                                    <canvas id="humidity-chart" height="200"></canvas>
                                </div>
                                <div class="d-flex flex-row justify-content-end">
                                    <span class="text-muted">Since 24h ago</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">土壌湿度</h3>
                                    <p>{{ $envs->first()->soils()->get()->first()->created_at->addHour(9)->format('Y/m/d H:m') }}</p>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>プランタ</th>
                                            <th>土壌湿度</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($envs->first()->soils()->get() as $soil)
                                            <tr>
                                                <td>{{ $soil->planter->name }}</td>
                                                <td>{!! $soil->soil_level !!}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header no-border">
                                <h3 class="card-title">天気</h3>
                                <div class="card-tools">
                                    <a class="form-control"  style="text-align: center" href="{{ url('index/weather') }}">天気を更新する</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="callout callout-danger">
                                            <h6>取得時刻</h6>
                                                <p>{{ $weather->created_at->addHour(9)->format('Y/m/d H:m') }}</p>
                                        </div>
                                        <div class="callout callout-info" style="text-align: center">
                                            <h6 style="text-align: left">天気</h6>
                                                <input type="hidden" value="{{ $weather->weather }}" id="weather">
                                                <canvas id="weather_icon" width="100" height="100"></canvas>
                                        </div>
                                        <div class="callout callout-warning">
                                            <h6>気温</h6>
                                                <p>{{ $weather->temperature }}℃</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="callout callout-success">
                                            <h6>湿度</h6>
                                                <p>{{ $weather->humidity }}%</p>
                                        </div>
                                        <div class="callout">
                                            <h6>風速</h6>
                                                <p>{{ $weather->wind_speed }}m/s</p>
                                        </div>
                                        <div class="callout callout-purple">
                                            <h6>降水確率</h6>
                                                <p>{{ $weather->precipitation }}%</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.d-flex -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop

@section('js')
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/index-chart.js') }}"></script>
    <script src="{{ asset('js/skycons.js') }}"></script>

    <script>
        var icon_name = $("#weather").val();

        if (icon_name == "clear-day") {
            var skycons = new Skycons({"color": "orange"});
            skycons.add("weather_icon", Skycons.CLEAR_DAY);
        } else if (icon_name == "clear-night") {
            var skycons = new Skycons({"color": "yellow"});
            skycons.add("weather_icon", Skycons.CLEAR_NIGHT);
        } else if (icon_name == "partly-cloudy-day") {
            var skycons = new Skycons({"color": "gray"});
            skycons.add("weather_icon", Skycons.PARTLY_CLOUDY_DAY);
        } else if (icon_name == "partly-cloudy-night") {
            var skycons = new Skycons({"color": "gray"});
            skycons.add("weather_icon", Skycons.PARTLY_CLOUDY_NIGHT);
        } else if (icon_name == "cloudy") {
            var skycons = new Skycons({"color": "gray"});
            skycons.add("weather_icon", Skycons.CLOUDY);
        } else if (icon_name == "rain") {
            var skycons = new Skycons({"color": "blue"});
            skycons.add("weather_icon", Skycons.RAIN);
        } else if (icon_name == "sleet") {
            var skycons = new Skycons({"color": "blue"});
            skycons.add("weather_icon", Skycons.SLEET);
        } else if (icon_name == "snow") {
            var skycons = new Skycons({"color": "blue"});
            skycons.add("weather_icon", Skycons.SNOW);
        } else if (icon_name == "wind") {
            var skycons = new Skycons({"color": "gray"});
            skycons.add("weather_icon", Skycons.WIND);
        } else if (icon_name == "fog") {
            var skycons = new Skycons({"color": "gray"});
            skycons.add("weather_icon", Skycons.FOG);
        }

        skycons.play();
    </script>
@stop
