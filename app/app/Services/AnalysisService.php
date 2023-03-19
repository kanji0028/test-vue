<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;

class AnalysisService {

  public static function perDay($subQuery) {
    $query = $subQuery->where('status', true)
    ->groupBy('id')
    ->selectRaw('id, sum(subtotal) as totalPerPurchase,
    DATE_FORMAT(created_at, "%Y%m%d") as date');

    $data = DB::table($query)
    ->groupBy('id')
    ->selectRaw('date, sum(totalPerPurchase) as total')
    ->get();

    $labels = $data->pluck('date');
    $totals = $data->pluck('total');

    // 複数の変数を渡すので一旦配列に入れる
    return [$data, $labels, $totals];

  }
}