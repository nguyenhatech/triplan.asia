<?php

define('LANGUAGE_DEFAULT', 'vi');

function resetPrice($value, $name = 'VND')
{
    $model = \App::make('App\Repositories\Currencies\Currency');
    $currency = $model->where('display', $name)->first();
    if ($value && $name) {
        return ($value * 1000000) / $currency->ratio;
    }
    return $value;
}

/**
 * Lấy Locale khi query trên hệ thống
 */
function getLocaleQuery()
{
    $locale = isset($_GET['locale']) ? $_GET['locale'] : LANGUAGE_DEFAULT;

    if (empty($locale)) {
        $locale =  LANGUAGE_DEFAULT;
    }

    return $locale;
}

/**
 * Toàn bộ ngôn ngữ có trên hệ thống
 */
function getLocales($value='')
{
    $languageRepo = \App::make('App\Repositories\Languages\Language');
    $languages = $languageRepo->get();
    return array_pluck($languages, 'code');
}

/**
 * Lấy dữ liệu traslation frontend bắn lên. Nếu có thì lưu
 * Không có thì fill từ thằng ngôn ngữ mặc định vào
 */
function getDataTranslaiton($locale, $field, $valueField, $translations)
{
    if ($locale == LANGUAGE_DEFAULT) {
        return $valueField;
    }

    $valueTranslation = array_get($translations, $locale . '.' . $field, null);

    if (! is_null($valueTranslation)) {

        if (empty($valueTranslation)) {
            return 'Ngôn ngữ '. $locale . ' : ' . $valueField;
            return $valueField;
        }

        return $valueTranslation;
    }

    return 'Ngôn ngữ '. $locale . ' : ' . $valueField;
}

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

function trim_text($input, $length, $ellipses = true, $strip_html = true) {
    //strip tags, if desired
    if ($strip_html) {
        $input = strip_tags($input);
    }

    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }

    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);

    //add ellipses (...)
    if ($ellipses) {
        $trimmed_text .= '...';
    }

    return $trimmed_text;
}
