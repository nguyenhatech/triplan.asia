<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\SocialAccounts\SocialAccountRepository;

use Socialite;

class SocialAuthController extends Controller
{
    function __construct(SocialAccountRepository $socialAccount)
    {
        $this->socialAccount = $socialAccount;
    }

    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $facebookData = Socialite::driver($social)->user();

        if (!isset($facebookData->email)) {
            return redirect()->back()->with('error', 'Tài khoản facebook của bạn không có email, vui lòng cập nhật Email.');
        }

        $dataSocialLogin = [
            'provider_user_id' => $facebookData->id,
            'name' => $facebookData->name,
            'email' => $facebookData->email,
            'avatar' => $facebookData->avatar_original
        ];

        $user = $this->socialAccount->getOrCreateSocialAccount($dataSocialLogin, $social);

        // Cập nhật lại Avatar
        $avatar = isset($dataSocialLogin['avatar']) ? $dataSocialLogin['avatar'] : '';
        if ($avatar) {
            $user->avatar = $avatar;
            $user->name = $dataSocialLogin['name'];
            $user->save();
        }

        auth()->login($user);

        return redirect()->route('user.dashboard');
    }
}
