<?php

declare(strict_types=1);

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ShopInfoServiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = $this->app->make('\App\Http\Services\ShopInfoService');
        $this->user = $this->artisan('db:seed', ['--class' => 'UserSeeder']);
    }

    /**
     * @test
     */
    public function 管理者は管理画面トップにアクセスできるか()
    {
        $response = $this->actingAs($this->user)->get(route('dashboard.top'));

        $response->assertStatus(200)
            ->assertViewIs('dashboard.top');
    }

    /**
     * @test
     */
    public function 店舗情報を全件取得()
    {
        $this->seed();

        $result = $this->service->getAll();
        $this->assertSame(3, $result->count());
    }
}
