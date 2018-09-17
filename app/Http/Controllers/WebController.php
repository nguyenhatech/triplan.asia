<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Languages\LanguageRepository;
use App\Repositories\Core\Metadata\MetadataTrait;

class WebController extends Controller
{
    use MetadataTrait;

    function __construct()
    {
        $this->getMetadata();

        $this->middleware(function ($request, $next) {
            $dataCart = is_null(session('dataCart')) ? [] : session('dataCart');
            \View::share('dataCart', $dataCart);

            return $next($request);
        });
    }
}
