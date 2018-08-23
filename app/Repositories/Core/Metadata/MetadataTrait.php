<?php

namespace App\Repositories\Core\Metadata;
use Request;
use App;

trait MetadataTrait
{
    /**
     * Init metadata variable in controller and shared view
     * @return void
     */
    public function getMetadata()
    {
        $this->metadata = \App::make(Metadata::class);
        view()->share('metadata', $this->metadata);
    }

    public function createMetaKeywordPlace($place)
    {
        switch (\App::getLocale()) {
            case 'vi':
                return 'du lịch ' . $place->getTranslation('vi')->name . ', ' .
                'tour ' . $place->getTranslation('vi')->name . ', ' .
                'du lich ' . str_replace('-', ' ', $place->getTranslation('vi')->slug) . ', ' .
                'tour ' . str_replace('-', ' ', $place->getTranslation('vi')->slug);
                break;
            case 'en':
                return str_replace('-', ' ', $place->getTranslation('en')->slug) . ' travel, ' .
                str_replace('-', ' ', $place->getTranslation('en')->slug) . ' trip, ' .
                str_replace('-', ' ', $place->getTranslation('en')->slug) . ' travel guide';
                break;
            default:
                return 'du lịch ' . $place->getTranslation('vi')->name . ', ' .
                'tour ' . $place->getTranslation('vi')->name . ', ' .
                'du lich ' . str_replace('-', ' ', $place->getTranslation('vi')->slug) . ', ' .
                'tour ' . str_replace('-', ' ', $place->getTranslation('vi')->slug);
                break;
        }
    }

    public function createMetaTitlePlace($place)
    {
        switch (\App::getLocale()) {
            case 'vi':
                return 'Du lịch ' . $place->getTranslation('vi')->name;
                break;
            case 'en':
                return $place->getTranslation('en')->name . ' travel';
                break;
            default:
                return 'Du lịch ' . $place->getTranslation('vi')->name;
                break;
        }
    }

    public function createMetaDescriptionPlace($place)
    {
        switch (\App::getLocale()) {
            case 'vi':
                return 'Thông tin du lịch ' . $place->getTranslation('vi')->name . '. ' .
                ' Tất cả các tour đi ' . $place->getTranslation('vi')->name;
                break;
            case 'en':
                return $place->getTranslation('en')->name . ' travel. ' .
                $place->getTranslation('en')->name . ' cuisine. ' .
                'Place to stay ' . $place->getTranslation('en')->name . ' ' .
                'Things to do ' . $place->getTranslation('en')->name;
                break;
            default:
                return 'Thông tin du lịch ' . $place->getTranslation('vi')->name . '. ' .
                ' Tất cả các tour đi ' . $place->getTranslation('vi')->name;
                break;
        }
    }
}
