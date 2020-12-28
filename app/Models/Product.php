<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property bool $on_sale
 * @property bool $on_new
 * @property bool $on_top
 * @property int $sold_count
 * @property string $price
 * @property string|null $price_sale
 * @property string $weight
 * @property object $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Brand[] $brands
 * @property-read int|null $brands_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Photo[] $photos
 * @property-read int|null $photos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductSkus[] $productSkuses
 * @property-read int|null $product_skuses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Skus[] $skuses
 * @property-read int|null $skuses_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOnNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOnSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOnTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePriceSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSoldCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 * @mixin \Eloquent
 */
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

  public function category(): BelongsToMany
  {
    return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
  }

  public function brand(): BelongsTo
  {
    return $this->belongsTo(Brand::class, 'brand_id', 'id');
  }

  public function photos(): HasMany
  {
    return $this->hasMany(Photo::class, 'product_id', 'id');
  }

  public function skuses(): BelongsToMany
  {
    return $this->belongsToMany(Skus::class, 'product_skuses', 'product_id', 'skus_id')->withPivot(['stock', 'id']);
  }

  public function productSkuses(): HasMany
  {
    return $this->hasMany(ProductSkus::class, 'product_id', 'id');
  }

  public function orders(): BelongsToMany
  {
    return $this->belongsToMany(Order::class, 'order_items', 'product_id', 'order_id')->withPivot(['amount']);
  }

  public function getThumbnail (): string
  {
    if ($this->photos->count() > 0) {
      return asset('storage/images/photos/' . $this->photos->first()->name);
    } else {
      return asset('images/product.jpg');
    }
  }
}
