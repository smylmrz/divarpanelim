@extends('dashboard.master')
@section('title', $l->name)

@section('links')
<link rel="stylesheet" href="{{ asset("admin/css/dataTables.bootstrap.min.css") }}">
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
                  <h4 class="box-title">{{$l->name }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.languages.update', $l->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{$l->id}}">
                        <div class="form-group">
                            <label>Ad <span class="required">*</span></label>
                            <input type="text" required class="form-control" value="{{$l->name}}" name="name" />
                        </div>
                        <div class="form-group">
                          <label>Slug <span class="required">*</span></label>
                          <input type="text"  {{ ($l->slug == config('app.locale')) ? "readonly" : "" }}  required class="form-control" value="{{$l->slug}}" name="slug" />
                      </div>

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

@include('dashboard.inc.scripts.swal')

@endsection
