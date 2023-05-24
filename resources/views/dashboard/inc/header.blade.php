<!-- Header-->
<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                Divarpanelim
            </a>
            <a class="navbar-brand hidden" href="{{ route('dashboard.index') }}">
                Divarpanelim
            </a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
            </div>

{{--            <div class="language-area user-area dropdown float-right">--}}
{{--                <a--}}
{{--                    href="{{ route('dashboard.settings') }}"--}}
{{--                >--}}
{{--                    <i class="menu-icon ti-settings"></i>--}}
{{--                </a>--}}
{{--            </div>--}}

            <div class="user-area dropdown float-right">
                <a
                    href="#"
                    class="dropdown-toggle active"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    <img
                        class="user-avatar rounded-circle"
                        src="{{ asset('admin/img/user.png') }}"
                        alt="User Avatar"
                    />
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="{{ route('dashboard.logout') }}">
                        <i class="ti-arrow-circle-left"></i>
                        Çıxış
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- /#header -->
