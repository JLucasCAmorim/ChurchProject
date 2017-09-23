<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortifolioPhoto extends Model
{
   public $fillable = ['portifolio_id','avatar'];

   public function portifolio()
    {
        return $this->belongsTo('App\Portifolio');
    }
}
