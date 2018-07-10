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
                                    <h3 class="card-title">Temperature</h3>
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
                                    <h3 class="card-title">Humidity</h3>
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
                                <h3 class="card-title">weather</h3>
                                <div class="card-tools">
                                    <a class="form-control"  style="text-align: center" href="{{ url('index/weather') }}">天気を更新する</a>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(!empty($weather))
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="callout callout-danger">
                                            <h6>取得時刻</h6>
                                                <p>{{ $weather->created_at->addHour(9)->format('Y/m/d H:m') }}</p>
                                        </div>
                                        <div class="callout callout-info">
                                            <h6>天気</h6>
                                                <p>{{ $weather->weather }}</p>
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
                                        <div class="callout callout-primary">
                                            <h6>風速</h6>
                                                <p>{{ $weather->windSpeed }}m/s</p>
                                        </div>
                                        <div class="callout callout-gray">
                                            <h6>降水確率</h6>
                                                <p>{{ $weather->precipitation }}%</p>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <p>
                                    天気を取得できませんでした.
                                </p>
                                @endif
                                <div class="d-flex justify-content-between align-items-center mb-0">
                                  <table>
                                    <tbody>

                                      @if(!empty($weather))
                                      <tr>
                                          <td>天気：{{ $weather->weather }}</td>
                                      </tr>
                                      <tr>
                                          <td>降水確率：{{ $weather->precipitation }}</td>
                                      </tr>
                                      <tr>
                                          <td>気温：{{ $weather->temperature }}</td>
                                      </tr>
                                      <tr>
                                          <td>湿度：{{ $weather->humidity }}</td>
                                      </tr>
                                      <tr>
                                          <td>風速：{{ $weather->windSpeed }}</td>
                                      </tr>
                                      <tr>
                                          <td>取得時間：{{ $weather->created_at->addHour(9)->format('Y/m/d H:m') }}</td>
                                      </tr>
                                      @else
                                      <tr>
                                          <td>天気を取得できませんでした．</td>
                                      </tr>
                                      @endif
                                      </tbody>
                                  </table>
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
@stop
