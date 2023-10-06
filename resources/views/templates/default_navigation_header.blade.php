<!-- BEGIN: HEADER 2 -->
<header class="c-layout-header c-layout-header-6">
    <div class="c-topbar">
        <div class="container">
            <nav class="c-top-menu">
                <ul class="c-links c-theme-ul">
                    <li>
                        <a href="#" class="c-font-uppercase c-font-bold c-font-dark">
                            SISTEM DOSIR ELEKTRONIK <br>
                            DINAS PERPUSTAKAAN DAN KEARSIPAN DKI JAKARTA
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="c-brand">
                <a href="{{ route('page.index') }}" class="c-logo">
                    {{ HTML::image('assets/base/img/layout/logos/logo-3.png', 'image', array('class' => 'c-desktop-logo')) }}
                    {{ HTML::image('assets/base/img/layout/logos/logo-1.png', 'image', array('class' => 'c-desktop-logo-inverse')) }}
                    {{ HTML::image('assets/base/img/layout/logos/logo-3.png', 'image', array('class' => 'c-mobile-logo')) }}
                </a>
                <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                    <span class="c-line"></span>
                    <span class="c-line"></span>
                    <span class="c-line"></span>
                </button>
                <button class="c-search-toggler" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="c-navbar">
        <div class="container">
            <!-- BEGIN: BRAND -->
            <div class="c-navbar-wrapper clearfix">
                <!-- END: BRAND -->
                <!-- BEGIN: QUICK SEARCH -->
                <form class="c-quick-search" action="{{ url('search') }}">
                    <input type="text" name="search" placeholder="Type to search..." value="{{ \Illuminate\Support\Facades\Request::get('search') }}" class="form-control" autocomplete="off">
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
                            <a href="{{ url('index') }}" class="c-link dropdown-toggle">Home</a>
                        </li>
                        <li class="c-menu-type-classic">
                            <a href="#" class="c-link dropdown-toggle">Profil</a>
                        </li>
                        <li class="c-search-toggler-wrapper">
                            <a href="#" class="c-btn-icon c-search-toggler"><i class="fa fa-search"></i></a>
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
<!-- END: HEADER 2 -->