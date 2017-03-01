<?php
/*
 * @author: petereussen
 * @package: elastique-assessment
 */

namespace App\Http\Controllers;


use App\Models\Book;

class BookController extends Controller
{

  public function highlighted()
  {
    return Book::all();
  }

  public function search($term,$limit = 1000, $offset = 0)
  {
    $result = Book::search($term)->paginate($limit,'page',$offset);

    return [
      'books' => $result->items(),
      'offset'=> $result->currentPage(),
      'limit' => $result->perPage(),
      'total' => $result->total()
    ];
  }

  public function detail($uid)
  {
    $book = Book::getByUUID($uid);

    if ( $book ) {
      return $book;
    }
    return response('',404);
  }

}