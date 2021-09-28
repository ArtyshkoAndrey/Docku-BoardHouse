<?php

namespace App\Http\Controllers;

use Cache;
use App\Models\Category;
use App\Models\Product;
use App\Services\InstagramPosts;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class HomeController extends Controller
{
  /**
   * @return View
   */
  public function index () :View
  {

    $categories = Category::whereToMenu(true)->get();
    $newProducts = Product::whereOnNew(true)
      ->orderByDesc('id')
      ->take(4)
      ->get();
    $hitProducts = Product::whereOnTop(true)
      ->orderByDesc('id')
      ->take(4)
      ->get();
    $instagramService = new InstagramPosts();
    $posts = $instagramService->posts;
    return view('user.index', compact('categories', 'newProducts', 'hitProducts', 'posts'));
  }

  /**
   * @return View
   */
  public function policy () :View
  {
    return view('user.page.policy');
  }

  /**
   * @return View
   */
  public function payment () :View
  {
    return view('user.page.payment');
  }
}
