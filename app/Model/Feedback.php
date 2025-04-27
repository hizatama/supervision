<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
  protected $guarded = ['id'];
  protected $table = 'feedback';

  public function feedbackImage()
  {
    return $this->hasMany('App\Model\FeedbackImage');
  }
}
