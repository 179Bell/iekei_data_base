<?php

declare(strict_types=1);

namespace App\Http\Responders;

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

    public function response()
    {
        return $this->response->setContent($this->view->make('shop_info.detail'));
    }
}
