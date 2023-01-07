<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
  public function index(Request $request)
  {

    return Inertia::render('Inertia/Index', [
      'blogs' => InertiaTest::all()
    ]);
  }

  public function create()
  {
    return Inertia::render('Inertia/Create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => ['required', 'max:20'],
      'content' => ['required', 'string'],
    ]);

    // 読み込んだモデルをインスタンス化している状態
    $inertiaTest = new InertiaTest;
    $inertiaTest->title = $request->title;
    $inertiaTest->content = $request->content;
    $inertiaTest->save();

    return to_route('inertia.index')->with(['message' => '登録しました']);
  }

  public function show($id)
  {
    return Inertia::render('Inertia/Show', [
      'id' => $id,
      'blog' => InertiaTest::findOrFail($id)
    ]);
  }

  public function delete($id)
  {
    $blog = InertiaTest::findOrFail($id);
    $blog->delete();

    return to_route('inertia.index')->with(['message' => '削除しました']);
  }

}
