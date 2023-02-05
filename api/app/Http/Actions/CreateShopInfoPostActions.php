<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Services\ShopInfoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CreateShopInfoPostActions extends Controller
{
    public function __construct(
        ShopInfoService $service
    ) {
        $this->service = $service;
    }

    /**
     * 店舗情報を新規作成
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $data = [
            'shop_name' => $request['shop_name'],
            'latitude'  => $request['latitude'],
            'longitude' => $request['longitude'],
        ];

        $this->service->createShopInfo($data);

        return redirect()->route('dashboard');
    }
}
