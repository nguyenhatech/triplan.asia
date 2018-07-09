@extends('web.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('styles')
    <style type="text/css">
        .web-home {
            position: relative;
        }
        .web-home .slideshow {
            position: relative;
            width: 100vw;
            height: 100vh;
        }

        .web-home .slideshow > div {
            position: absolute;
            width: 100vw;
            height: 100vh;
        }
        .web-home .slideshow img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .web-home .search {
            position: absolute;
            z-index: 1200;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
        }
        .web-home .search div {
            padding: 15px 20px;
            background-color: #ffffff96;
            border-radius: 4px;
        }
    </style>
@endsection

@section('content')
    <div class="web-home">
        <div class="slideshow">
           <div>
             <img src="{{ get_asset('web/images/banners/baner1.jpg') }}">
           </div>
           <div>
             <img src="{{ get_asset('web/images/banners/baner2.jpg') }}">
           </div>
        </div>
        <div class="search">
            <div>
                <h1>Bạn muốn đi đâu ?</h1>
                <h3>Chuyến đi, trải nghiệm và địa điểm. Tất cả trong một dịch vụ</h3>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".slideshow > div:gt(0)").hide();

        setInterval(function() {
          $('.slideshow > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('#slideshow');
        },  3500);
    </script>
@endsection
