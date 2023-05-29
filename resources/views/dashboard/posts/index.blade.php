@extends('dashboard.master')
@section('title', 'Bloq')
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
                            <h4 class="box-title">Bloq</h4>
                        </div>
                        <div class="card-body">

                            <table id="bootstrap-data-table" class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Başlıq</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($posts as $p)
                                    <tr>
                                        <td>
                                            <img width="150" src="{{asset($p->image)}}" alt="">
                                        </td>
                                        <td>{{$p->title}}</td>
                                        <td>
                                            <a class="table-btn btn-s" href="{{route('dashboard.posts.edit', $p->id)}}">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <form action="{{ route('dashboard.posts.destroy', $p->id) }}" method="POST">
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
                                    <i class="ti-plus mr-2"></i> Yeni post
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
            <form class="modal-content" action="{{route('dashboard.posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Yeni post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Başlıq <span class="required">*</span></label>
                        <input type="text" required class="form-control" name="title" />
                    </div>

                    <div class="form-group">
                        <label>Alt Başlıq </label>
                        <input type="text" class="form-control" name="subtitle" />
                    </div>

                    <div class="form-group">
                        <label>URL qısaltması <span class="required">*</span></label>
                        <input type="text" required class="form-control" name="slug" />
                    </div>

                    <div class="form-group">
                        <label>Kontent <span class="required">*</span></label>
                        <textarea required class="form-control" name="content" cols="30" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Şəkil (600x400)<span class="required">*</span></label>
                        <input type="file" required class="form-control" name="image" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Təsdiqlə</button>
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
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
