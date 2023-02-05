<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Http\Repositories\ShopInfoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopInfoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new ShopInfoRepository();
    }

    /**
     * @test
     */
    public function 店舗を全件取得したときの件数が正しいか(): void
    {
        $this->seed();

        $result = $this->repository->getAll();

        $this->assertSame(3, $result->count());
    }

    /**
     * @test
     */
    public function 店舗情報を新規作成できるか(): void
    {
        $data = [
            'shop_name' => 'テスト店舗名',
            'latitude' => '35.000000',
            'longitude' => '139.000000'
        ];

        $result = $this->repository->create($data);

        $this->assertDatabaseHas('shop_information', [
            'shop_name' => $data['shop_name'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude']
        ]);
    }

    /**
     * @test
     */
    public function 店舗情報を削除できるか()
    {
        $data = [
            'shop_name' => 'テスト店舗名',
            'latitude' => '35.000000',
            'longitude' => '139.000000'
        ];

        $shopInfo = $this->repository->create($data);
        $this->repository->delete((string)$shopInfo->id);

        $this->assertDatabaseMissing('shop_information', [
            'shop_name' => $data['shop_name'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude']
        ]);
    }

    /**
     * @test
     */
    public function 店舗情報の詳細を取得することができるか()
    {
        $this->seed();

        $data = [
            'shop_name' => '武虎家',
            'latitude' => '35.53629411677219',
            'longitude' => '139.63507570516012',
        ];

        $result = $this->repository->show('1');
        $this->assertSame(1, $result->id);
        $this->assertSame($data['shop_name'], $result->shop_name);
        $this->assertSame($data['latitude'], $result->latitude);
        $this->assertSame($data['longitude'], $result->longitude);
    }

    /**
     * @test
     */
    public function 店舗情報を更新できるか()
    {
        $this->seed();

        $data = [
            'shop_name' => 'テスト店舗名',
            'latitude' => '35.000000',
            'longitude' => '139.000000'
        ];

        $this->repository->update('3', $data);
        $this->assertDatabaseHas('shop_information', $data);
    }
}
