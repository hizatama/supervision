<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SiteMap extends Model
{
  protected $guarded = ['id'];
  public $table = 'site_maps';
  private const PREFIX = 'OIJFA_';

  /**
   * @param $id
   * @return string
   */
  public static function generateKey($id)
  {
    return hash('sha256', hash('md5', self::PREFIX . $id));
  }

  /**
   * @param $str
   * @return bool
   */
  public function isTargetBrowser($str) {
    return $this->browser_list && in_array($str, explode(',', $this->browser_list));
  }
}
