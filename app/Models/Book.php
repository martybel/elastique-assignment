<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Book extends Model
{
  use UuidTrait, Searchable;

  protected $uuids  = ['uuid'];
  protected $guarded = ['uuid', 'id'];
  protected $hidden  = ['id','created_at','updated_at', 'publisher_id', 'author_id'];

  protected $appends  = ['author','publisher'];
  protected $fillable = [
    'title',
    'description',
    'coverurl',
    'isbn',
    'publisher_id',
    'author_id'
  ];

  public function getAuthorAttribute()
  {
    return $this->author()->first();
  }

  public function getPublisherAttribute()
  {
    return $this->publisher()->first();
  }

  public function author()
  {
    return $this->belongsTo('App\\Models\\Author');
  }

  public function publisher()
  {
    return $this->belongsTo('App\\Models\\Publisher');
  }

}
