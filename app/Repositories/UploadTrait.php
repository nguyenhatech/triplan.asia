<?php
namespace App\Repositories;
use Image;

trait UploadTrait
{
    /**
     * upload image
     * @param  mixed $file
     * @return array
     */
    public function upload($file, $resize = true)
    {
        $image_name    = $this->generateNewFileName($file);
        $sm_image_name = 'sm_' . $image_name;

        try {
            if ($resize) {
                Image::make($file->getRealPath())->fit($this->model->imgWidth, $this->model->imgHeight)->save($this->getUploadImagePath($image_name));
                Image::make($file->getRealPath())->fit($this->model->sm_imgWidth, $this->model->sm_imgHeight)->save($this->getUploadImagePath($sm_image_name));
            } else {
                $upload = Image::make($file->getRealPath())->save($this->getUploadImagePath($image_name));
            }
            return $this->uploadSuccess($image_name);
        } catch (Exception $e) {
            return $this->uploadFail($e);
        }
    }

    /**
     * Generate new file name
     *
     * @param  string $filename
     *
     * @return string
     */
    public function generateNewFileName($file) {
        $strSecret   = '!@#$%^&*()_+QBGFTNKU' . time() . rand(111111,999999);
        $filenameMd5 = md5($file . $strSecret);
        return date('Y_m_d') . '_' . $filenameMd5 . '.' . $file->getClientOriginalExtension();
    }

    /**
     * get image path
     * @param  String $img
     * @return String
     */
    protected function getImagePath($img) {
        return get_asset($this->model->imgPath . '/' . $img);
    }

    /**
     * get path upload image
     * @param string $img
     * @return string
     */
    protected function getUploadImagePath($img){
        return storage_path($this->model->uploadPath . '/' . $img);
    }

    /**
     * upload success response
     * @param  mixed $data
     * @return array
     */
    protected function uploadSuccess($name) {
        return [
            'code'    => 1,
            'message' => 'success',
            'data'    => [
                'name' => $name,
                'path' => $this->getImagePath($name)
            ]
        ];
    }

     /**
     * upload fail response
     * @param  mixed $data
     * @return array
     */
    protected function uploadFail($data) {
        return [
            'code'    => 0,
            'message' => 'fail',
            'data'    => $data
        ];
    }

    /**
     * [removeImage description]
     * @param  [type] $image [description]
     * @return [type]        [description]
     */
    public function removeImage($image)
    {
        @unlink($this->getUploadImagePath($image));
        @unlink($this->getUploadImagePath('sm_' . $image));
    }

}
