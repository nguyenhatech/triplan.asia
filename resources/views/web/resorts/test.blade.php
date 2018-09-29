<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-base-url" content="{{ env('API_URL') }}" />
    <meta name="app-url" content="{{ env('APP_URL') }}" />
</head>
<body>
    <div class="container-fluid" id="td-outer-wrap">
        <div class="row">
            <div class="col-12">
                <resort-booking></resort-booking>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>
</html>
