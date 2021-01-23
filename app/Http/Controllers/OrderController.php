<?php
/*
 * Copyright (c) 2021. Данный файл является интелектуальной собственостью Fulliton.
 * Я буду рад если вы будите вносить улучшения, всегда жду ваших пул реквестов
 */

namespace App\Http\Controllers;


use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\CreateOrderNotification;
use App\Notifications\RegisterPassword;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Swift_TransportException;

class OrderController extends Controller
{

  protected OrderService $orderService;

  public function __construct(OrderService $orderService)
  {
    $this->orderService = $orderService;
  }

  public function index ()
  {
    return view('user.order.index');
  }

  public function create ()
  {
    $cash = Setting::whereName('cash')->first();
    $cloudPayment = Setting::whereName('cloudPayment')->first();
    return view('user.order.create', compact('cash', 'cloudPayment'));
  }

  public function store (OrderStoreRequest $request)
  {
    $data = $request->all();
    $info = $data['info'];
    $user = User::firstOrNew(['email' =>  $info['email']]);

    $user->phone = $info['phone'];
    $user->post_code = $info['post_code'];
    $user->name = $info['name'];
    $user->address = $info['address'];
    $user->phone = $info['phone'];

    if (!$user->created_at) {
      $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
      $password = substr($random, 0, 10);
      $user->password = Hash::make($password);
      $user->save();
      try {
        $user->notify(new RegisterPassword($user->email, $password));
      } catch (Swift_TransportException $e) {

      }
    } else
      $user->save();

    $order = $this->orderService
      ->store(
        $user,
        $data['items'],
        $data['method_pay'],
        $data['transfer'],
        $data['price'],
        $data['sale']
      );

    $user->notify(new CreateOrderNotification($order));

    return response()->json([
      'order' => $order,
      'user' => $user,
      'status' => 'success',
    ]);
  }

}
