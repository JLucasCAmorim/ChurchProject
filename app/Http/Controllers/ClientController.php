<?php

namespace App\Http\Controllers;

use App\Client;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ClientController extends Controller
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
      $clients= DB::table('clients')
      ->leftJoin('subscriptions', 'subscription_id', '=', 'subscriptions.id')
      ->select('clients.id', 'clients.nome', 'clients.igreja', 'clients.polo','clients.liderPolo',
       'clients.whatsapp', 'clients.responsavel', 'clients.email', 'clients.idade'
       ,'clients.pastor', 'clients.liderjuventude', 'clients.estado', 'clients.necessidade', 'subscriptions.title')
      ->get();

    

      return view('clients.index',compact('clients'))

          ->with('i', ($request->input('page', 1) - 1) * 10);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $client= Client::find($id);

      return view('clients.edit',compact('client'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        'subscription_id'=> 'required',

      ]);
      Client::find($id)->update($request->all());

      return redirect()->route('clients.index')

                      ->with('success','Cliente editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $client = Client::find($id);
      $client->delete();


        return redirect()->route('clients.index')

                        ->with('success','Cliente deletado com sucesso!');
    }
}
