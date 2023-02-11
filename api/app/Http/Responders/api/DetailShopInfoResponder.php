<?php

declare(strict_types=1);

namespace App\Http\Responders\api;

use App\Http\Resources\ShopInfoResource;

class DetailShopInfoResponder
{
    /**
     * 店舗詳細情報のJSONレスポンスを返す
     *
     * @param Collection $shopInfoData
     * @return ShopInfoResource
     */
    public function response($shopInfoData): ShopInfoResource
    {
        return new ShopInfoResource($shopInfoData);
    }
}
