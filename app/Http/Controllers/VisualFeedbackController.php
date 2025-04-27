<?php

namespace App\Http\Controllers;

use App\Model;
use HtmlValidator\Exception\ServerException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Symfony\Component\Routing\Exception\InvalidParameterException;

class VisualFeedbackController extends Controller
{
  public function __construct()
  {
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  private function viewIndex($addeData = [])
  {
    $data = [
      'flashMessages' => $addeData['flashMessages'] ?? [],
    ];

    return view('visualfeedback.index', $data, $addeData);
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index(\Illuminate\Http\Request $request, $key = null)
  {
    if (!$key) {
      throw new InvalidParameterException('key is invalid.');
    }

    $feedback = Model\Feedback::where('key', $key)->get();
    return $this->viewIndex([
      'feedback' => $feedback ?: [],
      'images' => $feedback->feedbackImages,
    ]);
  }

  public function show(\Illuminate\Http\Request $request, $key)
  {
    $feedback = Model\Feedback::with('feedbackImage.feedbackComment')
      ->where('key', $key)->first();
    if (!$feedback) {
      throw new InvalidParameterException('key is invalid.');
    }

    return $this->viewIndex([
      'feedbackImages' => json_encode($feedback),
    ]);

  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function store()
  {
    $msg = $this->update();

    return $this->viewIndex([
      'flashMessages' => [$msg]
    ]);
  }

  /**
   * @return Model\ResultMessage
   * @throws \Exception
   */
  protected function update()
  {
  }

}
