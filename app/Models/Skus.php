<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Skus
 *
 * @property int $id
 * @property string $title
 * @property int $weight
 * @property int $skus_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SkusCategory|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|Skus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skus query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skus whereSkusCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skus whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skus whereWeight($value)
 * @mixin \Eloquent
 */
class Skus extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title',
    'weight',
  ];

  public function category (): HasOne
  {
    return $this->hasOne(SkusCategory::class, 'id', 'skus_category_id');
  }
}
