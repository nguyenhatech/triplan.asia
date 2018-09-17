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
        $dataCart    = $request->session()->get('dataCart');

        if (is_null($dataCart)) {
            $dataCart = [];
        }

        return view('web.cart.index')->with([
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

        return redirect()->route('web.cart.index')->with('success', '');
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
     * @param  [type]  $course_id [description]
     * @return [type]             [description]
     */
    public function deleteOneCart(Request $request, $course_id)
    {
        $dataCart    = $request->session()->get('dataCart');

        if (is_null($dataCart)) {
            $dataCart = [];
        }

        $course = $this->course->getById($course_id);

        unset($dataCart[$course->id]);

        $request->session()->put('dataCart', $dataCart);

        return redirect()->route('web.cart.index')->with('success', '');
    }
}
