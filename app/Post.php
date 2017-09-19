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
}
