@extends('dashboard.master')
@section('title', 'İstifadəçilər')
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
                            <h4 class="box-title">İstifadəçilər</h4>
                        </div>
                        <div class="card-body">

                            <table id="bootstrap-data-table" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>İstifadəçi</th>
                                    <th>Əlaqə nömrəsi</th>
                                    <th>Email</th>
                                    <th>Təsdiqlənib</th>
                                    <th>Ətraflı</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->is_verified ? 'Hə' : 'Yox'}}</td>
                                        <td>
                                            <a class="flat-color" href="{{ route('dashboard.users.show', $user->id) }}">
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
