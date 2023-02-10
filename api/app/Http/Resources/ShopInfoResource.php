<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonSerializable;

class ShopInfoResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'shop_name'  => $this->shop_name,
            'latlong'    => $this->latlong,
            'prefecture' => $this->prefecture,
            'city_name'  => $this->city_name,
            'address'    => $this->address
        ];
    }
}
