<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Responders\DetailShopInfoResponder;
use App\Http\Services\ShopInfoService;
use Illuminate\Http\Response;

class DetailShopInfoGetActions extends Controller
{
    public function __construct(
        ShopInfoService $service,
        DetailShopInfoResponder $responder
    ) {
        $this->service = $service;
        $this->responder = $responder;
    }

    /**
     * 店舗詳細情報を取得する
     *
     * @param string $id
     * @return Response
     */
    public function __invoke($id): Response
    {
        $shopInfoData = $this->service->getShopInfoDetail($id);
        return $this->responder->response($shopInfoData);
    }
}
