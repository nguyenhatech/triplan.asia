<div class="fixed-top">
    <div class="header-top-navigation">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('web.home') }}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" id="td-header-search-button-mob" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: #fff;"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('places.vietnam') }}">@lang('menu_vietnam')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('places.international') }}">@lang('menu_international')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ env('URL_BLOG') }}">@lang('travel_handbook')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('web.cart.index') }}" style="position: relative;">
                            <i class="fas fa-shopping-cart"></i>
                            Giỏ hàng
                            <span id="data-Cart" class="badge badge-danger" style="position: absolute;top: 5px; left: 0px">
                                {{ count($dataCart) }}
                            </span>
                        </a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">@lang('login')</a>
                        </li>
                    @else
                        <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown nav-item" style="display: flex;align-items: center">
                                    <img style="width: 25px;height: 25px; border-radius: 50%; margin-right: 3px;" src="{{ Auth::user()->getImage(true) }}" alt="Avatar" id="img-avatar">
                                    <a style="color: #fff; display: flex;align-items: center" href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">
                                            #
                                        </a>
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
