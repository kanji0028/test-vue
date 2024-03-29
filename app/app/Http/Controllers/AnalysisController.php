<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
  public function index()
  {
    $startDate = '2022-08-01';
    $endDate = '2022-08-31';

    $subQuery = Order::betweenDate($startDate, $endDate)
    ->where('status', true)
    ->groupBy('id')
    ->selectRaw('id, sum(subtotal) as totalPerPurchase,
    DATE_FORMAT(created_at, "%Y%m%d") as date');

    $date = DB::table($subQuery)->groupBy('id')
    ->selectRaw('date, sum(totalPerPurchase) as total')
    ->get();

    // dd($date);


    return Inertia::render('Analysis');
  }
}
