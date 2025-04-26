<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ResultMessage
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResultMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResultMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResultMessage query()
 * @mixin \Eloquent
 */
class ResultMessage extends Model
{
    public $key;
    public $message;
    public $type;
}
