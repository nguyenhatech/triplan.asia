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
    }
}
