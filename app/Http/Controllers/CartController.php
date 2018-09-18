<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

class CartController extends WebController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $dataCart = is_null(session('dataCart')) ? [] : session('dataCart');

        $this->metadata->setMetaTitle('Giỏ hàng');
        // dd($dataCart);
        //
        // foreach ($dataCart as $key => $item) {
        //     dd($item->service_info);
        // }
        return view('web.carts.index')->with([
            'title' => 'Giỏ hàng',
            'dataCart' => $dataCart
        ]);
    }

    /**
     * Thêm vào giở hàng
     * @param Request $request   [description]
     * @param [type]  $course_id [description]
     */
    public function addCart(Request $request, $course_id)
    {
        $dataCart = is_null(session('dataCart')) ? [] : session('dataCart');

        dd('dưqdq');

        $dataCart[$course->id]    = $course;

        $request->session()->put('dataCart', $dataCart);

        return redirect()->route('web.carts.index')->with('success', '');
    }

    /**
     * Thêm vào giở hàng
     * @param Request $request   [description]
     * @param [type]  $course_id [description]
     */
    public function addCartRealTime(Request $request)
    {
        $dataCart = is_null(session('dataCart')) ? [] : session('dataCart');
        $params = $request->all();
        $params = json_decode($params['dataBooking']);

        $dataCart[$params->service_info->id] = $params;

        $request->session()->put('dataCart', $dataCart);

        $response = array_merge([
            'code' => 200,
            'status' => 'success',
        ], [
            'totalCart' => (int) count($request->session()->get('dataCart'))
        ]);

        return response()->json($response, $response['code']);
    }

    /**
     * Xóa từ giỏ hàng
     * @param  Request $request   [description]
     * @param  [type]  $service_id [description]
     * @return [type]             [description]
     */
    public function deleteOneCart(Request $request, $service_id)
    {
        $dataCart = is_null(session('dataCart')) ? [] : session('dataCart');

        unset($dataCart[$service_id]);

        $request->session()->put('dataCart', $dataCart);

        return redirect()->route('web.cart.index')->with('success', '');
    }
}
