<div class="fixed-top">
    <div class="header-scroll">
        <div class="header-top-navigation">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand d-flex align-items-center" href="{{ env('APP_URL') }}">
                    <img id="logo_white" class="logo" src="{{ get_asset('web/images/logos/logo_blue.png') }}" alt="logo">
                    <img id="logo_blue" style="display: none" class="logo" src="{{ get_asset('web/images/logos/logo_blue.png') }}" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" id="td-header-search-button-mob" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="">
                    <ul class="navbar-nav">
                        <li id="language-system" style="margin-right: 15px;">
                            <div class="dropdown">
                                <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if (Session::get('locale', config('app.locale')) == 'vi')
                                        <img src="{{get_asset('web/images/languages/vi.png')}}">
                                        <span>Tiếng Việt</span>
                                    @endif
                                    @if (Session::get('locale', config('app.locale')) == 'en')
                                        <img src="{{get_asset('web/images/languages/en.png')}}">
                                        <span>English</span>
                                    @endif
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('web.change-language', 'vi') }}">
                                        <img src="{{get_asset('web/images/languages/vi.png')}}">
                                        Tiếng Việt
                                    </a>
                                    <a class="dropdown-item" href="{{ route('web.change-language', 'en') }}">
                                        <img src="{{get_asset('web/images/languages/en.png')}}">
                                        English
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">@lang('home_page')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://blog.triplan.asia">@lang('travel_handbook')</a>
                        </li>
{{--                         <li class="nav-item">
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
</div>
