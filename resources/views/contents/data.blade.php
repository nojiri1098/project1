@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data List</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Temperature</th>
                                        <th>Humidity</th>
                                        <th>Co2</th>
                                        <th>Weather</th>
                                        <th>Precipitation</th>
                                        <th>Water 1</th>
                                        <th>Water 2</th>
                                        <th>Water 3</th>
                                        <th>Water 4</th>
                                    </tr>
                                    </thead>

                                    @foreach($envs as $key => $env)
                                        <tr>
                                            <td>{{ $env->created_at->format('Y/m/d H:m') }}</td>
                                            <td>{{ $env->temperature }}</td>
                                            <td>{{ $env->humidity }}</td>
                                            <td>{{ $env->co2 }}</td>
                                            <td>{{ $env->weather }}</td>
                                            <td>{{ $env->precipitation }}</td>
                                            @foreach($env->soils()->get() as $soil)
                                                <td>{{ $soil->water }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div><!-- /.row -->
            </div>
        </section>
    </div>

@stop