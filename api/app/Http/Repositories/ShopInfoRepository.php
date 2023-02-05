<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Models\ShopInformation;
use Illuminate\Database\Eloquent\Collection;

class ShopInfoRepository implements ShopInfoRepositoryInterface
{
    public function getAll(): Collection
    {
        return ShopInformation::all();
    }

    public function create(array $data): ShopInformation
    {
        return ShopInformation::create($data);
    }

    public function delete(string $shopInfoId): int
    {
        return ShopInformation::destroy($shopInfoId);
    }

    public function update(string $shopInfoId, array $data): int
    {
        $shopInfo = ShopInformation::find($shopInfoId);
        return $shopInfo->save($data);
    }

    public function show(string $shopInfoId): ShopInformation
    {
        return ShopInformation::find($shopInfoId);
    }
}
