@extends('layouts.app')

@section('title')
    AdminLTE 2 | Analytics
@stop

@section('content')

    <section class="content-header">
        <h1>
            Analytics
            <small>Data analytics</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Analytics</a></li>
            <li class="active">Analytics</li>
        </ol>

        <a href={{ route('store') }}>store</a>

    </section>

@stop