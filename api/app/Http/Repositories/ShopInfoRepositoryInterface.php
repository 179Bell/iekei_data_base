<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Models\ShopInformation;
use Illuminate\Database\Eloquent\Collection;

interface ShopInfoRepositoryInterface
{
    /**
     * すべての店舗情報を取得
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * 店舗情報を新規作成
     *
     * @param array $data
     * @return ShopInformation
     */
    public function create(array $data): ShopInformation;

    /**
     * 店舗情報を削除
     *
     * @param string $shopInfoId
     * @return integer
     */
    public function delete(string $shopInfoId): int;

    /**
     * 店舗情報を更新
     *
     * @param string $shopInfoId
     * @param array $data
     * @return integer
     */
    public function update(string $shopInfoId, array $data): int;

    /**
     * 店舗情報の詳細を取得
     *
     * @param string $shopInfoId
     * @return ShopInformation
     */
    public function show(string $shopInfoId): ShopInformation;
}
