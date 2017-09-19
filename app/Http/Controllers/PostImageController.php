<?php

namespace App\Http\Controllers;

use App\PostImage;
use App\Post;
use Illuminate\Http\Request;
use Image;
class PostImageController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $postImages= PostImage::latest()
      ->orderBy('id','desc')
      ->paginate(10);

         return view('postimages.index',compact('postImages'))

             ->with('i', ($request->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postimages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      PostImage::create($request->all());
        $id = $request->get('post_id');
      $post = Post::find($id);

        return redirect()->route('posts.edit',compact('post'))

                        ->with('success','Imagem inserida com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostImage  $postImage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $postimage= PostImage::find($id);

      return view('postimages.edit',compact('postimage'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostImage  $postImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if($request->hasFile('avatar')){

          $avatar = $request->file('avatar');
          $filename = time() . '.' . $avatar->getClientOriginalExtension();
          Image::make($avatar)->save(public_path('/uploads/postimages/' . $filename, 100));
          $p= PostImage::find($id);
          if($p->avatar != NULL && $p->avatar != 'default.jpg' ){
          unlink(public_path('/uploads/postimages/') . $p->avatar);
          $p->avatar = $filename;
          $p->save();
          }
          else{
            $p->avatar = $filename;
            $p->save();

          }
          $postId = $request->get('post_id');
          $post = Post::find($postId);


                  return redirect()->route('posts.edit',compact('post'))

                                  ->with('success','Cadastro editado com sucesso');


      }
      else{
        $postId = $request->get('post_id');
        $post = Post::find($postId);
      PostImage::find($id)->update($request->all());

      return redirect()->route('posts.edit',compact('post'))

                      ->with('success','Cadastro editado com sucesso');

      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostImage  $postImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $postImage = PostImage::find($id);
      if($postImage->avatar != NULL && $postImage->avatar != 'default.jpg' ){
      unlink(public_path('/uploads/postimages/') . $postImage->avatar);
      }
      $postImage -> delete();


        return redirect()->route('postimages.index')

                        ->with('success','Cadastro deletado com sucesso!');
    }
}
