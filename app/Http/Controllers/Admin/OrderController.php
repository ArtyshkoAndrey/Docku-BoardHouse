<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
  /**
   * Просмотр всех заказов, так же фильтрация.
   *
   * @param Request $request
   * @return Application|Factory|View|Response
   */
  public function index(Request $request)
  {
    $name = $request->get('user_name', null);
    $email = $request->get('user_email', null);
    $no = $request->get('no', null);
    $orders = Order::query();
    if ($no) {
      $orders = $orders->where('no', 'like', '%' . $no . '%');
    }
    if ($name) {
      $orders = $orders->whereHas('user', function ($q) use($name) {
        $q->where('name', 'like', '%' . $name . '%');
      });
    }
    if ($email) {
      $orders = $orders->whereHas('user', function ($q) use($email) {
        $q->where('email', 'like', '%' . $email . '%');
      });
    }
    $orders = $orders->paginate(10);

    $filter = [
      'user_name'   => $name,
      'user_email'  => $email,
      'no'          => $no
    ];
    $orders->appends($filter);
    return view('admin.order.index', compact('orders', 'filter'));
  }

  /**
   * Форма создания заказа
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
   * @return Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param Order $order
   * @return Response
   */
  public function show(Order $order)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param Order $order
   * @return Application|Factory|View|Response
   */
  public function edit(Order $order)
  {
    return view('admin.order.edit', compact('order'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param Order $order
   * @return Response
   */
  public function update(Request $request, Order $order)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Order $order
   * @return Response
   */
  public function destroy(Order $order)
  {
      //
  }
}
