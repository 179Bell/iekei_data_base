<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopInfoServiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = $this->app->make('\App\Http\Services\ShopInfoService');
        $this->artisan('db:seed', ['--class' => 'UserSeeder']);
        $this->user = User::find(1);
    }

    /**
     * @test
     */
    public function 管理者は管理画面トップにアクセスできるか()
    {
        $response = $this->actingAs($this->user)->get(route('dashboard'));

        $response->assertStatus(200)
            ->assertViewIs('dashboard.top');
    }

    /**
     * @test
     */
    public function 店舗情報を全件取得()
    {
        $this->artisan('db:seed', ['--class' => 'ShopInformationSeeder']);

        $result = $this->service->getAll();
        $this->assertSame(3, count($result));
    }
}
