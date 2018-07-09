<?php

/**
 * Hàm ghi đè lấy đường dẫn
 * @param  [type] $path [description]
 * @return [type]       [description]
 */
function get_asset($path)
{
    // return asset($path, env('APP_ENV') == 'production');
    return asset($path);
}

/**
 * Lấy User hiện tại đang đăng nhập
 * @param  string $guard [description]
 * @return [type]        [description]
 */
function getCurrentUser($guard = '')
{
    if (Auth::check()) {
        if ($guard != '') {
            return Auth::guard($guard)->user();
        }
        return Auth::user();
    }
    return false;
}
