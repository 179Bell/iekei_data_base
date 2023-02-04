<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ShopInfoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ShopInfoService extends Controller
{
    protected $shopInfoRepository;
    /**
     * @param ShopInfoRepositoryInterface $shopInfoRepository
     */
    public function __construct(
        ShopInfoRepositoryInterface $shopInfoRepository
    ) {
        $this->repository = $shopInfoRepository;
    }

    /**
     * すべての店舗情報を取得
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }
}
