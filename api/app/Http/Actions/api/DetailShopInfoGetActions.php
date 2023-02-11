<?php

declare(strict_types=1);

namespace App\Http\Actions\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShopInfoResource;
use App\Http\Responders\api\DetailShopInfoResponder as ShopInfoResponder;
use App\Http\Services\ShopInfoService;
use Illuminate\Http\Response;

class DetailShopInfoGetActions extends Controller
{
    public function __construct(
        ShopInfoService $shopInfoService,
        ShopInfoResponder $shopInfoResponder
    ) {
        $this->shopInfoService = $shopInfoService;
        $this->shopInfoResponder = $shopInfoResponder;
    }

    /**
     * 店舗詳細情報を取得する
     *
     * @param string $id
     * @return Response
     */
    public function __invoke(string $id): ShopInfoResource
    {
        $shopInfoData = $this->shopInfoService->getShopInfoDetail($id);
        return $this->shopInfoResponder->response($shopInfoData);
    }
}
