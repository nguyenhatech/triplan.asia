<?php

namespace App\Repositories\Core\Metadata;

use App\Repositories\Settings\Setting;

class Metadata {
    protected $name = 'Triplan';
    protected $address;
    protected $email;
    protected $phone;
    protected $short_description;
    protected $description;
    protected $meta_title;
    protected $meta_keyword;
    protected $meta_description;
    protected $js_codes;
    protected $social_network;
    protected $ogpimage;

    public function __construct() {
        $setting = \Cache::remember('setting', 30, function () {
            return Setting::find(1);
        });

        if($setting) {
            $this->email                = $setting->email;
            $this->phone                = $setting->phone;
            $this->address              = $setting->address;
            $this->short_description    = $setting->short_description;
            $this->description          = $setting->description;
            $this->meta_title           = $setting->meta_title;
            $this->meta_keyword         = $setting->meta_keyword;
            $this->meta_description     = $setting->meta_description;
            $this->js_codes             = $setting->js_codes;
            $this->social_network       = $setting->social_network;
        }
        $this->ogpimage = asset('images/og_image.jpg');
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPhone()
    {
        return json_decode($this->phone);
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getAddress()
    {
        return $this->address;
    }

    // Sort Description
    public function setShortDescription($short_description) {
        $this->short_description = $short_description;
    }

    /**
     * Get site short description
     * @return string
     */
    public function getShortDescription() {
        return $this->short_description;
    }

    // Description
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Get site description
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    // Meta Title
    public function setMetaTitle($meta_title) {
        $this->meta_title = $meta_title;
    }

    /**
     * Get site metatitle
     * @return string
     */
    public function getMetaTitle() {
        return $this->meta_title;
    }

    // Meta Keyword
    public function setMetaKeyword($meta_keyword) {
        $this->meta_keyword = $meta_keyword;
    }

    /**
     * Get site meta title
     * @return string
     */
    public function getMetaKeyword() {
        return $this->meta_keyword;
    }

    // Meta Description
    public function setMetaDescription($meta_description) {
        $this->meta_description = $meta_description;
    }

    /**
     * Get site meta description
     * @return string
     */
    public function getMetaDescription() {
        return $this->meta_description;
    }

    // Js Codes
    public function setJsCodes($js_codes) {
        $this->js_codes = $js_codes;
    }

    /**
     * Get site js code
     * @return string
     */
    public function getJsCodes() {
        return $this->js_codes;
    }

    // Facebook
    public function setSocialNetwork($social_network) {
        $this->social_network = $social_network;
    }

    /**
     * Get site facebook
     * @return string
     */
    public function getSocialNetwork() {
        return json_decode($this->facebook);
    }

    public function setOgpimage($image)
    {
        $this->ogpimage = $image;
    }

    public function getOgpimage()
    {
        return $this->ogpimage;
    }
}
