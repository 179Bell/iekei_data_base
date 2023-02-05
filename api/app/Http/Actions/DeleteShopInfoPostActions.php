<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Services\ShopInfoService;
use Illuminate\Http\Request;

class DeleteShopInfoPostActions extends Controller
{
    private const SUCCEEDED = 1;

    public function __construct(
        ShopInfoService $service
    ) {
        $this->service = $service;
    }


    public function __invoke(Request $request)
    {
        $shopInfoId = $request->id;
        $status = $this->service->deleteShopInfo($shopInfoId);

        if ($status === self::SUCCEEDED) {
            return redirect()->route('dashboard');
        }

        return back()->with('delete_failed', '削除に失敗しました');
    }
}
