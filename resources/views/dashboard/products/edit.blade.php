@extends('dashboard.master')
@section('title', $product->sku)
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
                            <h4 class="box-title">{{ $product->sku }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashboard.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    @if ($product->image)
                                        <div class="mb-3">
                                            <img src="{{ asset($product->image) }}" width="200">
                                        </div>
                                    @endif
                                </div>

                                <div class="row">
                                    @foreach($languages as $l)
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Ad ({{ $l->slug }})<span class="required">*</span></label>
                                                <input type="text" value="{{ $product->getTranslation('name', $l->slug) }}" required class="form-control" name="{{ 'name_' . $l->slug }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Slug<span class="required">*</span></label>
                                            <input type="text" value="{{ $product->slug }}" required class="form-control" name="slug">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Kod<span class="required">*</span></label>
                                            <input type="text" value="{{ $product->sku }}" required class="form-control" name="sku">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Qiymət<span class="required">*</span></label>
                                            <input type="number" value="{{ $product->price }}" required class="form-control" name="price">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Uzunluq (sm)<span class="required">*</span></label>
                                            <input type="number" value="{{ $product->length }}" required class="form-control" name="length">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Hündürlük (sm)<span class="required">*</span></label>
                                            <input type="number" value="{{ $product->height }}" required class="form-control" name="height">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">En (sm)<span class="required">*</span></label>
                                            <input type="number" value="{{ $product->width }}" required class="form-control" name="width">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    @foreach($languages as $l)
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Məlumat ({{ $l->slug }})</label>
                                                <textarea name="{{ 'description_' . $l->slug }}" class="form-control">{{ $product->getTranslation('description', $l->slug) }}</textarea>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Şəkil (1x1)</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Kateqoriya <span class="required">*</span></label>
                                            <select required name="category_id" class="form-control">
                                                <option selected></option>
                                                @foreach ($categories as $c)
                                                    <option @if($c->id === $product->category_id) selected @endif value="{{ $c->id }}">{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary">
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

@endsection
