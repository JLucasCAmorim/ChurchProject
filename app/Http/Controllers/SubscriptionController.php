<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use Image;
class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
      $subscriptions= Subscription::latest()->paginate(10);

      return view('subscriptions.index',compact('subscriptions'))

          ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [

          'title' => 'required',

          'description' => 'required',

          'price' => 'required',

      ]);

      Subscription::create($request->all());

      return redirect()->route('subscriptions.index')

                      ->with('success','Post criado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $subscription= Subscription::find($id);

      return view('subscriptions.edit',compact('subscription'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [

          'title' => 'required',

          'description' => 'required',

          'price' => 'required',

      ]);

      if($request->hasFile('avatar')){

        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->save(public_path('/uploads/events/' . $filename));
        $subscription= Subscription::find($id);
        if($subscription->avatar != NULL && $subscription->avatar != 'default.jpg'){
        unlink(public_path('/uploads/events/') . $subscription->avatar);
        $subscription->avatar = $filename;
        $subscription->save();
        }
        else{

          $subscription->avatar = $filename;
          $subscription->save();

        }

        return redirect()->route('subscriptions.index')

                        ->with('success','Evento editado com sucesso!');


    }
    else{

          Subscription::find($id)->update($request->all());

          return redirect()->route('subscriptions.index')

                      ->with('success','Evento editado com sucesso!');

          }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $subscription = Subscription::find($id);
      unlink(public_path('/uploads/events/') . $subscription->avatar);
      $subscription -> delete();


        return redirect()->route('subscriptions.index')

                        ->with('success','Evento deletado com sucesso!');

    }
}
