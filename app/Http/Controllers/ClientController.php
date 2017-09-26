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
       ,'clients.pastor', 'clients.liderjuventude', 'clients.estado', 'clients.necessidade', 'clients.pago', 'subscriptions.title')
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

    public function search(Request $request){
      if($request->ajax()){
        $output="";
        $necessidade="";
        $pago="";
         $clients = DB::table('clients')
         ->leftJoin('subscriptions', 'subscription_id', '=', 'subscriptions.id')
         ->select('clients.id', 'clients.nome', 'clients.igreja', 'clients.polo','clients.liderPolo',
          'clients.whatsapp', 'clients.responsavel', 'clients.email', 'clients.idade'
          ,'clients.pastor', 'clients.liderjuventude', 'clients.estado', 'clients.necessidade', 'clients.pago', 'subscriptions.title')
         ->where('clients.nome', 'LIKE', '%'.$request->search.'%')
         ->orWhere('subscriptions.title','LIKE', '%'.$request->search.'%')
         ->get();
         if($clients){
           foreach ($clients as $client) {
             if($client->necessidade == 0){
                  $necessidade = "Não";
             }
             else{
                $necessidade = "Sim";
             }
             if($client->pago == 0){
                  $pago = "Não";
             }
             else{
                $pago = "Sim";
             }
             $output.='<tr>'.
                      '<td>'.$client->nome.'</td>'.
                      '<td>'.$client->igreja.'</td>'.
                      '<td>'.$client->polo.'</td>'.
                      '<td>'.$client->liderPolo.'</td>'.
                      '<td>'.$client->whatsapp.'</td>'.
                      '<td>'.$client->responsavel.'</td>'.
                      '<td>'.$client->email.'</td>'.
                      '<td>'.$client->idade.'</td>'.
                      '<td>'.$client->pastor.'</td>'.
                      '<td>'.$client->liderjuventude.'</td>'.
                      '<td>'.$client->estado.'</td>'.
                      '<td>'.$necessidade.'</td>'.
                      '<td>'.$client->title.'</td>'.
                      '<td>'.$pago.'</td>'.
                      '<td>'.'<center>'.
                       '<a class="btn btn-primary btn-sm" href="clients/'.$client->id .'/edit">'.
                       '<i class="small material-icons">'. 'edit' .'</i>'
                       .'</a>'.
                       '<form method="DELETE" action="delete/'.$client->id. ' id="FormDelete" style="display:inline" onsubmit="alert()">'.
                       '<button type="submit" style="display: inline;" class="btn btn-danger btn-sm">'.
                       '<i class="small material-icons">'. 'delete' .'</i>'
                       .'</button>'.
                       '</form>'.
                       '</center>'.'</td>'.
                      '</tr>';
           }
            return Response($output);
         }
      }
    }
}
