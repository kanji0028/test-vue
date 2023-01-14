<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Item;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
      'customer_id',
      'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // 多対多の中間テーブル用リレーション
    public function items()
    {
        return $this->belongsToMany(Item::class)
        ->withPivot('quantity');
    }
}
