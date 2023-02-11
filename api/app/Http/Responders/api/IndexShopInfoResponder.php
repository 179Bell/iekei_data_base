<?php

declare(strict_types=1);

namespace App\Http\Responders\api;

use App\Http\Resources\ShopInfoResource;

class IndexShopInfoResponder
{
    /**
     * 全店舗情報のJSONレスポンスを返す
     *
     * @param Collection $shopInfo
     * @return ShopInfoResource
     */
    public function response($shopInfo): ShopInfoResource
    {
        return new ShopInfoResource($shopInfo);
    }
}
