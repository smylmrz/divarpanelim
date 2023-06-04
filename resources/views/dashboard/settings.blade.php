@extends('dashboard.master')
@section('title', 'Parametrlər')

@section('content')
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <h4>Parametrlər</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('dashboard.settings.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @foreach($languages as $l)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Başlıq ({{ $l->slug }})<span class="required">*</span></label>
                                        <input
                                            type="text"
                                            required
                                            class="form-control"
                                            value="{{ $settings->getTranslation('title', $l->slug) }}"
                                            name="{{ 'title_' . $l->slug }}"
                                        >
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            @foreach($languages as $l)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sloqan ({{ $l->slug }})</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            value="{{ $settings->getTranslation('tagline', $l->slug) }}"
                                            name="{{ 'tagline_' . $l->slug }}"
                                        >
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            @foreach($languages as $l)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Qısa məzmun ({{ $l->slug }})</label>
                                        <textarea
                                            cols="30"
                                            rows="4"
                                            class="form-control"
                                            name="{{ 'description_' . $l->slug }}"
                                        >{{ $settings->getTranslation('description', $l->slug) }}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            @foreach($languages as $l)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Adres ({{ $l->slug }})<span class="required">*</span></label>
                                        <input
                                            type="text"
                                            required
                                            class="form-control"
                                            value="{{ $settings->getTranslation('address', $l->slug) }}"
                                            name="{{ 'address_' . $l->slug }}"
                                        >
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label>Adres linki<span class="required">*</span></label>
                            <input
                                type="text"
                                required
                                class="form-control"
                                value="{{ $settings->address_url }}"
                                name="address_url"
                            >
                        </div>

                        <div class="row">
                            @foreach($languages as $l)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Footer ({{ $l->slug }})<span class="required">*</span></label>
                                        <input
                                            type="text"
                                            required
                                            class="form-control"
                                            value="{{ $settings->getTranslation('copyright', $l->slug) }}"
                                            name="{{ 'copyright_' . $l->slug }}"
                                        >
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Loqo (6x1)</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        name="logo"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Footer Loqo (6x1)</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        name="footer_logo"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Telefon<span class="required">*</span></label>
                            <input
                                type="text"
                                required
                                class="form-control"
                                value="{{ $settings->phone }}"
                                name="phone"
                            >
                        </div>

                        <div class="form-group">
                            <label>Açar sözlər</label>
                            <textarea
                                cols="30"
                                rows="4"
                                class="form-control"
                                name="keywords"
                            >{{ $settings->keywords }}</textarea>
                        </div>

                        <button class="btn btn-primary">
                            Təsdiqlə
                        </button>
                    </form>
                </div>
            </div>

        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
@endsection

@section('load')
    @include('dashboard.inc.scripts.swal')
    @include('dashboard.inc.scripts.ck')

@endsection
