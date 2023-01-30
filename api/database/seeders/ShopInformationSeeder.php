<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ShopInformation;
use Illuminate\Database\Seeder;

class ShopInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'shop_name' => '武虎家',
                'latitude' => '35.53629411677219',
                'longitude' => '139.63507570516012',
            ],
            [
                'shop_name' => '綱島商店',
                'latitude' => '35.536398304027934',
                'longitude' => '139.63450166277272'
            ],
            [
                'shop_name' => '武虎家',
                'latitude' => '35.53632388457471',
                'longitude' => '139.6341006772446',
            ],
        ];

        foreach ($datas as $data) {
            ShopInformation::create($data);
        }
    }
}