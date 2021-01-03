<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Product;
use App\Services\PhotoService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param Request $request
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
   * @return Application|Factory|View|Response
   */
  public function create()
  {
    return view('admin.product.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return RedirectResponse
   */
  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'price' => 'required|integer|min:0',
      'weight' => 'required|min:0',
      'brand' => 'required|exists:brands,id',
      'category' => 'required|exists:categories,id',
      'meta_title' => 'required|string',
      'meta_description' => 'required|string',
      'description' => 'required|string',
      'on_sale' => 'boolean',
      'on_top' => 'boolean',
      'on_new' => 'boolean',
      'photos' => 'array',
    ]);
//    dd($request->all());
    $data = $request->all();
    $product = new Product($data);
    $product
      ->brand()
      ->associate($request->get('brand'));

    $product
      ->category()
      ->associate($request->get('category'));

    $product->save();

    foreach ($data['photos'] as $name) {
      Photo::whereName($name)->first()->product()->associate($product->id)->save();
    }

    return redirect()->route('admin.product.index')->with('success', ['Товар успешно создан']);
  }

  /**
   * Display the specified resource.
   *
   * @param Product $product
   * @return Response
   */
  public function show(Product $product)
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
   * @param Request $request
   * @param Product $product
   * @return RedirectResponse
   */
  public function update(Request $request, Product $product): RedirectResponse
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'price' => 'required|integer|min:0',
      'weight' => 'required|min:0',
      'brand' => 'required|exists:brands,id',
      'category' => 'required|exists:categories,id',
      'meta_title' => 'required|string',
      'meta_description' => 'required|string',
      'description' => 'required|string',
      'on_sale' => 'boolean',
      'on_top' => 'boolean',
      'on_new' => 'boolean',
    ]);

    $product->update($request->all());
    $product
      ->brand()
      ->associate($request->brand_id);

    $product
      ->category()
      ->associate($request->category_id);
    return redirect()->back()->with('success', ['Товар успешно обновлён']);
  }

  /**
   * Удаление или востановление товара.
   *
   * @param int $id
   * @return RedirectResponse
   */
  public function destroy(int $id): RedirectResponse
  {
    $product = Product::withTrashed()->find($id);
    if ($product->trashed()) {
      $product->restore();
      return redirect()->back()->with('success', ['Товар успешно востановлен']);
    } else {
      try {
        $product->delete();
        return redirect()->back()->with('success', ['Товар успешно удалён']);
      } catch (Exception $exception) {
        return redirect()->back()->withErrors($exception->getMessage());
      }
    }
  }

  public function photo(Request $request, $id) {

    $name = PhotoService::create($request->file('file'), 'storage/images/thumbnails', true, 30, 300);
    PhotoService::create($request->file('file'), 'storage/images/photos', true, 80, 800);
    $photo = new Photo(['name' => $name]);
    $photo->product()->associate($id);
    $photo->save();
    echo $name;
  }

  public function photoDelete(Request $request): JsonResponse
  {
    $request->validate([
      'name' => 'required|string'
    ]);
    try {
      $ph = Photo::where('name', explode('.' ,$request->name)[0])->first()->delete();
      return response()->json(['status' => 'success']);
    } catch (Exception $e) {
      return response()->json(['status' => 'error'], 500);
    }
  }

  public function photoStore(Request $request) {
    $name = PhotoService::create($request->file('file'), 'storage/images/thumbnails', true, 30, 300);
    PhotoService::create($request->file('file'), 'storage/images/photos', true, 80, 800);
    try {
      $photo = new Photo(['name' => $name]);
      $photo->product()->associate(null);
      $photo->save();
    } catch (Exception $exception) {
      PhotoService::delete($name);
      return response()->json($exception->getMessage(), 500);
    }
    return $name;
  }
}
