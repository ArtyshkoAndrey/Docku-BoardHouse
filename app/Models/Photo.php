<?php

namespace App\Models;

use App\Observers\PhotoObserver;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Photo
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Photo newModelQuery()
 * @method static Builder|Photo newQuery()
 * @method static Builder|Photo query()
 * @method static Builder|Photo whereCreatedAt($value)
 * @method static Builder|Photo whereId($value)
 * @method static Builder|Photo whereName($value)
 * @method static Builder|Photo whereProductId($value)
 * @method static Builder|Photo whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Photo extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
  ];

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class, 'product_id', 'id')->withTrashed();
  }

  public function getUrlWebp(): string
  {
    return asset('storage/images/photos/' . $this->name  . '.webp');
  }

  public function getThumbnailUrlWebp(): string
  {
    return asset('storage/images/thumbnails/' . $this->name  . '.webp');
  }

  public function getUrlPng(): string
  {
    return asset('storage/images/photos/' . $this->name  . '.png');
  }

  public function getThumbnailUrlJpg(): string
  {
    return asset('storage/images/thumbnails/' . $this->name . '.png');
  }

}
