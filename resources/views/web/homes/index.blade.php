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
            height: 80vh;
        }

        .web-home .slideshow > div {
            position: absolute;
        }
        .web-home .slideshow img {
            width: 100vw;
            height: 80vh;
            object-fit: cover;
        }
        .web-home .search {
            position: absolute;
            z-index: 0;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 80vh;
        }
        .web-home .search div {
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <div class="web-home">
        <div class="slideshow">
           <div>
             <img src="{{ get_asset('web/images/banners/baner3-min.jpg') }}">
           </div>
           <div>
             <img src="{{ get_asset('web/images/banners/baner2-min.jpg') }}">
           </div>
        </div>
        <div class="search">
            <div>
                <h1 style="text-transform: uppercase; font-weight: bold">Bạn muốn đi đâu ?</h1>
                <h4 style="font-weight: 300;">Chuyến đi, trải nghiệm và địa điểm. Tất cả trong một dịch vụ</h4>
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
            .appendTo('.slideshow');
        },  3500);
    </script>
@endsection
