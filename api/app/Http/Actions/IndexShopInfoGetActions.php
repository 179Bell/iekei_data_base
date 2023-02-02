<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Responders\ShopInfoResponder;
use App\Http\Services\ShopInfoService;
use Illuminate\Http\Response;

class IndexShopInfoGetActions extends Controller
{
    public function __construct(
        ShopInfoService $service,
        ShopInfoResponder $responder
    ) {
        $this->service = $service;
        $this->responder = $responder;
    }

    /**
     * すべての店舗情報を取得
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        $shopInfo = $this->service->getAll();
        return $this->responder->response($shopInfo);
    }
}
