<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\CartItems;
use App\Models\Currency;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;

class ApiController extends Controller
{

  public function currency (int $id): JsonResponse
  {
    $validate = Validator::make(
      [
        'id' => $id
      ],
      [
        'id' => 'required|exists:currencies,id'
      ]
    );
    if ($validate->fails()) {
      return response()->json(['error' => $validate->errors()->first()], 500);
    }
    $currency = Currency::find($id);
    return response()->json($currency, 200);
  }

  /**
   * Set if isset user new currency in profile. Return new currency
   * @param Request $request
   * @return JsonResponse
   */
  public function set_currency (Request $request): JsonResponse
  {
    $request->validate([
      'currency_id' => 'required|exists:currencies,id',
      'user_id'     => 'present|int|exists:users,id|nullable'
    ]);

    $data = $request->all();
    $currency = Currency::find($data['currency_id']);

    if ($data['user_id'])
      User::find($data['user_id'])->update(['currency_id' => $data['currency_id']]);

    return response()->json($currency, 200);
  }

  public function products (Request $request): JsonResponse
  {
    $ids = $request->get('products_skuses_ids', []);
    $products = Product::with('photos', 'productSkuses.skus')->whereHas('productSkuses', function ($q) use ($ids) {
      $q->whereIn('id', $ids);
    })->get();

    return response()->json($products);
  }

  public function update_cart (Request $request)
  {
    $data = $request->all();

    CartItems::whereUserId($data['user_id'])->delete();
    foreach ($data['products_skuses'] as $ps) {
      CartItems::create(['user_id' => $data['user_id'], 'product_sku_id' => $ps['id'], 'amount' => $ps['amount']]);
    }
  }

  public function cart_items_auth (Request $request): JsonResponse
  {
    $cartItems = CartItems::whereUserId($request->get('user_id'))->get();
    return response()->json($cartItems);
  }
}
