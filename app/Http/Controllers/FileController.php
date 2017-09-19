<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Image;

class FileController extends Controller
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
    public function index(Request $request) {

         $files= File::latest()
         ->orderBy('id','desc')
         ->paginate(10);

            return view('files.index',compact('files'))

                ->with('i', ($request->input('page', 1) - 1) * 10);

    }

        public function create()

        {

            return view('files.create');

        }

        public function store(Request $request)

        {

          File::create($request->all());

            return redirect()->route('files.index')

                            ->with('success','Cadastro concluído com sucesso!');


       }

        public function edit($id)

        {

            $file= File::find($id);

            return view('files.edit',compact('file'));

        }

        public function update(Request $request, $id)

        {

            if($request->hasFile('avatar')){

                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->save(public_path('/uploads/avatars/' . $filename, 100));
                $p= File::find($id);
                if($p->avatar != NULL && $p->avatar != 'Evento.jpeg'){
                unlink(public_path('/uploads/avatars/') . $p->avatar);
                $p->avatar = $filename;
                $p->save();
                }
                else{
                  $p->avatar = $filename;
                  $p->save();

                }

                        return redirect()->route('files.index')

                                        ->with('success','Cadastro editado com sucesso');


            }
            else{

            File::find($id)->update($request->all());

            return redirect()->route('files.index')

                            ->with('success','Cadastro editado com sucesso');

            }
        }

        public function destroy($id)

        {

          $file = File::find($id);
          if($file->avatar != NULL && $file->avatar != 'Evento.jpeg'){
          unlink(public_path('/uploads/avatars/') . $file->avatar);
          }
          $file -> delete();


            return redirect()->route('files.index')

                            ->with('success','Cadastro deletado com sucesso!');

        }

 }
