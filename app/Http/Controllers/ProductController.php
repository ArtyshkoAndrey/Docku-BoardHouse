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


    $items = $items->paginate(15);
    $filter = [
      'category' => $categoryArr,
      'order' => $order
    ];
    return view('user.product.catalog', compact('items', 'filter'));
  }
}
