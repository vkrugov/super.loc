<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Hero;
use App\Power;

class HeroController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getHeroes(Request $request)
    {
        return Hero::getHeroes($request->from);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editHero(Request $request)
    {
        $hero = Hero::updateOrCreate(['id' => $request->id], [
            'nickname' => $request->nickname,
            'real_name' => $request->real_name,
            'origin_description' => $request->origin_description,
            'catch_phrase' => $request->catch_phrase,
            'last_updater' => auth()->user()->email,
            'updated_at' => time(),
        ]);

        Power::deleteHeroPowers($hero['id']);
        Power::saveHeroPowers($hero['id'], explode(',', $request->powers));
        ImageHelper::uploadHeroAvatar($request->file('avatar'), $hero['id']);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * @param Request $request
     * @return mixed|string
     */
    public function getUpdateHero(Request $request)
    {
        return Hero::getUpdateHero($request->id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteHero(Request $request)
    {
        Hero::deleteHero($request->id);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImg(Request $request)
    {
        ImageHelper::saveGalleryImage($request->file('image'), $request->id);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteImg(Request $request)
    {
        ImageHelper::deleteGalleryImage($request->img);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getGallery(Request $request)
    {
        return ImageHelper::getHeroGallery($request->id);
    }
}
