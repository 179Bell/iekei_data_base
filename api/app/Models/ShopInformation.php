<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_name',
        'latlong',
        'prefecture',
        'city_name',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
