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
  private const PREFIX = 'OIJFA_';

  public static function generateKey(string|int $id): string
  {
    return hash('sha256', hash('md5', self::PREFIX . $id));
  }

  public function isTargetBrowser(string $str): bool
  {
    return $this->browser_list && in_array($str, explode(',', $this->browser_list));
  }
}
