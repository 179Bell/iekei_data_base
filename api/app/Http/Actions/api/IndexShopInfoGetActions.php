<?php

declare(strict_types=1);

namespace App\Http\Actions\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShopInfoResource;
use App\Http\Responders\api\IndexShopInfoResponder as ShopInfoResponder;
use App\Http\Services\ShopInfoService;

class IndexShopInfoGetActions extends Controller
{
    public function __construct(
        ShopInfoService $shopInfoService,
        ShopInfoResponder $shopInfoResponder
    ) {
        $this->shopInfoService = $shopInfoService;
        $this->shopInfoResponder = $shopInfoResponder;
    }

    /**
     * 全店舗情報のJSONレスポンスを返す
     *
     * @return ShopInfoResource
     */
    public function __invoke(): ShopInfoResource
    {
        $shopInfo = $this->shopInfoService->getAll();
        return $this->shopInfoResponder->response($shopInfo);
    }
}
