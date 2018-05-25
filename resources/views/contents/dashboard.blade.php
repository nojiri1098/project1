@extends('layouts.app')

@section('title')
    Dashboard
@stop

@section('content')

    <!-- Content Header -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <!-- /.row -->

    <!-- Content -->
    <section class="content">
        <!-- Environment -->
        <div class="row">
            <!-- Themperature -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $env->temperature }}<sup style="font-size: 20px">℃</sup></h3>

                        <p>Themperature</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-thermometer"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- Humidity -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $env->humidity }}<sup style="font-size: 20px">？</sup></h3>

                        <p>Humidity</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tint"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- Co2 Concentration -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $env->co2 }}<sup style="font-size: 20px">？</sup></h3>

                        <p>Co2 Concentration</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- Weather and Rainy Percentage -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $weather }}</h3>

                        <p>Rainy Per : {{ $env->rain }}%</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                        {{--アイコンも天気によって変えたい--}}
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.row -->

@stop