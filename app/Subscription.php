<?php

namespace App;
use App\Client;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['title','description', 'price', 'avatar'];

    public function clientes()
    {
        return $this->hasMany('App\Client');
    }

    protected static function boot() {
      parent::boot();

      static::deleting(function($subscription) { // before delete() method call this
           $subscription->clientes()->delete();
           // do the rest of the cleanup...
      });
  }
}
