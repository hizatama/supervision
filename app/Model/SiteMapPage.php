<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SiteMapPage extends Model
{
  protected $guarded = ['id'];
  public $table = 'site_map_pages';

  public $errors = [];
}
