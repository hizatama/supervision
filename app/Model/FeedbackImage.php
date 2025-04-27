<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeedbackImage extends Model
{
  protected $guarded = ['id'];
  protected $table = 'feedback_image';

  public function feedback()
  {
    return $this->belongsTo('App\Model\Feedback');
  }

  public function feedbackComment()
  {
    return $this->hasMany('App\Model\FeedbackComment');
  }
}
