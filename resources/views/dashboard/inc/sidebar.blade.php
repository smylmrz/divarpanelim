<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                {{-- Socials --}}
                <li>
                    <a href="{{ route('dashboard.settings.index') }}">
                        <i class="menu-icon ti-settings"></i>
                        Parametrlər
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.index') }}">
                        <i class="menu-icon ti-bar-chart-alt"></i>
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="/"
                    >
                        <i class="menu-icon ti-arrow-circle-right"></i>
                        Sayta keç
                    </a>
                </li>


                <li class="menu-item-has-children dropdown">
                    <a
                        href="#"
                        class="dropdown-toggle"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i class="menu-icon ti-layers-alt"></i>
                        Slayderlər
                    </a
                    >
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="ti-menu"></i>
                            <a href="{{ route('dashboard.slider-details.show') }}">
                                Kontent
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.sliders.index') }}">
                                Slayderlər
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Categories --}}
                <li class="menu-item-has-children dropdown">
                    <a
                        href="#"
                        class="dropdown-toggle"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i class="menu-icon ti-menu"></i>
                        Kateqoriyalar
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <a href="{{ route('dashboard.categories.index') }}">
                                Bütün kateqoriyalar
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Seçilmişlər
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Languages --}}
                <li>
                    <a href="{{ route('dashboard.languages.index') }}">
                        <i class="menu-icon ti-world"></i>
                        Dil
                    </a>
                </li>

                {{-- Socials --}}
                <li>
                    <a href="{{ route('dashboard.socials.index') }}">
                        <i class="menu-icon ti-instagram"></i>
                        Sosial
                    </a>
                </li>

                {{-- Products --}}
                <li class="menu-item-has-children dropdown">
                    <a
                        href="#"
                        class="dropdown-toggle"
                        data-toggle="dropdown"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i class="menu-icon ti-package"></i>
                        Məhsullar
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <a href="{{ route('dashboard.products.index') }}">
                               İdarə et
                            </a>
                        </li>
                        <li>
                            <i class="ti-plus"></i>
                            <a href="{{ route('dashboard.products.index') }}">
                                Əlavə et
                            </a>
                        </li>
                        <li>
                            <i class="menu-icon ti-view-list"></i>
                            <a href="">
                                Atributlar
                            </a>
                        </li>
                        <li>
                            <i class="ti-bolt"></i>
                            <a href="">
                                Seçilmişlər
                            </a>
                        </li>
                        <li>
                            <i class="ti-search"></i>
                            <a href="">
                                Axtarış terminləri
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('dashboard.posts.index') }}">
                        <i class="menu-icon ti-marker"></i>
                        Bloq
                    </a>
                </li>

                {{-- Popup --}}
{{--                <li>--}}
{{--                    <a href="">--}}
{{--                        <i class="menu-icon ti-announcement"></i>--}}
{{--                        Popup--}}
{{--                    </a>--}}
{{--                </li>--}}

                {{-- Orders --}}
                <li>
                    <a href="{{ route('dashboard.orders.index') }}">
                        <i class="menu-icon ti-basketball"></i>
                        Sifarişlər
                    </a>
                </li>

                {{-- Email list --}}
                <li>
                    <a href="">
                        <i class="menu-icon ti-email"></i>
                        Abunələr
                    </a>
                </li>

                {{-- Translations --}}
                <li>
                    <a href="">
                        <i class="menu-icon fas fa-language"></i>
                        Tərcümələr
                    </a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
