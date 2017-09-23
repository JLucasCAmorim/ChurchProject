<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nome','igreja', 'polo', 'liderPolo', 'cidade',
    'whatsapp', 'responsavel', 'email', 'idade', 'pastor', 'liderjuventude',
    'estado', 'necessidade', 'subscription_id'];

    public function subscription()
     {
         return $this->belongsTo('App\Subscription');
     }
}
