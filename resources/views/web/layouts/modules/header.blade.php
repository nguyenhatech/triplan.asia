<div class="fixed-top">
    <div class="header-top-navigation">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand d-flex align-items-center" href="{{ env('APP_URL') }}">
                <img id="logo_white" class="logo" src="{{ get_asset('web/images/logos/logo_white.png') }}" alt="logo">
                <img id="logo_blue" style="display: none" class="logo" src="{{ get_asset('web/images/logos/logo_blue.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" id="td-header-search-button-mob" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://blog.triplan.asia">Cẩm nang du lịch</a>
                    </li>
{{--                     <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i class="far fa-user"></i>
                        Đăng kí / Đăng nhập
                        </a>
                    </li> --}}
                </ul>
            </div>
        </nav>
    </div>
</div>
