@extends('dashboard.master')
@section('title', 'Slayder kontenti')
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
                            <h4 class="box-title">Slayder kontenti</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('dashboard.slider-details.update')}}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    @foreach($languages as $l)
                                    <div class="col-md-4">
                                        <div class="form-group mt-5">
                                            <label>Başlıq ({{ $l->slug }})<span class="required">*</span></label>
                                            <input type="text"
                                                   value="{{ $details->getTranslation('title', $l->slug) }}"
                                                   class="form-control"
                                                   name="{{ 'title_' . $l->slug }}"
                                            />
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    @foreach($languages as $l)
                                        <div class="col-md-4">
                                            <div class="form-group mt-5">
                                                <label>Kontent ({{ $l->slug }})<span class="required">*</span></label>
                                                <textarea
                                                       class="form-control"
                                                       name="{{ 'content_' . $l->slug }}"
                                                >{{ $details->getTranslation('content', $l->slug) }}</textarea>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    @foreach($languages as $l)
                                        <div class="col-md-3">
                                            <div class="form-group mt-5">
                                                <label>Əsas button mətni ({{ $l->slug }})<span class="required">*</span></label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="{{ 'primary_action_text_' . $l->slug }}"
                                                    value="{{ $details->getTranslation('primary_action_text', $l->slug) }}"
                                                />
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-md-3">
                                        <div class="form-group mt-5">
                                            <label>Əsas button link<span class="required">*</span></label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="primary_action_url"
                                                value="{{ $details->primary_action_url }}"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    @foreach($languages as $l)
                                        <div class="col-md-3">
                                            <div class="form-group mt-5">
                                                <label>Digər button mətni ({{ $l->slug }})<span class="required">*</span></label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="{{ 'secondary_action_text_' . $l->slug }}"
                                                    value="{{ $details->getTranslation('secondary_action_text', $l->slug) }}"
                                                />
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-md-3">
                                        <div class="form-group mt-5">
                                            <label>Digər button link<span class="required">*</span></label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="secondary_action_url"
                                                value="{{ $details->secondary_action_url }}"
                                            />
                                        </div>
                                    </div>
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


@endsection

@section('load')
    @include('dashboard.inc.scripts.swal')
@endsection
