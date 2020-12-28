<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use \Illuminate\Http\Request;

class ApiController extends Controller {
  public function countries (Request $request): JsonResponse
  {
    if ($name = $request->get('name', null)) {
      $countries = Country::where('name', 'like', '%'.$name.'%')->limit(5)->get();
      return response()->json(['countries'=> $countries], 200);
    }
    return response()->json(['countries' => []], 200);
  }

  public function categories (Request $request): JsonResponse
  {
    if ($name = $request->get('name', null)) {
      $categories = Category::where('name', 'like', '%'.$name.'%')->limit(5)->get();
      return response()->json(['categories'=> $categories], 200);
    }
    return response()->json(['categories' => []], 200);
  }

  public function cities (Request $request): JsonResponse
  {
    if ($name = $request->get('name', null)) {
      $cities = City::where('name', 'like', '%'.$name.'%')->limit(5)->get();
      return response()->json(['cities'=> $cities], 200);
    }
    return response()->json(['cities' => []], 200);
  }

  public function brands (Request $request): JsonResponse
  {
    if ($name = $request->get('name', null)) {
      $brands = Brand::where('name', 'like', '%'.$name.'%')->limit(5)->get();
      return response()->json(['brands'=> $brands], 200);
    }
    return response()->json(['brands' => []], 200);
  }
}
