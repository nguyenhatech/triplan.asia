<?php

namespace App\Http\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [

    ];

    public function transform(User $user = null)
    {
        if (is_null($user)) {
            return [];
        }

        return [
            'id'          => $user->id,
            'name'        => $user->name,
            'email'       => $user->email,
            'phone'       => $user->phone,
            'avatar'      => $user->avatar,
            'avatar_path' => $user->getImage(),
            'status'      => $user->status ? true : false,
            'status_txt'  => $user->getStatusText(),
            'created_at'  => $user->created_at ? $user->created_at->format('Y-m-d H:i:s') : null
        ];
    }

}
