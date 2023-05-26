@extends('dashboard.master')
@section('title', 'Şəkillər')
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
                            <h4 class="box-title">Şəkillər</h4>
                        </div>
                        <div class="card-body">

                            <table id="bootstrap-data-table" class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($product->images as $image)
                                    <tr>
                                        <td>
                                            <img loading="lazy" width="100" src="{{asset($image->image)}}">
                                        </td>
                                        <td>
                                            <form action="{{ route('dashboard.product-images.destroy', $image->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
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
                                    <i class="ti-plus mr-2"></i> Yeni şəkil əlavə et
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

    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form class="modal-content" action="{{route('dashboard.product-images.store', $product->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Yeni Şəkil(lər)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Şəkil(lər) <span class="required">*</span></label>
                        <input type="file" class="form-control" multiple name="images[]" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Təsdiqlə</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('load')
    @include('dashboard.inc.scripts.init')
    @include('dashboard.inc.scripts.swal')

@endsection
