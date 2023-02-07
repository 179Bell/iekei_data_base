<?php

declare(strict_types=1);

namespace App\Http\Responders;

use App\Models\ShopInformation;
use Illuminate\Http\Response;
use Illuminate\View\Factory as View;

class DetailShopInfoResponder
{
    public function __construct(
        Response $response,
        View $view
    ) {
        $this->response = $response;
        $this->view = $view;
    }

    public function response(ShopInformation $shopInfo)
    {
        return $this->response->setContent($this->view->make('shop_info.detail', ['shopInfo' => $shopInfo]));
    }
}
