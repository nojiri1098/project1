@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>pulse</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">pulse</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header no-border">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">1:3</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">現在のtime</span>
                                    </p>
                                    <p class="ml-auto d-flex text-right">
                                        <form action="">
                                            <input type="number" value="0" step="1" id="value1"/>
                                              <select name="pull-down">
                                                  <option value="milliseconds" id="">ms</option>
                                                  <option value="microseconds" id="">μs</option>
                                              </select>
                                            <input type="submit" value="送信する">
                                        </form>
                                    </p>
                                </div>
                                <div class="position-relative mb-4">
                                    <canvas id="pulse1-chart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header no-border">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">1:1</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">現在のtime</span>
                                    </p>
                                    <p class="ml-auto d-flex text-right">
                                        <form action="">
                                            <input type="number" value="0" step="1" id="value2"/>
                                              <select name="pull-down">
                                                  <option value="milliseconds" id="">ms</option>
                                                  <option value="microseconds" id="">μs</option>
                                              </select>
                                            <input type="submit" value="送信する">
                                        </form>
                                    </p>
                                </div>
                                <div class="position-relative mb-4">
                                    <canvas id="humidity-chart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header no-border">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">3:1</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">現在のtime</span>
                                    </p>
                                    <p class="ml-auto d-flex text-right">
                                        <form action="">
                                            <input type="number" value="0" step="1" id="value2"/>
                                              <select name="pull-down">
                                                  <option value="milliseconds" id="">ms</option>
                                                  <option value="microseconds" id="">μs</option>
                                              </select>
                                            <input type="submit" value="送信する">
                                        </form>
                                    </p>
                                </div>
                                <div class="position-relative mb-4">
                                    <canvas id="pulse2-chart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
      <!-- /.row -->
            </div>
    <!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content-wrapper -->

@stop

@section('js')
  <script src="{{ asset('dist/js/pages/pulse.js') }}"></script>
@stop
