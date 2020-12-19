<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use HasFactory;
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title',
    'description',
    'on_sale',
    'on_new',
    'on_top',
    'sold_count',
    'price',
    'price_sale',
    'weight',
    'meta'
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'on_sale' => 'boolean',
    'on_new' => 'boolean',
    'on_top' => 'boolean',
    'meta' => 'object',
  ];

//  protected $with  = ['photos', 'promotions', 'skus'];

  protected $dates = ['deleted_at'];

  /**
   * The model's default values for attributes.
   *
   * @var array
   */
  protected $attributes = [
    'meta' => '{
      "description": "",
      "title": ""
    }'
  ];

  public function getAvatar (): string
  {
    if (count($this->photos) > 0) {
      return asset('storage/products/' . $this->photos[0]->name);
    } else {
      return asset('images/person.png');
    }
  }

  public function available (): bool
  {
    $counter = 0;
    foreach ($this->skus as $sku) {
      $counter += $sku->stock;
    }
    return (boolean) $counter > 0;
  }

  public function categories(): BelongsToMany
  {
    return $this->belongsToMany(Category::class, 'products_categories', 'product_id', 'category_id');
  }

  public function brands(): BelongsToMany
  {
    return $this->belongsToMany(Brand::class, 'products_brands', 'product_id', 'brand_id');
  }

  public function photos(): HasMany
  {
    return $this->hasMany(Photo::class, 'product_id', 'id');
  }

}
