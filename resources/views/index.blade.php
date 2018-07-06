@extends('layouts.app')

@section('content')

    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include('elements.header')

        @include('elements.sidebar')

        <div class="content-wrapper">

            @include('elements.contentHeader')

            @include('elements.mainContent')

        </div>

        @include('elements.footer')

        @include('elements.controlSidebar')

        @include('elements.sidebarBackground')

    </div>

    @include('elements.js')

    </body>
@stop