<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ShopInfoRepositoryInterface;
use App\Models\ShopInformation;
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

    /**
     * 店舗情報を新規作成
     *
     * @param array $data
     * @return ShopInformation
     */
    public function createShopInfo(array $data): ShopInformation
    {
        return $this->repository->create($data);
    }

    /**
     * 店舗情報を削除
     *
     * @param string $shopInfoId
     * @return int
     */
    public function deleteShopInfo(string $shopInfoId): int
    {
        return $this->repository->delete($shopInfoId);
    }

    /**
     * 店舗情報を更新
     *
     * @param string $shopInfoId
     * @param array $data
     * @return integer
     */
    public function updateShopInfo(string $shopInfoId, array $data): bool
    {
        return $this->repository->update($shopInfoId, $data);
    }

    /**
     * 店舗情報の詳細を取得
     *
     * @param string $shopInfoId
     * @return ShopInformation
     */
    public function getShopInfoDetail(string $shopInfoId): ShopInformation
    {
        return $this->repository->show($shopInfoId);
    }
}
