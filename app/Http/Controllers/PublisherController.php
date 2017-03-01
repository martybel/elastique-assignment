<?php
/*
 * @author: petereussen
 * @package: elastique-assessment
 */

namespace App\Http\Controllers;


use App\Models\Publisher;

class PublisherController extends Controller
{

  public function all()
  {
    return Publisher::all();
  }

  public function detail($uid)
  {
    $publisher = Publisher::getByUUID($uid);

    if ( $publisher ) {
      return $publisher;
    }
    return response('',404);
  }
}