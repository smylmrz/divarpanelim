@extends('dashboard.master')
@section('title', $translation->key)

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
                            <h4 class="box-title">{{ $translation->key }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashboard.translations.update', $translation->id) }}" method="post">
                                @method('PUT')

                                @csrf

                                <div class="form-group">
                                    <label>Açar söz <span class="required">*</span></label>
                                    <input type="text" readonly class="form-control" value="{{ $translation->key }}" />
                                </div>

                                <div class="row">
                                    @foreach($languages as $language)
                                        <div class="col-md-4 form-group">
                                            <label>Tərcümə ({{ $language->slug }}) <span class="required">*</span></label>
                                            <input type="text" required class="form-control" value="{{$translation->text[$language->slug]}}" name="{{ 'text_' . $language->slug }}" />
                                        </div>
                                    @endforeach
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
