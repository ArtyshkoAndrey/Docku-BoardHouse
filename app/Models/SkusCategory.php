<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SkusCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SkusCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SkusCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SkusCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SkusCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkusCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkusCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkusCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SkusCategory extends Model
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
}
