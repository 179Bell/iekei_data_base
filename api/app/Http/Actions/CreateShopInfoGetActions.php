<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Responders\CreateShopInfoGetResponder as Responder;
use Illuminate\Http\Response;

class CreateShopInfoGetActions extends Controller
{
    public function __construct(Responder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * 店舗情報の新規作成画面を返す
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        return $this->responder->response();
    }
}
