<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeedbackComment extends Model
{
  protected $guarded = ['id'];
  protected $table = 'feedback_comment';

  public function feedbackImage()
  {
    return $this->belongsTo('App\Model\FeedbackImage');
  }
}
