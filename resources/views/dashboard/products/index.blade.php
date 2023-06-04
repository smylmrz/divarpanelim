@extends('dashboard.master')
@section('title', 'Məhsullar')
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
                            <h4 class="box-title">Məhsullar</h4>
                        </div>
                        <div class="card-body">

                            <table id="bootstrap-data-table" class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Ad</th>
                                    <th>Qiymət (AZN)</th>
                                    <th>Kod</th>
                                    <th>Kateqoriya</th>
                                    <th>Material</th>
                                    <th>Şəkillər</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $p)
                                    <tr>
                                        <td>
                                            <img loading="lazy" width="100" src="{{asset($p->image)}}">
                                        </td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->price}}</td>
                                        <td>{{$p->sku}}</td>
                                        <td>{{$p->category->name}}</td>
                                        <td>{{$p->material->name}}</td>
                                        <td>
                                            <a href="{{ route('dashboard.product-images.index', $p->id) }}">
                                                Keç
                                            </a>
                                        </td>
                                        <td>
                                            <a class="table-btn btn-s" href="{{route('dashboard.products.edit', $p->id)}}">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <form action="{{ route('dashboard.products.destroy', $p->id) }}" method="POST">
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
                                <a href="{{ route('dashboard.products.create') }}" class="btn btn-danger mb-1">
                                    <i class="ti-plus mr-2"></i> Yeni məhsul əlavə et
                                </a>
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

@endsection

@section('load')
    @include('dashboard.inc.scripts.init')
    @include('dashboard.inc.scripts.swal')

@endsection
