@extends('dashboard.master')
@section('title', $category->name)
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
                            <h4 class="box-title">{{$category->name}}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashboard.categories.update', $category->id)}}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    @if ($category->image)
                                        <div class="mb-3">
                                            <img src="{{ asset($category->image) }}" width="200">
                                        </div>
                                    @endif
                                    <label for="">Şəkil (1x1)</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                @foreach($languages as $l)
                                <div class="form-group">
                                    <label>Ad ({{ $l->slug }})<span class="required">*</span></label>
                                    <input
                                        name="{{ 'name_' . $l->slug }}"
                                        type="text"
                                        required
                                        class="form-control"
                                        value="{{ $category->getTranslation('name', $l->slug) }}"
                                    />
                                </div>
                                @endforeach

                                @foreach($languages as $l)
                                <div class="form-group">
                                    <label>İcmal ({{ $l->slug }})<span class="required">*</span></label>
                                    <textarea
                                        class="form-control"
                                        name="{{ 'content_' . $l->slug }}">{{ $category->getTranslation('description', $l->slug) }}</textarea>
                                </div>
                                @endforeach

                                <div class="form-group">
                                    <label>URL qısaltması <span class="required">*</span></label>
                                    <input type="text" required class="form-control" value="{{ $category->slug }}" name="slug" />
                                </div>

                                <div class="form-group">
                                    <label>Üst kateqoriya <span class="required">*</span></label>
                                    <select name="parent_id" class="form-control">
                                        <option value=""></option>
                                        @if ($category->parent_id)
                                            @foreach ($categories as $cat)
                                                <option {{( $category->parent->id == $cat->id) ? "selected" : ""}} value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        @else
                                            @foreach ($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

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

    @include('dashboard.inc.scripts.swal')
    @include('dashboard.inc.scripts.ck')

@endsection
