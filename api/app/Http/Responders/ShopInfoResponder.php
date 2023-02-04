<?php

declare(strict_types=1);

namespace App\Http\Responders;

use Illuminate\Contracts\View\Factory as View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class ShopInfoResponder
{
    public function __construct(
        Response $response,
        View $view
    ) {
        $this->response = $response;
        $this->view = $view;
    }

    /**
     * ダッシュボードのトップViewを作成してに店舗情報を返す
     *
     * @param Collection $shopInfos
     * @return Response
     */
    public function response(Collection $shopInfos): Response
    {
        return $this->response->setContent(
            $this->view->make('dashboard.top', ['shopInfos' => $shopInfos])
        );
    }
}
