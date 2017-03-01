<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  use UuidTrait;

  protected $uuids  = ['uuid'];

  protected $hidden   = ['id','created_at','updated_at'];
  protected $fillable = [
    'firstname',
    'lastname',
  ];

  protected $guarded = ['uuid','id'];

  public function books()
  {
    return $this->hasMany('App\\Models\\Book');
  }
}
