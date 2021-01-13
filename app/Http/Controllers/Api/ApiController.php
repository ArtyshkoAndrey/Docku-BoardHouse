<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use Validator;

class ApiController extends Controller
{

  public function currency (int $id): \Illuminate\Http\JsonResponse
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

}
