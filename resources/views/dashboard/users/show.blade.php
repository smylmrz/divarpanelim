@extends('dashboard.master')
@section('title', $user->name)
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
                            <h4 class="box-title">{{ $user->name }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="list-unstyled">
                                        <li>{{ $user->name }}</li>
                                        <li>{{ $user->email }}</li>
                                        <li>{{ $user->phone }}</li>
                                    </ul>
                                </div>
                                @if(!$user->is_verified)
                                    <div class="col-12">
                                        <a href="{{ route('dashboard.users.verify', $user->id) }}" class="btn btn-danger">
                                            Hesabı aktivləşdir
                                        </a>
                                    </div>
                                @endif
                            </div>
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

    @include('dashboard.inc.scripts.swal')
    <script src="{{asset('static/dashboard/js/jquery.min.js')}}"></script>

@endsection
