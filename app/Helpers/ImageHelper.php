<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageHelper
{
    /**
     * @param $img
     * @param $heroId
     */
    public static function uploadHeroAvatar($img, $heroId)
    {
        if (!$img) {
            return;
        }

        static::saveAvatar($img, $heroId);
    }

    /**
     * @param $heroId
     * @return string
     */
    public static function getHeroAvatar($heroId)
    {
        $storageType = env('FILES_STORAGE_DRIVER');
        $image = Storage::disk($storageType)->files('heroes' . DIRECTORY_SEPARATOR . $heroId . DIRECTORY_SEPARATOR .'avatar')[0] ?? '';

        return $image ? Storage::disk($storageType)->url($image) : '';
    }

    /**
     * @param $heroId
     * @return array
     */
    public static function getHeroGallery($heroId)
    {
        if (!$heroId) {
            return [];
        }

        $images = Storage::disk(env('FILES_STORAGE_DRIVER'))->files('heroes' . DIRECTORY_SEPARATOR . $heroId . DIRECTORY_SEPARATOR .'gallery');

        return static::setGallery($images) ;

    }

    /**
     * @param $img
     * @param $heroId
     */
    public static function saveGalleryImage($img, $heroId)
    {
        if (!$img || !$heroId) {
            false;
        }

        $imagePath = $img->store('heroes' . DIRECTORY_SEPARATOR . $heroId . DIRECTORY_SEPARATOR . 'gallery');
        $storageType = env('FILES_STORAGE_DRIVER');
        $image = Image::make(Storage::get($imagePath))->resize(400, 500)->encode();
        Storage::disk($storageType)->put($imagePath, $image);

        true;
    }

    /**
     * @param $img
     */
    public static function deleteGalleryImage($img)
    {
        Storage::disk(env('FILES_STORAGE_DRIVER'))->delete($img);
    }

    /**
     * @param array $images
     * @return array
     */
    private static function setGallery(array $images)
    {
        $gallery = [];

        foreach ($images as $key => $image) {
            $gallery[$key]['name'] = $image;
            $gallery[$key]['url'] = Storage::disk(env('FILES_STORAGE_DRIVER'))->url($image);
        }

        return $gallery;
    }

    /**
     * @param $img
     * @param $heroId
     */
    private static function saveAvatar($img, $heroId)
    {
        $storageType = env('FILES_STORAGE_DRIVER');
        Storage::disk($storageType)->deleteDirectory('heroes' . DIRECTORY_SEPARATOR . $heroId . DIRECTORY_SEPARATOR . 'avatar');
        $imagePath = $img->store('heroes' . DIRECTORY_SEPARATOR . $heroId . DIRECTORY_SEPARATOR . 'avatar');
        $image = Image::make(Storage::get($imagePath))->resize(200, 250)->encode();
        Storage::disk($storageType)->put($imagePath, $image);
    }
}
