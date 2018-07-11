<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\User\UserController;

class DashboardController extends UserController
{
    function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        return view('user.dashboards.index')->with([
            'title' => 'Bảng điều khiển'
        ]);
    }

    public function demo(Request $request)
    {
        \DB::beginTransaction();

        try {
            // Xử lý gì đó
            // ...........
            \DB::commit();

            return redirect()->route('admin.home')->with('success', 'Thêm mới thành công');
        }
        catch(\Illuminate\Validation\ValidationException $exception) {
            \DB::rollback();
            return redirect()->back()->withErrors($exception->validator->errors())->withInput();
        }
        catch (\Exception $e) {
            \Log::info('DashBoardController@demo: ' . $e);
            \DB::rollback();
            throw $e;
        }
    }

}
