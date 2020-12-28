<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View|Response
   */
  public function index(Request $request): View
  {
    $name = $request->get('name', null);
    $products = Product::query()->withTrashed();
    if ($name) {
      $products = $products->where('title', 'like', '%' . $name . '%');
    }
    $products = $products->paginate(10);
    $filter = ['name' => $name];
    return view('admin.product.index', compact('products', 'filter'));
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
   * @param  \Illuminate\Http\Request  $request
   * @return Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Admin\ProductController  $productController
   * @return Response
   */
  public function show(ProductController $productController)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param Product $product
   * @return Application|Factory|View|Response
   */
  public function edit(Product $product)
  {
    return view('admin.product.edit', compact('product'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Admin\ProductController  $productController
   * @return Response
   */
  public function update(Request $request, ProductController $productController)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Admin\ProductController  $productController
   * @return Response
   */
  public function destroy(ProductController $productController)
  {
      //
  }
}
