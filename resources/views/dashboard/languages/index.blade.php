@extends('dashboard.master')
@section('title', 'Dil')
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
                  <h4 class="box-title">Dillər</h4>
                </div>
                <div class="card-body">

                    <table id="bootstrap-data-table" class="table">
                        <thead>
                            <tr>
                                <th>Dil</th>
                                <th>Slug</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($languages as $l)
                            <tr>
                                <td>{{$l->name}}</td>
                                <td>{{$l->slug}}</td>
                                <td>
                                    <a class="table-btn btn-s" href="{{ route('dashboard.languages.edit', $l->id) }}">
                                        <i class="ti-pencil"></i>
                                    </a>
                                    @if ($l->slug != config('app.locale'))
                                        <form action="{{ route('dashboard.languages.destroy', $l->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="language" value="{{ $l->id }}">
                                            <button class="table-btn btn-p" type="submit">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div class="add-new mt-3">
                        <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#largeModal">
                            <i class="ti-plus mr-2"></i>
                            Əlavə et
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
            <form class="modal-content" action="{{ route('dashboard.languages.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Yeni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Dil <span class="required">*</span></label>
                        <input type="text" required class="form-control" name="name" />
                    </div>
                    <div class="form-group">
                        <label>Slug <span class="required">*</span></label>
                        <input type="text" required class="form-control" name="slug" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Ləğv et
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Təsdiqlə
                    </button>
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
