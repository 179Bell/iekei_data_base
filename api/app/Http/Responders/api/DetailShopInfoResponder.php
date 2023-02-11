<?php

declare(strict_types=1);

namespace App\Http\Responders\api;

use App\Http\Resources\ShopInfoResource;

class DetailShopInfoResponder
{
    public function response($shopInfoData)
    {
        return new ShopInfoResource($shopInfoData);
    }
}
