<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'date',
        'time',
        'number'
    ];

    public function shop()
    {
        return $this->hasMany(Shop::class, 'shop_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
