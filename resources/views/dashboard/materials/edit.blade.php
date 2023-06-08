@extends('dashboard.master')
@section('title', $material->name)

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
                            <h4 class="box-title">{{$material->name }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashboard.materials.update', $material->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    @foreach($languages as $l)
                                        <div class="col-md-4 form-group">
                                            <label>Ad ({{ $l->slug }}) <span class="required">*</span></label>
                                            <input type="text"
                                                   required
                                                   class="form-control"
                                                   value="{{ $material->getTranslation('name', $l->slug) }}"
                                                   name="{{ 'name_' . $l->slug }}" />
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label>Slug <span class="required">*</span></label>
                                    <input type="text" required class="form-control" value="{{ $material->slug }}" name="slug" />
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
