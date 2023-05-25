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
                            <h4 class="box-title">Slayder</h4>
                        </div>
                        <div class="card-body">

                            <table id="bootstrap-data-table" class="table">
                                <thead>
                                <tr>
                                    <th>Şəkil</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>
                                            <img width="300" src="{{ asset($slider->image) }}">
                                        </td>
                                        <td>
                                            <a class="table-btn btn-s" href="{{ route('dashboard.sliders.edit', $slider->id) }}">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <form action="{{ route('dashboard.sliders.destroy', $slider->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="slider" value="{{ $slider->id }}">
                                                <button class="table-btn btn-p" type="submit">
                                                    <i class="ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <div class="add-new mt-3">
                                <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#largeModal">
                                    <i class="ti-plus mr-2"></i> Yeni slayder əlavə et
                                </button>
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

    <!-- .modal -->

    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form class="modal-content" action="{{ route('dashboard.sliders.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Yeni slayder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($languages as $l)
                        <div class="form-group">
                            <label>Izah ({{ $l->slug }})</label>
                            <input type="text" class="form-control" name="{{ 'alt_' . $l->slug }}" />
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label>Şəkil (1x1)<span class="required">*</span></label>
                        <input type="file" required class="form-control" name="image" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Təsdiqlə</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.modal -->
@endsection

@section('load')
    @include('dashboard.inc.scripts.init')
    @include('dashboard.inc.scripts.swal')
    @include('dashboard.inc.scripts.confirm')

@endsection
