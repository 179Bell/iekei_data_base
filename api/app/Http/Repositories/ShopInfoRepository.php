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
}
