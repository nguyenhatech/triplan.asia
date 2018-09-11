<div class="td-search-background" style="-webkit-overflow-scrolling: touch;height: 100vh;overflow-y: scroll;">
    <div class="td-search-close">
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
            <a href="{{ route('places.international') }}" style="color: #fff">@lang('menu_international')</a>
        </p>
        <p>
            <a href="{{ route('login') }}" style="color: #fff">@lang('login')</a>
        </p>
    </div>
</div>
