<?php
namespace App;
use App\PostImage;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    protected $fillable = ['title','content', 'avatar', 'category'];

    public function images()
    {
        return $this->hasMany('App\PostImage');
    }

    protected static function boot() {
      parent::boot();

      static::deleting(function($post) { // before delete() method call this
           $post->images()->delete();
           // do the rest of the cleanup...
      });
  }
}
