@extends('dashboard.master')
@section('title', $post->title)
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
                            <h4 class="box-title">{{$post->title}}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('dashboard.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div>
                                    <img src="{{asset($post->image)}}" width="200">
                                </div>

                                <div class="form-group mt-5">
                                    <label>Başlıq <span class="required">*</span></label>
                                    <input type="text" value="{{$post->title}}" required class="form-control" name="title" />
                                </div>

                                <div class="form-group">
                                    <label>Alt Başlıq</label>
                                    <input type="text" value="{{$post->subtitle}}" class="form-control" name="subtitle" />
                                </div>

                                <div class="form-group">
                                    <label>URL qısaltması</label>
                                    <input type="text" value="{{$post->slug}}" class="form-control" name="slug" />
                                </div>

                                <div class="form-group">
                                    <label>Kontent <span class="required">*</span></label>
                                    <textarea required class="form-control" name="content" cols="30" rows="5">{{$post->body}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Şəkil (600x400)</label>
                                    <input type="file" class="form-control" name="image" />
                                </div>

                                <div class="form-group">
                                    <label class="d-block">Aktiv</label>
                                    <label class="switch-label">
                                        <input class="status" name="is_published" type="checkbox" {{ $post->is_published ? "checked" : "" }}>
                                        <span class="switch"></span>
                                    </label>
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


@endsection

@section('load')

    @include('dashboard.inc.scripts.swal')
    @include('dashboard.inc.scripts.ck')

@endsection
