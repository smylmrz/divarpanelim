@extends('dashboard.master')
@section('title', 'Kateqoriyalar')
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
                            <h4 class="box-title">Kateqoriyalar</h4>
                        </div>
                        <div class="card-body">

                            <table id="bootstrap-data-table" class="table">
                                <thead>
                                <tr>
                                    <th>Ad ({{app()->getLocale()}})</th>
                                    <th>Slug</th>
                                    <th>Üst kateqoriya</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $c)
                                    <tr>
                                        <td>{{$c->name}}</td>
                                        <td>{{$c->slug}}</td>
                                        <td>
                                            {{($c->parent) ? $c->parent->name : "-"}}
                                        </td>
                                        <td>
                                            <a class="table-btn btn-s" href="{{route('dashboard.categories.edit', $c->id)}}">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <form action="{{ route('dashboard.categories.destroy', $c->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="category" value="{{ $c->id }}">
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
                                    <i class="ti-plus mr-2"></i> Yeni kateqoriya əlavə et
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
            <form class="modal-content" action="{{route('dashboard.categories.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Yeni Kateqoriya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($languages as $lang)
                        <div class="form-group">
                            <label>Ad ({{ $lang->slug }})<span class="required">*</span></label>
                            <input type="text" required class="form-control" name="{{ 'name_' . $lang->slug }}" />
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label>URL qısaltması<span class="required">*</span></label>
                        <input type="text" required class="form-control" name="slug" />
                    </div>

                    <div class="form-group">
                        <label>Şəkil <span class="required">*</span></label>
                        <input type="file" class="form-control" name="image" />
                    </div>

                    @foreach($languages as $lang)
                    <div class="form-group">
                        <label>Icmal ({{ $lang->slug }})<span class="required">*</span></label>
                        <textarea class="form-control" name="{{ 'content_' . $lang->slug }}"></textarea>
                    </div>
                    @endforeach

                    <div class="form-group">
                        <label>Üst kateqoriya </label>
                        <select name="parent_id" class="form-control">
                            <option selected></option>
                            @foreach ($categories as $cat)
                                @if($cat->parent == null)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ləğv et</button>
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
    @include('dashboard.inc.scripts.ck')
    @include('dashboard.inc.scripts.confirm')

@endsection
