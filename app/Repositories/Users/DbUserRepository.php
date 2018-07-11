<?php

namespace App\Repositories\Users;
use App\Repositories\BaseRepository;
use App\User;
use App\Repositories\UploadTrait;

class DbUserRepository extends BaseRepository implements UserRepository
{
    use UploadTrait;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getById($id)
    {
        if (!is_numeric($id)) {
            $id = strtolower($id);
            $id = \Hashids::decode($id)[0];
        }
        return $this->model->find($id);
    }

    public function getByQuery($params, $size = 25, $sorting = [])
    {
        $status = array_get($params, 'status', null);
        $query  = array_get($params, 'q', null);
        $user_type = array_get($params, 'user_type', null);

        $model  = $this->model->where('id', '>', 2);

        if (!empty($sorting)) {
            $model = $model->orderBy($sorting[0], $sorting[1] > 0 ? 'ASC' : 'DESC');
        } else {
            $model = $model->orderBy('id', 'DESC');
        }

        if (! is_null($status)) {
            $model = $model->where('status', $status);
        }

        if (! is_null($user_type)) {
            $model = $model->where('user_type', $user_type);
        }

        if (! is_null($query)) {
            $model = $model->where(function($q) use ($query) {
                return $q->where('name', 'like', "%{$query}%");
            });
        }

        return $size < 0 ? $model->get() : $model->paginate($size);
    }

    /**
     * Hàm lấy ra hoặc tạo mới User khi họ thực hiện đăng kí, đăng nhập
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function getOrCreateUserAccount($params)
    {
        $user = $this->model->where('email', $params['email'])->first();

        if (is_null($user)) {
            $dataUser = [
                'email'       => $params['email'],
                'name'        => isset($params['name']) ? $params['name'] : $params['email'],
                'avatar'      => isset($params['avatar']) ? $params['avatar'] : '',
                'password'    => isset($params['password']) ? $params['password'] : bcrypt(rand(1,10000))
            ];

            $user = $this->model->create($dataUser);
        }

        return $user;
    }

    /**
     * Cập nhật thông tin User
     *
     * @param  integer $id ID bản ghi
     * @return bool
     */
    public function update($id, $data)
    {

        $record = $this->getById($id);

        $avatar = array_get($data, 'avatar', null);

        if (! is_null($avatar)) {
            // Tải ảnh mới lên
            $avatar = $this->upload($data['avatar']);
            if ($avatar['code']) {
                $data['avatar'] = $avatar['data']['name'];
            }
            // Xóa ảnh cũ
            $this->removeImage($record->avatar);
        }

        $record->fill($data)->save();
        return $this->getById($id);
    }

    /**
     * Cập nhật thông tin User
     *
     * @param  integer $id ID bản ghi
     * @return bool
     */
    public function updateAvatar($id, $data)
    {
        $record = $this->getById($id);
        $data = $this->upload($data);

        $avatar = $data['data']['name'];
        $record->avatar = $avatar;
        $record->save();

        return $this->getById($id);
    }

}
