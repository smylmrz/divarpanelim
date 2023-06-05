@extends('dashboard.master')
@section('title', '#'.$order->id)
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
                            <h4 class="box-title">{{ 'Sifariş #'.$order->id }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="list-unstyled">
                                        <li>{{ $order->name }}</li>
                                        <li>{{ $order->city . ', ' . $order->address }}</li>
                                        <li>{{ $order->phone }}</li>
                                    </ul>
                                </div>
                                <div class="col-12 mb-3">
                                    <hr>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-4">
                                            <a target="_blank" href="{{ route('products.show', [$product->category->slug, $product->slug]) }}">
                                                <img src="{{ asset($product->image) }}">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-2">
                                                <span>
                                                    <h4>{{ $product->name ?? $product->sku }}</h4>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @if($order->note)
                                        <div>Qeyd:</div>
                                        <p>{{ $order->note }}</p>
                                    @endif
                                </div>
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

    @include('dashboard.inc.scripts.swal')
    <script src="{{asset('static/dashboard/js/jquery.min.js')}}"></script>

@endsection
