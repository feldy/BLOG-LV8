<header class="c-layout-header c-layout-header-3 c-layout-header-default-mobile">
    <div class="c-navbar">
        <div class="container">
            <!-- BEGIN: BRAND -->
            <div class="c-navbar-wrapper clearfix">
                <div class="c-brand c-pull-left">
                    <a href="{{ route('admin.index') }}" class="c-logo">
                        <h1 style="color: #FFFFFF;" class="c-center c-font-uppercase c-font-bold">
                            <i class="icon-user-follow c-font-white"></i> Admin Panel Dosir Dispusip</h1>
                    </a>
                    <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                    </button>
                </div>
                <!-- END: BRAND -->
                <!-- BEGIN: QUICK SEARCH -->
                <form class="c-quick-search" action="#">
                    <input type="text" name="query" placeholder="Type to search..." value="" class="form-control" autocomplete="off">
                    <span class="c-theme-link">&times;</span>
                </form>
                <!-- END: QUICK SEARCH -->
                <!-- BEGIN: HOR NAV -->
                <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
                <!-- BEGIN: MEGA MENU -->
                <nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
                    <!-- BEGIN: MEGA MENU -->
                    <ul class="nav navbar-nav c-theme-nav">
                        <li class="c-menu-type-classic">
                            <a href="#" class="c-link dropdown-toggle">Menu Admin</a>
                            <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                                <li>
                                    <a href="{{ route('admin.index') }}">List Artikel</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.daftar') }}">Management User</a>
                                </li>
                            </ul>
                        </li>
                        <li class="c-menu-type-classic">
                             <a class="c-link dropdown-toggle"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    <!-- END MEGA MENU -->
                </nav>
                <!-- END: MEGA MENU -->
                <!-- END: LAYOUT/HEADERS/MEGA-MENU -->
                <!-- END: HOR NAV -->
            </div>
        </div>
    </div>
</header>