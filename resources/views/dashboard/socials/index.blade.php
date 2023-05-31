@extends('dashboard.master')
@section('title', 'Sosial')
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
                            <h4 class="box-title">Sosial</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{route('dashboard.socials.update')}}" method="post">
                                @csrf
                                @foreach($socials as $social)
                                    <div class="form-group">
                                        <label>{{ $social->name }}</label>
                                        <input type="text" class="form-control" value="{{ $social->url }}" name="{{ $social->name }}" />
                                    </div>
                                @endforeach

                                <button class="btn btn-primary mt-3">
                                    Təsdiqlə
                                </button>
                            </form>
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
