<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\File;
use App\Post;
use App\Subscription;
use App\Client;
use App\PostImage;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


      $posts= Post::where('category', 'noticia')
      ->paginate(10);


      $files= File::latest()
      ->orderBy('id','desc')
      ->paginate(1);



         return view('home',compact('files','posts'))

             ->with('i', ($request->input('page', 1) - 1) * 10);


    }


    public function show($id)

    {

        $post= Post::find($id);
        $postimages = DB::table('post_images')
        ->where('post_id', '=', $id)->get();

        return view('show',compact('post', 'postimages'));

    }

    public function event(Request $request)
    {
      $posts= Post::where('category', 'evento')
      ->paginate(10);

         return view('event',compact('posts'))

             ->with('i', ($request->input('page', 1) - 1) * 10);


    }
    public function artigo (Request $request)
    {
      $posts= Post::where('category', 'artigo')
      ->orderBy('id','desc')
      ->paginate(10);

         return view('artigo',compact('posts'))

             ->with('i', ($request->input('page', 1) - 1) * 1);


    }

    public function inscricao (Request $request)
    {
      $subscriptions= Subscription::latest()
      ->orderBy('id','desc')
      ->paginate(10);

         return view('inscricao',compact('subscriptions'))

             ->with('i', ($request->input('page', 1) - 1) * 1);


    }
    public function cadastro($id)
    {
      $subscription = Subscription::find($id);
      return view('clients.create',compact('subscription'));
    }
    public function store(Request $request)
    {
      $this->validate($request, [

        'nome' => 'required',
        'igreja'=> 'required',
        'polo'=> 'required',
        'liderPolo' => 'required',
        'cidade'=> 'required',
        'whatsapp'=> 'required',
        'responsavel'=> 'required',
        'email'=> 'required',
        'idade'=> 'required',
        'pastor'=> 'required',
       'liderjuventude'=> 'required',
        'estado'=> 'required',
        'necessidade'=> 'required',
        'idevento'=> 'required',

      ]);

      Client::create($request->all());

      return redirect()->route('inscricao')

                      ->with('success','Inscrição realizada com sucesso, realize seu pagamento! Obrigado!');

  }
}
