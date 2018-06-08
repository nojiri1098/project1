@extends('layouts.app')

@section('title')
    Dashboard
@stop

@section('content')

    <section class="content-header">
        <h1>
            Dashboard
            <small>Current data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Current data</a></li>
            <li class="active">Dashboard</li>
        </ol>

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
            <tr>
                <th>Co2濃度</th>
                <td>{{ $env->co2 }}</td>
            </tr>
            <tr>
                <th>天気</th>
                <td>{{ $weather }}</td>
            </tr>
            <tr>
                <th>降水確率</th>
                <td>{{ $env->rain }}</td>
            </tr>
            @foreach($soils as $key => $soil)
                <tr>
                    <th>土壌湿度_ {{ $key+1 }}</th>
                    <td>{{ $soil->water }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </section>
@stop