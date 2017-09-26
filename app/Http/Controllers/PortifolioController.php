<?php

namespace App\Http\Controllers;

use App\Portifolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\PortifolioPhoto;

class PortifolioController extends Controller
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
      $portifolios= Portifolio::latest()
      ->orderBy('id','desc')
      ->paginate(10);

         return view('portifolios.index',compact('portifolios'))

             ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('portifolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $portifolio =Portifolio::create($request->all());

        if($avatars = $request->file('avatar')){

          foreach ($avatars as $avatar) {
            $filename =  $avatar->getClientOriginalName(). $portifolio->name. '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize('500','500')->save(public_path('/uploads/portifolios/' . $filename, 100));
            PortifolioPhoto::create([
              'portifolio_id'=> $portifolio->id,
              'avatar' => $filename
            ]);

            }



        return redirect()->route('portifolios.index')

                        ->with('success','Portifolio criado com sucesso!');
    }
  }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portifolio  $portifolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $portifolio = Portifolio::find($id);
      foreach ($portifolio->portifolioImages as $image) {
        if($image->avatar != NULL && $image->avatar != 'default.jpg'){
          unlink(public_path('/uploads/portifolios/') . $image->avatar);
        }
      }
      $portifolio -> delete();



        return redirect()->route('portifolios.index')

                        ->with('success','Portifolio deletado com sucesso!');

    }
}
