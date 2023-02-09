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
                'latlong' => '35.53630702628978, 139.6350802676341',
                'prefecture' => '神奈川県',
                'city_name' => '横浜市港北区',
                'address' => '綱島東1-6-24'
            ],
            [
                'shop_name' => '綱島商店',
                'latlong' => '35.536398304027934, 139.63450166277272',
                'prefecture' => '神奈川県',
                'city_name' => '横浜市港北区',
                'address' => '綱島西1-29-29'
            ],
            [
                'shop_name' => '麺場 寺井',
                'latlong' => '35.53632388457471, 139.6341006772446',
                'prefecture' => '神奈川県',
                'city_name' => '横浜市港北区',
                'address' => '綱島西1-1-5'
            ],
        ];

        foreach ($datas as $data) {
            ShopInformation::create($data);
        }
    }
}
