<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

use App\Repositories\Users\UserRepository;

class AccountController extends WebController
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    public function dashbroad()
    {
        $account = getCurrentUser();
        return view('web.account.index')->with([
            'account'   => $account
        ]);
    }

    public function update(Request $request)
    {
        $this->validationRules = [
            'name'          => 'required',
            'phone'         => 'required',
            'birthdate'     => 'required|min:1|max:31',
            'birthmonth'    => 'required|min:1|max:12',
            'birthyear'     => 'required|integer|between:1918,2018',
        ];

        $this->validationMessages = [
            'name.required'         => 'Trường bắt buộc nhập',
            'phone.required'        => 'Trường bắt buộc nhập',
            'birthdate.required'    => 'Trường bắt buộc nhập',
            'birthdate.min'         => 'Ngày không hợp lệ',
            'birthdate.max'         => 'Ngày không hợp lệ',
            'birthmonth.required'   => 'Trường bắt buộc nhập',
            'birthmonth.min'        => 'Tháng không hợp lệ',
            'birthmonth.max'        => 'Tháng không hợp lệ',
            'birthyear.required'    => 'Trường bắt buộc nhập',
            'birthyear.integer'     => 'Năm không đúng định dạng',
            'birthyear.between' => 'Năm không hợp lệ',
        ];

        try {
            $this->validate($request, $this->validationRules, $this->validationMessages);
            $params = $request->all();
            $params['birthday'] = $params['birthyear'] . '-' . $params['birthmonth'] . '-' . $params['birthdate'];
            $params = array_except($params, ['email']);
            if ($this->user->update(getCurrentUser()->id, $params)) {
                return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
            } else {
                return redirect()->back()->with('error', 'Có lỗi xảy ra! Vui lòng thực hiện lại sau.');
            }
            dd('success');
        } catch(\Illuminate\Validation\ValidationException $exception) {
            return redirect()->back()->withErrors($exception->validator->errors())->withInput();
        }
    }

    public function bookings(Request $request)
    {
        $account = getCurrentUser();
        return view('web.account.bookings')->with([
            'account'  => $account
        ]);
    }

    public function wishlist()
    {
        $account = getCurrentUser();
        return view('web.account.wishlist')->with([
            'account'  => $account
        ]);
    }
}
