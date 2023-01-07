<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
  public function index(Request $request)
  {
    return Inertia::render('Inertia/Index');
  }

  public function create()
  {
    return Inertia::render('Inertia/Create');
  }

  public function store(Request $request)
  {
    // 読み込んだモデルをインスタンス化している状態
    $inertiaTest = new InertiaTest;
    $inertiaTest->title = $request->title;
    $inertiaTest->content = $request->content;
    $inertiaTest->save();

    return to_route('inertia.index');
  }
}
