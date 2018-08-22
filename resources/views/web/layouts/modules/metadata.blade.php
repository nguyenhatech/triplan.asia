@if (isset($metadata))
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="content-language" content="vi" />
<meta name="robots" content="index,follow" />
<meta name="revisit-after" content="1 days" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no" />
<link href="{{ get_asset('favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
<title>{{ $metadata->getMetaTitle() }} - {{ $metadata->getName() }}</title>
<meta name="keywords" content="{!! $metadata->getMetaKeyword() !!}"/>
<meta name="description" content="{{ $metadata->getDescription() }}"/>
<meta name="author" content="{{ $metadata->getName() }}"/>
<link rel="canonical" href="{{ URL::current() }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#"/>
<meta itemprop="name" content="{{ $metadata->getName() }}">
<meta itemprop="description" content="{{ $metadata->getDescription() }}">
<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="website" />
<meta property="og:title" content="" />
<meta property="og:site_name" content="{{ $metadata->getName() }}" />
<link property="og:image" href="{{ $metadata->getOgpimage() }}" />
<meta property="og:description" content="{{ $metadata->getDescription() }}" />
<meta property="og:url" href="{{ URL::current() }}" />
<meta name="api-base-url" content="{{ env('API_URL') }}" />
@endif
