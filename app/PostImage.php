<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
  public $fillable = ['avatar', 'post_id'];
}
