<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Subtotal;

class Order extends Model
{
    use HasFactory;

    // リレーション先のデータ（ユーザー）も削除
    public static function booted()
    {
        static::addGlobalScope(new Subtotal);
    }
}