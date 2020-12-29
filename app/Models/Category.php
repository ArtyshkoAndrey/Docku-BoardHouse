<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property bool $to_menu
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereToMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'to_menu',
    'description'
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'to_menu' => 'boolean',
  ];
}
