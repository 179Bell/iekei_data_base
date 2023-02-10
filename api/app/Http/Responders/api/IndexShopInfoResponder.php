<?php

declare(strict_types=1);

namespace App\Http\Responders\api;

use App\Http\Resources\ShopInfoResource;

class IndexShopInfoResponder
{
    public function response($shopInfo)
    {
        // return ShopInfoResource::collection($shopInfo);
        return $shopInfo->toJson();
    }
}
