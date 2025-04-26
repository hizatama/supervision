<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\SiteMap
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SiteMap query()
 * @mixin \Eloquent
 */
class SiteMap extends Model
{
  protected $guarded = ['id'];
  protected $table = 'site_maps';
}
