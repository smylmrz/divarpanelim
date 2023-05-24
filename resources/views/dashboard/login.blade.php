<!DOCTYPE html>
<html class="no-js" lang="">
@include('dashboard.inc.head')
<body class="items-center">
<div class="login-content">
    <h3 class="login-logo">
{{--            <img class="align-content" src="{{asset('dist/images/site/logo.png')}}" alt="" />--}}
        Divarpanelim
    </h3>
    <div class="login-form">
        @if (count($errors))
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form class="{{ route('dashboard.login.attempt') }}" method="post">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" required class="form-control" name="email" />
            </div>
            <div class="form-group">
                <label>Şifrə</label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    required
                />
            </div>
            <button class="btn btn-danger btn-flat m-b-30 m-t-30">
                Daxil ol
            </button>
        </form>
    </div>
</div>

@include('dashboard.inc.scripts')
</body>
</html>
