<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_id',
        'genre_id',
        'outline',
        'image_url'
    ];

    //エリアテーブルとのリレーション
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function favorite()
    {
        return $this->belongsTo(Favorite::class);
    }

    public function shop_owner()
    {
        return $this->belongsTo(Shop_owner::class);
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
