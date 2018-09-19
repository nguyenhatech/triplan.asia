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
        // $request->session()->flush();
        $dataCart = is_null(session('dataCart')) ? [] : session('dataCart');

        $this->metadata->setMetaTitle('Giỏ hàng');

        $totalCart = 0;

        foreach ($dataCart as $key => $item) {
            // dd($item->service_packages);
            $totalServicePackage = 0;
            foreach ($item->service_packages as $key2 => $item2) {
                $totalServicePackage += $item2->quantity *  $item2->price_with_currency;
            }
            $totalCart +=  $totalServicePackage;
        }

        return view('web.carts.index')->with([
            'title' => 'Giỏ hàng',
            'totalCart' => $totalCart
        ]);
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
