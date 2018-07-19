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
                    <div class="col-md-8 mx-auto">
                            <div class="card">
                                <div class="card-header no-border">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">{{ $pulse->planter->name }}</h3>
                                    </div>
                                </div>
                                <div class="card-body" style="font-style:italic">
                                    <form action="{{ url('pulse') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span class="text-bold text-lg">現在の周期 : {{ $pulse->time }} {{ $pulse->unit }}</span>
                                            </p>
                                            <p class="ml-auto d-flex text-right">
                                                <input name="planter_id" type="hidden" value="1">
                                                <input name="time" type="number" value="{{ $pulse->time }}" min="0" step="1" style="width:70px">
                                                <select name="unit">
                                                    <option {{ $pulse->unit == 'ms' ? 'selected':'' }} value="ms">ms</option>
                                                    <option {{ $pulse->unit == 'μs' ? 'selected':'' }} value="μs">μs</option>
                                                </select>
                                            </p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span class="text-bold text-lg">現在のデューティ比 : {{ $pulse->duty }}</span>
                                            </p>
                                            <p class="ml-auto d-flex text-right" style="height :30px">
                                                <input name="duty" type="number" value="{{ $pulse->duty }}" min="0" step="0.01" style="width:70px">
                                                <input class="btn btn-primary btn-sm" type="submit" value="送信">
                                            </p>
                                        </div>
                                        <div class="d-flex float-right">
                                            <p>
                                                <input class="btn btn-primary btn-sm" type="submit" value="停止">
                                                <input class="btn btn-primary btn-sm" type="submit" value="点灯">
                                            </p>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body" style="font-style:italic">
                                    <div class="position-relative mb-2">
                                        <div class="d-flex justify-content-between align-items-center border-bottom mb-1">
                                            <p class="text-success text-xl">
                                                <span class="text-bold text-lg">直流</span>
                                            </p>
                                            <p class="text-xl text-success">
                                                <span class="text-bold text-lg">消費電力:{{ $pulse->direct_power }}W</span>
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="text-xl">
                                                <span class="text-bold text-lg">現在</span>
                                            </p>
                                            <p class="text-xl">
                                                <span class="text-bold text-lg">消費電力 :{{ $pulse->pulse_power }}W</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

@stop

@section('js')
    <script src="{{ asset('dist/js/pages/pulse.js') }}"></script>
@stop
