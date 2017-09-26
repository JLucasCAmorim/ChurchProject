<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\PostImage;
use Image;
use Illuminate\Support\Facades\DB;
class PostController extends Controller

{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index(Request $request)

    {

        $posts= Post::latest()
        ->orderBy('id','desc')
        ->paginate(10);

        return view('posts.index',compact('posts'))

            ->with('i', ($request->input('page', 1) - 1) * 10);

    }

    public function create()

    {

        return view('posts.create');

    }

    public function store(Request $request)

    {

        $this->validate($request, [

            'title' => 'required',

            'content' => 'required',

            'category' => 'required',

        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')

                        ->with('success','Post criado com sucesso');

    }

    public function show($id)

    {

        $post= Post::find($id);

        return view('posts.show',compact('post'));

    }

    public function edit($id)

    {

        $post= Post::find($id);
        $postimages = DB::table('post_images')
        ->where('post_id', '=', $id)->get();


        return view('posts.edit',compact('post', 'postimages'));

    }

    public function update(Request $request, $id)

    {

        $this->validate($request, [

            'title' => 'required',

            'content' => 'required',

            'category' => 'required',

        ]);

          Post::find($id)->update($request->all());

          return redirect()->route('posts.index')

                          ->with('success','Post editado com sucesso!');


    }


    public function destroy($id)

    {

      $post = Post::find($id);
      $postimages = DB::table('post_images')
      ->where('post_id', '=', $id)->get();
      foreach ($postimages as $postimage) {
        unlink(public_path('/uploads/postimages/') . $postimage->avatar);
      }

      $post -> delete();


        return redirect()->route('posts.index')

                        ->with('success','Post deletado com sucesso!');

    }

}
