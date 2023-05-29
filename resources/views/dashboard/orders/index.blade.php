@extends('dashboard.master')
@section('title', 'Sifarişlər')
@section('links')
    <link rel="stylesheet" href="{{asset("admin/css/dataTables.bootstrap.min.css")}}">
@endsection
@section('content')
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!--  Traffic  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Sifarişlər</h4>
                        </div>
                        <div class="card-body">

                            <table id="bootstrap-data-table" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Müştəri</th>
                                    <th>Əlaqə nömrəsi</th>
                                    <th>Şəhər</th>
                                    <th>Ünvan</th>
                                    <th>Tarix</th>
                                    <th>Ətraflı</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $o)
                                    <tr>
                                        <td>{{$o->id}}</td>
                                        <td>{{$o->name}}</td>
                                        <td>{{$o->phone}}</td>
                                        <td>{{$o->city}}</td>
                                        <td>{{$o->address}}</td>
                                        <td>
                                            {{ date('d-m-Y', strtotime($o->created_at)) }}
                                        </td>
                                        <td>
                                            <a class="flat-color" href="{{ route('dashboard.orders.show', $o->id) }}">
                                                <i class="fas fa-angle-right"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!--  /Traffic -->

            <div class="clearfix"></div>

        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->


@endsection

@section('load')

    @include('dashboard.inc.scripts.init')
    @include('dashboard.inc.scripts.swal')

@endsection
