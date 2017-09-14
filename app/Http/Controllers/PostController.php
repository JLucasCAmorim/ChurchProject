<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Image;
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

        $posts= Post::latest()->paginate(10);

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

        return view('posts.edit',compact('post'));

    }

    public function update(Request $request, $id)

    {

        $this->validate($request, [

            'title' => 'required',

            'content' => 'required',

            'category' => 'required',

        ]);

          if($request->hasFile('avatar')){

            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/imagens/' . $filename));
            $post= Post::find($id);
            if($post->avatar != NULL && $post->avatar != 'default.jpg'){
            unlink(public_path('/uploads/imagens/') . $post->avatar);
            $post->avatar = $filename;
            $post->save();
            }
            else{

              $post->avatar = $filename;
              $post->save();

            }

            return redirect()->route('posts.index')

                            ->with('success','Post editado com sucesso!');


        }
        else{

          Post::find($id)->update($request->all());

          return redirect()->route('posts.index')

                          ->with('success','Post editado com sucesso!');

        }
    }


    public function destroy($id)

    {

      $post = Post::find($id);
      unlink(public_path('/uploads/imagens/') . $post->avatar);
      $post -> delete();


        return redirect()->route('posts.index')

                        ->with('success','Post deletado com sucesso!');

    }

}
