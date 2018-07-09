<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function checkPermission($moduleName)
    {
        $this->middleware("ability:superadmin|admin,{$moduleName}.index")->only(['index']);
        $this->middleware("ability:superadmin|admin,{$moduleName}.show")->only('show');
        $this->middleware("ability:superadmin|admin,{$moduleName}.store")->only('store');
        $this->middleware("ability:superadmin|admin,{$moduleName}.update")->only('update');
        $this->middleware("ability:superadmin|admin,{$moduleName}.destroy")->only('destroy');
    }
}
