<?php


namespace App\Services;


use App\Models\Order;
use App\Models\User;

class OrderService
{
  public function store(User $user, array $items, string $method_pay, array $transfer, string $price, string $sale)
  {

    return \DB::transaction(function () use ($user, $items, $method_pay, $transfer, $price, $sale) {

      $order   = new Order([
        'address'      => [
          'address'       => $user->full_Address,
          'contact_name'  => $user->name,
          'contact_phone' => $user->phone,
        ],
        'price' => $price,
        'transfer' => $transfer['name'],
        'payment_method' => $method_pay,
        'ship_price' => $transfer['price'],
        'sale' => $sale,
        'ship_status' => $method_pay === Order::PAYMENT_METHODS_CARD ? Order::SHIP_STATUS_PAID : Order::SHIP_STATUS_PENDING
      ]);
      $order->user()->associate($user);
      $order->save();

      foreach ($items as $item) {
        $orderItem = $order->items()->make([
          'price' => $item['on_sale'] ? $item['price_sale'] : $item['price'],
          'amount' => $item['item']['amount']
        ]);
        $orderItem->product()->associate($item['id']);
        $orderItem->skus()->associate($item['skus']['skus']['id']);
        $orderItem->save();
      }

      return $order;
    });
  }
}
