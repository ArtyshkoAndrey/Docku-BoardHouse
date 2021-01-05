<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\HasItemsInCart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
* Class NotifyWhenItemsCart для уведомления пользователя об товарах в корзине, напоминие о том что он был на сайте. Раз в сутки
* @package App\Jobs
*/
class NotifyWhenItemsCart implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  protected array $items;
  protected User $user;

  /**
   * Create a new job instance.
   *
   * @param array $items
   * @param User $user
   */
  public function __construct(array $items, User $user)
  {
    $this->items = $items;
    $this->user = $user;
    $this->delay(now()->addDays(env('DELAY_CART_NOTIFY')));
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    if ($this->user->cartItems->toArray() === $this->items) {
      $this->user->notify(new HasItemsInCart($this->user->cartItems));
    }
  }
}
