<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CartItems
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_sku_id
 * @property int $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CartItems newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItems newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItems query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItems whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItems whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItems whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItems whereProductSkuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItems whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItems whereUserId($value)
 * @mixin \Eloquent
 */
class CartItems extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'amount',
  ];
}
