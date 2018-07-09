<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\Users\UserRepository;

class UserController extends AdminController
{

    protected $validationRules = [

    ];

    protected $validationMessages = [

    ];

    function __construct(UserRepository $user)
    {
        $this->user = $user;
        $this->checkPermission('user');
    }

    public function resetPassword($password)
    {
        \DB::beginTransaction();

        try {
            $this->user->resetPassword($password);

            \DB::commit();

            return redirect()->route('admin.home')->with('success', 'Thêm mới thành công');
        }
        catch(\Illuminate\Validation\ValidationException $exception) {
            \DB::rollback();
            return redirect()->back()->withErrors($exception->validator->errors())->withInput();
        }
        catch (\Exception $e) {
            \DB::rollback();
            throw $e;
        }
    }

}
