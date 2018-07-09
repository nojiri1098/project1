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
                                    <a href="#" class="btn btn-sm btn-tool">
                                        <i class="fa fa-download"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-tool">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center border-bottom mb-2">
                                    <p class="text-success text-xl">
                                        <i class="ion ion-ios-refresh-empty"></i>
                                    </p>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold"><i class="ion ion-android-arrow-up text-success"></i> 12%</span>
                                        <span class="text-muted">CONVERSION RATE</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <p class="text-warning text-xl">
                                        <i class="ion ion-ios-cart-outline"></i>
                                    </p>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold"><i class="ion ion-android-arrow-up text-warning"></i> 0.8%</span>
                                        <span class="text-muted">SALES RATE</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="d-flex justify-content-between align-items-center mb-0">
                                    <p class="text-danger text-xl">
                                        <i class="ion ion-ios-people-outline"></i>
                                    </p>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold"><i class="ion ion-android-arrow-down text-danger"></i> 1%</span>
                                        <span class="text-muted">REGISTRATION RATE</span>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-0">
                                  <table>
                                    <tbody>
                                      <tr>
                                          <td><a class="form-control"  style="text-align: center" href="{{ url('index/weather') }}">天気を更新する</a></td>
                                      </tr>
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
