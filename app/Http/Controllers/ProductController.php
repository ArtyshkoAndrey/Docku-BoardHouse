<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
}
