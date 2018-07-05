@extends('layouts.app')

@section('title')
    Dashboard
@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
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

                <a href={{ route('weather') }}>weather</a>
                <a href={{ route('store') }}>store</a>

                <table class="form-table">
                    <tbody>
                    <tr>
                        <th>温度</th>
                        <td>{{ $env->temperature }}</td>
                    </tr>
                    <tr>
                        <th>湿度</th>
                        <td>{{ $env->humidity }}</td>
                    </tr>
                    @foreach($soils as $key => $soil)
                        <tr>
                            <th>土壌湿度_ {{ $key+1 }}</th>
                            <td>{{ $soil->water }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    
@stop