<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\CheckHistoryDetail
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CheckHistoryDetail query()
 * @mixin \Eloquent
 */
class CheckHistoryDetail extends Model
{
  protected $guarded = ['id'];
  protected $table = 'check_history_detail';
}
