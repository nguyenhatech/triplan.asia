<div class="header-top-navigation">
    <header class="drawer-navbar drawer-navbar--fixed" role="banner">
        <div class="drawer-container">
            <div class="drawer-navbar-header">
                <a class="drawer-brand" href="{{ env('APP_URL') }}">
                    <img class="logo" src="{{ get_asset('web/images/logos/logo-triplan.png') }}" alt="logo triplan" title="logo triplan">
                    Triplan
                </a>
                <button type="button" class="drawer-toggle drawer-hamburger">
                <span class="sr-only">toggle navigation</span>
                <span class="drawer-hamburger-icon"></span>
                </button>
            </div>
            <nav class="drawer-nav" role="navigation">
                <ul class="drawer-menu drawer-menu--right">
                    <li>
                        <a class="drawer-menu-item" href="#">Trang chủ</a>
                    </li>
                    <li>
                        <a class="drawer-menu-item" href="#">Giới thiệu</a>
                    </li>
                    <li>
                        <a class="drawer-menu-item" href="#">Tin tức</a>
                    </li>
                    <li>
                        <a class="drawer-menu-item" href="#">Bí kíp du lịch</a>
                    </li>
                    <li>
                        <a class="drawer-menu-item" href="#">Liên hệ</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</div>
