<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CheckHistory extends Model
{
  protected $guarded = ['id'];
  public $table = 'check_history';
}
