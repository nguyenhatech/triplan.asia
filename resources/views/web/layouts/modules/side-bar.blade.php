<div class="td-search-background" style="-webkit-overflow-scrolling: touch;height: 100vh;overflow-y: scroll;">
    <div class="td-search-close">
        <a href="#">
            <i class="fa fa-times" style="color: #fff; padding: 20px 30px 20px 20px;"></i>
        </a>
    </div>
    <div style="padding-left: 30px; padding-right: 30px; font-size: 22px; font-weight: bold">
        <div style="padding: 0px 30px 10px 20px;">
            <h5 class="text-center">Tìm kiếm</h5>
        </div>
        <div class="md_box-search">
            <mobile-search></mobile-search>
        </div>
    </div>
</div>
<div id="td-mobile-nav" style="-webkit-overflow-scrolling: touch;height: 100vh;overflow-y: scroll;">
    <div class="td-mobile-close">
        <a href="#">
            <i class="fa fa-times" style="color: #fff; padding: 20px 30px 20px 20px;"></i>
        </a>
    </div>
    <div style="padding-left: 50px; padding-right: 50px; font-size: 22px; font-weight: bold">
        <p class="d-flex justify-content-around">
            <a target="_blank" href="https://www.facebook.com/TriplanVN/" style="color: #fff; padding: 5px 20px 5px 20px;"><i class="fab fa-facebook-f"></i></a>
            <a target="_blank" href="https://twitter.com/TriplanVietnam" style="color: #fff; padding: 5px 20px 5px 20px;"><i class="fab fa-twitter"></i></a>
        </p>
        <p>
            <a href="{{ env('APP_URL') }}" style="color: #fff">Home</a>
        </p>
        <p>
            <a href="{{ route('places.vietnam') }}" style="color: #fff">@lang('menu_vietnam')</a>
        </p>
        <p>
            <a href="{{ route('places.resort') }}" style="color: #fff">@lang('menu_resort')</a>
        </p>
        @guest
            <p>
                <a href="{{ route('login') }}" style="color: #fff">@lang('login')</a>
            </p>
        @else
            <p>
                <span>{{ Auth::user()->name }}</span>
               <a style="color: #fff" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Đăng xuất</a>
            </p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endguest
    </div>
</div>
