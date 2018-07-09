@extends('web.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('styles')
    <style type="text/css">
        .image {
            background-image: url({{ get_asset('web/images/banners/baner1.jpg') }});
            height: 100vh;
            width: 100vw;
            background-size: cover;
        }
        #slideshow {
            position: relative;
            width: 100vw;
            height: 100vh;
        }

        #slideshow > div {
            position: absolute;
            width: 100vw;
            height: 100vh;
        }
    </style>
@endsection

@section('content')
    <div id="slideshow">
       <div>
         <img src="{{ get_asset('web/images/banners/baner1.jpg') }}">
       </div>
       <div>
         <img src="{{ get_asset('web/images/banners/baner2.jpg') }}">
       </div>
       <div>
         Pretty cool eh? This slide is proof the content can be anything.
       </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#slideshow > div:gt(0)").hide();

        setInterval(function() {
          $('#slideshow > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('#slideshow');
        },  3000);
    </script>
@endsection
