<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skus;
use App\Models\SkusCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class SkusController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View|Response
   */
  public function index()
  {
    $skus_categories = SkusCategory::with('skuses')->get();
    return view('admin.skus.index', compact('skus_categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return Application|RedirectResponse|Response|Redirector
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|string',
      'sk'  => 'required|exists:skus_categories,id',
      'weight' => 'required|unique:skuses,weight,null,id,skus_category_id,'.$request->sk
    ]);

    $skus = new Skus($request->all());
    $sk = SkusCategory::find($request->sk);
    $sk->skuses()->save($skus);

    return redirect('admin/skus#modal-skus-' . $sk->id)->with('success', ['Размер успешно создан']);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param Skus $skus
   * @return Response
   */
  public function edit(Skus $skus)
  {
    dd($skus);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      //
  }
}
