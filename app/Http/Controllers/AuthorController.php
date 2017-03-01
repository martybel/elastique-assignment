<?php
/*
 * @author: petereussen
 * @package: elastique-assessment
 */

namespace App\Http\Controllers;


use App\Models\Author;

class AuthorController extends Controller
{
  public function all()
  {
    return Author::all();
  }

  public function detail($uid)
  {
    $publisher = Author::getByUUID($uid);

    if ( $publisher ) {
      return $publisher;
    }
    return response('',404);
  }

}