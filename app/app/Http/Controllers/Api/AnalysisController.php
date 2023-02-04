<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
  public function index(Request $request) {

    $subQuery = Order::betweenDate($request->startDate, $request->endDate);

    if($request->type === 'perDay') {
      $subQuery->where('status', true)
      ->groupBy('id')
      ->selectRaw('id, sum(subtotal) as totalPerPurchase,
      DATE_FORMAT(created_at, "%Y%m%d") as date');

      $date = DB::table($subQuery)->groupBy('id')
      ->selectRaw('date, sum(totalPerPurchase) as total')
      ->get();

    }

    //Ajax通信なのでJsonで返却する必要がある
    return response()->json([
      'date' => $date,
      'type' => $request->type
    ], Response::HTTP_OK);
  }
}
