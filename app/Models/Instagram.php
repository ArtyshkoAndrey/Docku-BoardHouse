<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Instagram
 *
 * @property int         $id
 * @property string      $key
 * @property array|null  $posts
 * @property Carbon      $key_update
 * @property Carbon|null $posts_update
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Instagram newModelQuery()
 * @method static Builder|Instagram newQuery()
 * @method static Builder|Instagram query()
 * @method static Builder|Instagram whereCreatedAt($value)
 * @method static Builder|Instagram whereId($value)
 * @method static Builder|Instagram whereKey($value)
 * @method static Builder|Instagram whereKeyUpdate($value)
 * @method static Builder|Instagram wherePosts($value)
 * @method static Builder|Instagram whereUpdatedAt($value)
 * @mixin Eloquent
 * @method static Builder|Instagram wherePostsUpdate($value)
 */
class Instagram extends Model
{

  use HasFactory;

  protected $fillable = ['key', 'posts', 'key_update', 'posts_update'];

  protected $casts = ['key_update' => 'date', 'posts' => 'array', 'posts_update' => 'date'];
}
