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
                                    <form id="submit_form" action="{{ url('data') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="input-group input-group-sm" style="width: 250px;">
                                            <select name="date" class="form-control" id="submit_select">
                                                <option>日付を選択してください</option>
                                                <option value="0">全件表示</option>
                                                @foreach($dates as $date)
                                                    <option value="{{ $date }}">{{ $date }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-right">
                                    <thead>
                                    <tr>
                                        <th>取得時間</th>
                                        <th>温度</th>
                                        <th>湿度</th>
                                        <th>土壌湿度1</th>
                                        <th>土壌湿度2</th>
                                        <th>土壌湿度3</th>
                                        <th>土壌湿度4</th>
                                    </tr>
                                    </thead>

                                    @foreach($envs as $key => $env)
                                        <tr>
                                            <td>{{ $env->created_at->addHour(9)->format('Y/m/d H:m') }}</td>
                                            <td>{{ $env->temperature }}</td>
                                            <td>{{ $env->humidity }}</td>
                                            @foreach($env->soils()->get() as $soil)
                                                <td>{!! $soil->soil_level !!}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        {{ $envs->links() }}
                    </div>
                </div><!-- /.row -->
            </div>
        </section>
    </div>

@stop

@section('js')
    <script>
        $(function(){
            $("#submit_select").change(function(){
                $("#submit_form").submit();
            });
        });
    </script>
@stop