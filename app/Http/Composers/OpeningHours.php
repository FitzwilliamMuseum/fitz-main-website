<?php
namespace App\Http\Composers;

use App\Models\VisitUsComponents;
use Illuminate\Contracts\View\View;

class OpeningHours
{
  private $message;

  public function __construct() {
    $this->message = VisitUsComponents::find(3)['data'][0]['text'];
  }

  public function compose(View $view) {
    $view->with('openingMessage', $this->message );
  }

}
