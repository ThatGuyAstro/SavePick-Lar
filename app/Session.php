<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
  protected $fillable = [
      'id', 'user_id', 'session_id', 'session_password',
      'status', 'partner',
  ];


  protected $hidden = [

      'session_password',

  ];
}
