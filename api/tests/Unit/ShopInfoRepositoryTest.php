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
}
