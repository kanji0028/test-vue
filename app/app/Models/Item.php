<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'memo',
      'price',
      'is_selling',
    ];

    // 多対多の中間テーブル用リレーション
    public function purchases()
    {
        return $this->belongsToMany(Purchase::class)
        ->withPivot('quantity');
    }
}
