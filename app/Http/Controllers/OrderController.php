<?php
/*
 * Copyright (c) 2021. Данный файл является интелектуальной собственостью Fulliton.
 * Я буду рад если вы будите вносить улучшения, всегда жду ваших пул реквестов
 */

namespace App\Http\Controllers;


use App\Models\Setting;

class OrderController extends Controller
{

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

}
