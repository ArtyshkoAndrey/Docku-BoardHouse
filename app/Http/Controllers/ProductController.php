<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{

  public function search (Request $request) {
    $q = $request->get('q', null);
    if ($q) {
      $products = Product::where('title', 'like', '%' . $q . '%')->get();
      return view ('user.product.search', compact('products'));
    } else  {
      return redirect()->back()->withErrors(['Поле поиск не может быть пустым']);
    }
  }


  /**
   * Показ товаров по фильтру
   *
   * @param Request $request
   * @return Application|Factory|View
   */
  public function all (Request $request)
  {
    $items = Product::query();
    $order = $request->input('order', 'sort-new');

    $sale = $request->get('sale', false);
    if($sale) {
      $items = $items->whereOnSale(true);
    }
    if ($order) {
      if ($order === 'sort-new') {
        $items = $items->orderBy('created_at', 'desc');
      } else if ($order === 'sort-old') {
        $items = $items->orderBy('created_at');
      } else if ($order === 'sort-expensive') {
        $items = $items->orderBy('price', 'desc');
      } else if ($order === 'sort-cheap') {
        $items = $items->orderBy('price');
      }
    }

    if ($categoryArr = $request->input('category', [])) {
      !is_array($categoryArr) ? $categoryArr = [$categoryArr] : null;
      foreach ($categoryArr as $index => $category) {
        if ($index == 0) {
          $items = $items->whereHas('category', function ($query) use ($category) {
            return $query->where('categories.id', '=', $category);
          });
        } else {
          $items = $items->orWhereHas('category', function ($query) use ($category) {
            return $query->where('categories.id', '=', $category);
          });
        }
      }
    }

    if ($brandArr = $request->input('brand', [])) {
      !is_array($brandArr) ? $brandArr = [$brandArr] : null;
      foreach ($brandArr as $index => $brand) {
        if ($index == 0) {
          $items = $items->whereHas('brand', function ($query) use ($brand) {
            return $query->where('brands.id', '=', $brand);
          });
        } else {
          $items = $items->orWhereHas('brand', function ($query) use ($brand) {
            return $query->where('brands.id', '=', $brand);
          });
        }
      }
    }

//    if ($sizeArr = $request->input('skus', [])) {
//      !is_array($sizeArr) ? $sizeArr = [$sizeArr] : null;
//      foreach ($sizeArr as $index => $size) {
//        if ($index == 0) {
//          $items = $items->whereHas('skus', function ($query) use ($size) {
//            return $query->where('id', '=', $size);
//          });
//        } else {
//          $items = $items->orWhereHas('skus', function ($query) use ($size) {
//            return $query->where('id', '=', $size);
//          });
//        }
//      }
//    }

    $itemsCount = $items->count();
    $items = $items->paginate(15);
    $filter = [
      'category' => $categoryArr,
      'order' => $order,
      'brand' => $brandArr
      'sale'  => $sale,
    ];
    return view('user.product.catalog', compact('items', 'filter', 'itemsCount'));
  }

  /**
   * @param int $id
   * @return View
   */
  public function show (int $id): View
  {
    $product = Product::find($id);
    $childCategory = $product->category()->first();
    $categories = [];
    while($category = $childCategory->parents()->first()) {
      array_unshift($categories, $category);
      $childCategory = $category;
    }
    array_push($categories, $product->category()->first());
    return view('user.product.show', compact('product', 'categories'));
  }
}
