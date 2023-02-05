<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Services\ShopInfoService;
use Illuminate\Http\Request;

class UpdateShopInfoPostActions extends Controller
{
    private const SUCCEEDED = 1;

    public function __construct(ShopInfoService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $shopInfoId = $request->id;
        $data = [
            'shop_name' => $request['shop_name'],
            'latitude'  => $request['latitude'],
            'longitude' => $request['longitude'],
        ];

        $status = $this->service->updateShopInfo($shopInfoId, $data);

        if ($status === self::SUCCEEDED) {
            return redirect()->route('dashboard');
        }

        return back()->with('update_failed', '更新に失敗しました');
    }
}
