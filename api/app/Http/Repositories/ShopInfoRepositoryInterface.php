<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface ShopInfoRepositoryInterface
{
    /**
     * すべての店舗情報を取得
     *
     * @return Collection
     */
    public function getAll(): Collection;
}
