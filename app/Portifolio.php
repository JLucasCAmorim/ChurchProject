<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portifolio extends Model
{
   public $fillable = ['name'];

   public function portifolioImages()
   {
       return $this->hasMany('App\PortifolioPhoto');
   }

   protected static function boot() {
     parent::boot();

     static::deleting(function($portifolio) { // before delete() method call this
          $portifolio->portifolioImages()->delete();
          // do the rest of the cleanup...
     });
 }
}
