<?php

namespace App\Repositories\SocialAccounts;
use App\Repositories\BaseRepository;

class DbSocialAccountRepository extends BaseRepository implements SocialAccountRepository
{
    public function __construct(SocialAccount $socialAccount)
    {
        $this->model = $socialAccount;
    }

    /**
     * Lấy ra hoặc tạo mới tài khoản mạng xã hội để khách hàng đăng kí hoặc đăng nhập
     * Nhả về User trong hệ thống ứng với tài khoản mã xã hội
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function getOrCreateSocialAccount($params, $social)
    {
        // Lấy ra Social Account
        $socialAccount = $this->model->where('provider_user_id', $params['provider_user_id'])
                                    ->where('provider', $social)
                                    ->first();

        if (is_null($socialAccount)) {
            // Lấy ra User
            $userRepo = \App::make('App\Repositories\Users\UserRepository');
            $user = $userRepo->getOrCreateUserAccount($params);

            // Tạo Ra $socialAccount
            $dataSocialAccount = [
                'user_id'          => $user->id,
                'provider_user_id' => $params['provider_user_id'],
                'provider'         => $social
            ];

            $socialAccount = $this->model->create($dataSocialAccount);
        }

        return $socialAccount->user;
    }

}
