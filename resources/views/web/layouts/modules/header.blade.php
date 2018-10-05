<div class="fixed-top">
    <div class="header-top-navigation header-top-navigation-scroll">
        <nav class="navbar navbar-expand-md navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" id="td-top-mobile-toggle" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: #fff;"></span>
            </button>
            <a class="navbar-brand d-flex align-items-center" href="{{ route('web.home') }}">
                <img src="{{ asset('web/images/logos/logo_blue.png') }}" width="100px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" id="td-header-search-button-mob" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: #fff; background-image: none;">
                    <svg viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false" style="height: 24px; width: 24px; display: block; fill: rgb(118, 118, 118);"><path d="m10.4 18.2c-4.2-.6-7.2-4.5-6.6-8.8.6-4.2 4.5-7.2 8.8-6.6 4.2.6 7.2 4.5 6.6 8.8-.6 4.2-4.6 7.2-8.8 6.6m12.6 3.8-5-5c1.4-1.4 2.3-3.1 2.6-5.2.7-5.1-2.8-9.7-7.8-10.5-5-.7-9.7 2.8-10.5 7.9-.7 5.1 2.8 9.7 7.8 10.5 2.5.4 4.9-.3 6.7-1.7v.1l5 5c .3.3.8.3 1.1 0s .4-.8.1-1.1" fill-rule="evenodd"></path></svg>
                </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item become-merchant">
                        <a class="nav-link nav-link-scroll" href="{{ route('web.home.get-becomeMerchant') }}">Trở thành đối tác</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-scroll" href="{{ route('places.vietnam') }}">@lang('menu_vietnam')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-scroll" href="{{ route('places.resort') }}">@lang('menu_resort')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-scroll" href="{{ env('URL_BLOG') }}">@lang('travel_handbook')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-scroll" href="{{ route('web.cart.index') }}" style="position: relative;">
                            <i class="fas fa-shopping-cart"></i>
                            Giỏ hàng
                            <span id="data-Cart" class="badge badge-danger" style="position: absolute;top: 5px; left: 0px">
                                {{ count($dataCart) }}
                            </span>
                        </a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link nav-link-scroll" href="{{ route('login') }}">@lang('login')</a>
                        </li>
                    @else
                        <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown nav-item" style="display: flex;align-items: center">
                                    <img style="width: 25px;height: 25px; border-radius: 50%; margin-right: 3px;" src="{{ Auth::user()->getImage(true) }}" alt="Avatar" id="img-avatar">
                                    <a style="color: #fff; display: flex;align-items: center" href="#" class="dropdown-toggle nav-link nav-link-scroll" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('web.dashbroad') }}">@lang('dashbroad')</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">@lang('logout')</a>
                                        <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                        </ul>
                    @endguest
                    <li id="language-system" style="margin-right: 15px;">
                        @php
                            $langRepo = \App::make(\App\Repositories\Languages\LanguageRepository::class);
                            $languages = $langRepo->getAllLanguagesByActive();
                        @endphp
                        <div class="dropdown">
                            <a class="btn btn-outline-light btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @foreach(\Cache::get('languages') as $key => $language)
                                    @if($language->code == LaravelLocalization::getCurrentLocale())
                                        <img src="{{ $language->getFlag() }}" width="24">
                                    @endif
                                @endforeach
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach(\Cache::get('languages') as $key => $language)
                                    <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($language->code, null, [], true) }}">
                                        <img src="{{ $language->getFlag() }}" alt="{{ $language->display_name }}" width="24px">
                                        {{ $language->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
