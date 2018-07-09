<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\User\UserController;

use App\Repositories\Users\UserRepository;

class AccountController extends UserController
{
    function __construct(UserRepository $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $user = getCurrentUser();

        return view('user.account.index')->with([
            'title' => 'Thông tin cá nhân',
            'user'  => $user
        ]);
    }

    public function update(Request $request)
    {
        \DB::beginTransaction();

        try {
            $this->validationRules = [
                'name'     => 'required|max:100',
                'phone'    => 'nullable|digits_between:8,12',
                'address'  => 'nullable|max:191',
                'birthday' => 'nullable|date_format:d-m-Y'
            ];

            $this->validationMessages = [

            ];
            $this->validate($request, $this->validationRules, $this->validationMessages);

            $params = $request->only([
                'name',
                'phone',
                'address',
                'birthday',
                'avatar',
                'image'
            ]);
            $date = str_replace('/', '-', $params['birthday']);
            $params['birthday'] = date('Y-m-d', strtotime($date));

            $model = $this->user->update(getCurrentUser()->id, $params);

            \DB::commit();

            return redirect()->route('user.account')->with('success', 'Cập nhật thành công');
        }
        catch(\Illuminate\Validation\ValidationException $exception) {
            \DB::rollback();
            return redirect()->back()->withErrors($exception->validator->errors())->withInput();
        }
        catch (\Exception $e) {
            \Log::info('AccountController@store: ' . $e);
            \DB::rollback();
            throw $e;
        }
    }

    public function viewChangePassword(Request $request)
    {
        return view('user.account.reset-pass')->with([
            'title' => 'Đổi mật khẩu'
        ]);
    }

    public function storeChangePassword(Request $request)
    {
        $this->validationRules = [
            'old_password' => 'required|min:6|max:255',
            'password'     => 'required|min:6|max:255|confirmed',
        ];

        $this->validationMessages = [
            'old_password.required' => 'Vui lòng nhập mật khẩu cũ',
            'old_password.min'      => 'Mật khẩu cũ cần lớn hơn :min kí tự',
            'old_password.max'      => 'Mật khẩu cũ cần nhỏ hơn :max kí tự',
            'password.required'     => 'Vui lòng nhập mật khẩu mới',
            'password.min'          => 'Mật khẩu mới cần lớn hơn :min kí tự',
            'password.max'          => 'Mật khẩu mới cần nhỏ hơn :max kí tự',
            'password.confirmed'    => 'Xác nhận mật khẩu mới không chính xác',
        ];

        \DB::beginTransaction();

        try {
            $this->validate($request, $this->validationRules, $this->validationMessages);

            $params = $request->all();
            $params = array_only($params, ['password', 'old_password']);

            if (!\Hash::check($params['old_password'], getCurrentUser()->password)) {
                return redirect()->route('user.account.change-password')->with('error', 'Mật khẩu cũ không chính xác !');
            }
            $params['password'] = bcrypt($params['password']);

            $model = $this->user->update(getCurrentUser()->id, $params);

            \DB::commit();
            return redirect()->route('user.account.change-password')->with('success', 'Đổi mật khẩu thành công');
        }
        catch (\Illuminate\Validation\ValidationException $exception) {
            \DB::rollback();
            return redirect()->back()->withErrors($exception->validator->errors())->withInput();
        }
        catch (\Exception $e) {
            \DB::rollback();
            throw $e;
        }
    }

    /**
     * Upload ảnh cho User
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function upload (Request $request) {
        try {

            $this->validate($request, [
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ], [
                'file.image'    => 'File upload không đúng định dạng',
                'file.mimes'    => 'File upload phải là 1 trong các định dạng: :values',
                'file.max'      => 'File upload không thể vượt quá :max KB',
            ]);

            return $this->user->updateAvatar(getCurrentUser()->id, $request['file']);

        } catch (\Illuminate\Validation\ValidationException $validationException) {
            return $this->errorResponse([
                'errors' => $validationException->validator->errors(),
                'exception' => $validationException->getMessage()
            ]);
        }
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
