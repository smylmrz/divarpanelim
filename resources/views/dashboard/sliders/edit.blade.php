@extends('dashboard.master')
@section('title', 'Slayder')
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
                            <h4 class="box-title">{{$slider->alt}}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('dashboard.sliders.update', $slider->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div>
                                    <img src="{{ asset($slider->image) }}" width="400">
                                </div>

                                <div class="form-group">
                                    <label>Şəkil (1x1)</label>
                                    <input type="file" class="form-control" name="image" />
                                </div>

                                @foreach($languages as $l)
                                <div class="form-group mt-5">
                                    <label>İzah ({{ $l->slug }})<span class="required">*</span></label>
                                    <input type="text"
                                           value="{{ $slider->getTranslation('alt', $l->slug) }}"
                                           class="form-control"
                                           name="{{ 'alt_' . $l->slug }}"
                                    />
                                </div>
                                @endforeach

                                <button class="btn btn-primary mt-3">
                                    Yenilə
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
    @include('dashboard.inc.scripts.swal')
@endsection
