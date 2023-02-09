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
            'latlong' => '35.000000, 139.000000',
            'prefecture' => '神奈川県',
            'city_name' => '横浜市港北区',
            'address' => '綱島東1-6-24'
        ];

        $result = $this->repository->create($data);

        $this->assertDatabaseHas('shop_information', [
            'shop_name' => $data['shop_name'],
            'latlong' => $data['latlong'],
            'prefecture' => $data['prefecture'],
            'city_name' => $data['city_name'],
            'address' => $data['address'],
        ]);
    }

    /**
     * @test
     */
    public function 店舗情報を削除できるか()
    {
        $data = [
            'shop_name' => 'テスト店舗名',
            'latlong' => '35.000000, 139.000000',
            'prefecture' => '神奈川県',
            'city_name' => '横浜市港北区',
            'address' => '綱島東1-6-24'
        ];

        $shopInfo = $this->repository->create($data);
        $this->repository->delete((string)$shopInfo->id);

        $this->assertDatabaseMissing('shop_information', [
            'shop_name' => $data['shop_name'],
            'latlong' => $data['latlong'],
            'prefecture' => $data['prefecture'],
            'city_name' => $data['city_name'],
            'address' => $data['address'],
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
            'latlong' => '35.53630702628978, 139.6350802676341',
            'prefecture' => '神奈川県',
            'city_name' => '横浜市港北区',
            'address' => '綱島東1-6-24'
        ];

        $result = $this->repository->show('1');
        $this->assertSame(1, $result->id);
        $this->assertSame($data['shop_name'], $result->shop_name);
        $this->assertSame($data['latlong'], $result->latlong);
        $this->assertSame($data['prefecture'], $result->prefecture);
        $this->assertSame($data['city_name'], $result->city_name);
        $this->assertSame($data['address'], $result->address);
    }

    /**
     * @test
     */
    public function 店舗情報を更新できるか()
    {
        $this->seed();

        $data = [
            'shop_name' => 'テスト店舗名',
            'latlong' => '35.000000, 139.000000',
            'prefecture' => '神奈川県',
            'city_name' => '横浜市港北区',
            'address' => '綱島東1-6-24'
        ];

        $this->repository->update('3', $data);
        $this->assertDatabaseHas('shop_information', $data);
    }
}
