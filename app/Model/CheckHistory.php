<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\CheckHistory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistory query()
 * @mixin \Eloquent
 */
class CheckHistory extends Model
{
  protected $guarded = ['id'];
  protected $table = 'check_history';
}
