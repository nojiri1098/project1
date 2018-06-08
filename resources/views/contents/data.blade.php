@extends('layouts.app')

@section('title')
    AdminLTE 2 | Data
@stop

@section('content')

    <section class="content-header">
        <h1>
            Data
            <small>Detail data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Data</a></li>
            <li class="active">Data</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">

            <section class="col-lg-5 connectedSortable">
                <!-- Calendar -->
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>

                        <h3 class="box-title">Calendar</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bars"></i></button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="#">Add new event</a></li>
                                    <li><a href="#">Clear events</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">View calendar</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table</h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Temperature</th>
                                <th>Humidity</th>
                                <th>Co2</th>
                                <th>Weather</th>
                                <th>Rain Percentage</th>
                                <th>Water 1</th>
                                <th>Water 2</th>
                                <th>Water 3</th>
                                <th>Water 4</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($envs as $env)
                                <tr>
                                    <td>{{ $env->temperature }}</td>
                                    <td>{{ $env->humidity }}</td>
                                    <td>{{ $env->co2 }}</td>
                                    <td>{{ $env->weather }}</td>
                                    <td>{{ $env->rain }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop