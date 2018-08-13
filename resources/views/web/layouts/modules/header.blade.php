<div class="fixed-top">
    <div class="header-top-navigation">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand d-flex align-items-center" href="/"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" id="td-header-search-button-mob" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li id="language-system" style="margin-right: 15px;">
                        @php
                            $langRepo = \App::make(\App\Repositories\Languages\LanguageRepository::class);
                            $languages = $langRepo->getAllLanguagesByActive();
                        @endphp
                        <div class="dropdown">
                            <a class="btn btn-outline-light btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @foreach(\Cache::get('languages') as $key => $language)
                                    @if($language->code == config('app.locale'))
                                        <img src="{{ $language->getFlag() }}" width="24">
                                    @endif
                                @endforeach
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach(\Cache::get('languages') as $key => $language)
                                    <a class="dropdown-item" href="{{ route('web.change-language', $language->code) }}">
                                        <img src="{{ $language->getFlag() }}" alt="{{ $language->display_name }}" width="24px">
                                        {{ $language->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ env('URL_BLOG') }}">@lang('travel_handbook')</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i class="far fa-user"></i>
                        Đăng kí / Đăng nhập
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
