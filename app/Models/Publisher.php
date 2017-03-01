<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use UuidTrait;

    protected $hidden   = ['id','created_at','updated_at'];
    protected $uuids   = ['uuid'];
    protected $guarded = ['uuid'];

    protected $fillable = [
      'name'
    ];

    public function books()
    {
      return $this->hasMany('App\\Models\\Book');
    }
}
