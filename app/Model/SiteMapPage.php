<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\SiteMapPage
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMapPage query()
 * @mixin \Eloquent
 */
class SiteMapPage extends Model
{
  protected $guarded = ['id'];
  protected $table = 'site_map_pages';

  public $errors = [];
  public $isChecked = false;
}
