<?php

declare(strict_types=1);

namespace App\Http\Responders;

use Illuminate\Http\Response;
use Illuminate\View\Factory as View;

class CreateShopInfoGetResponder
{
    protected $view;
    protected $response;

    public function __construct(
        Response $response,
        View $view
    ) {
        $this->response = $response;
        $this->view = $view;
    }

    /**
     * 店舗情報新規作成画面を返す
     *
     * @return Response
     */
    public function response(): Response
    {
        return $this->response->setContent($this->view->make('shop_info.create'));
    }
}
