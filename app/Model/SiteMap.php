<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SiteMap extends Model
{
  protected $guarded = ['id'];
  public $table = 'site_maps';

  public static function generateKey($id)
  {
    return hash('sha256', hash('md5', $id));
  }
}
