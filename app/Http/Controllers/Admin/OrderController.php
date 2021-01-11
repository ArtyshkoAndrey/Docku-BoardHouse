<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Notifications\ChangeOrderUser;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Swift_TransportException;

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
    $name = $request->get('user_name');
    $email = $request->get('user_email');
    $type = $request->get('type');
    $no = $request->get('no');
    $orders = Order::query();
    if ($type) {
      foreach (Order::SHIP_STATUS_MAP as $status) {
        if ($status === $type)
          $orders = $orders->whereShipStatus($status);
      }
    }
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
      'no'          => $no,
      'type'        => $type
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
   * @return RedirectResponse
   */
  public function update(Request $request, Order $order): RedirectResponse
  {
    $request->validate([
      'ship_status' => 'required|string'
    ]);
    $data = $request->all();
    if (!in_array($data['ship_status'], Order::SHIP_STATUS_MAP)) {
      return redirect()->back()->withInput($data)->withErrors('Не правильно выбран статус');
    }

    $order->ship_status = $data['ship_status'];
    if (isset($data['track'])) {
      $order->ship_data = (object) ['track' => $data['track']];
    } else {
      $order->ship_data = (object) [];
    }

    $order->save();
    try {
      $order->user->notify(new ChangeOrderUser($order));
    } catch (Swift_TransportException $exception) {
      $errors = $exception->getMessage();
    }


    return redirect()->route('admin.order.edit', $order)->with('success', ['Заказ успешно обновлён'])->withErrors($errors ?? null);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Order $order
   * @return RedirectResponse
   * @throws Exception
   */
  public function destroy(Order $order): RedirectResponse
  {
    if ($order->delete()) {
      return redirect()->route('admin.order.index')->with('success',['Заказ был удалён']);
    }
    return redirect()->route('admin.order.index')->withErrors(['Ошибка при удалении, обратитесь к администратору']);
  }
}
