<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DescricaoLocal;
use App\Local;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $modelList = Local::listLocals(5);
        $localDescription = DescricaoLocal::all();
        
        //Enumerate description local
        foreach ($modelList as $key => $value) {
            
            switch ($value->descricao) {
                case '1':
                    $value->descricao = 'Sala';
                    break;
                case '2':
                    $value->descricao = 'Sala de Reunião';
                    break;
                case '3':
                    $value->descricao = 'Sala com videoconferência';
                    break;
                case '4':
                    $value->descricao = 'Lounge';
                    break;                
            }            
        }

        return view('registers.places.index', compact('modelList', 'localDescription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $validate = \Validator::make($data,[
            "descricao" => "required",
            "endereco" => "required",
            "cidade" => "required",
            "qtd_mesas" => "required",
            "qtd_cadeiras" => "required",
            "custo_hora" => "required",
            "periodo_disponivel" => "required",
            "horario_disponivel" => "required"
        ]);

        //return error message if any field is empty
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        
        if(isset($request->image)){
            //Save image in storage/app/public/images
            $path = $request->image->store('public/images');

            //Just a temporary solution to test
            $data['image'] = url('/storage/images/') . '/' . explode("/", $path)[2];
        }

        //relationship with user_id
        $user = auth()->user();
        $user->locals()->create($data);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Local::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validate = \Validator::make($data,[
            "descricao" => "required",
            "endereco" => "required",
            "cidade" => "required",
            "qtd_mesas" => "required",
            "qtd_cadeiras" => "required",
            "custo_hora" => "required",
            "periodo_disponivel" => "required",
            "horario_disponivel" => "required"
        ]);

        //return error message if any field is empty
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        //Save image in storage/app/public/images
        if(isset($request->image)){
            $path = $request->image->store('public/images');
            //Just a temporary solution to test
            $data['image'] = url('/storage/images/') . '/' . explode("/", $path)[2];
        }        

        

        //relationship with user_id
        $user = auth()->user();
        $user->locals()->find($id)->update($data);                
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Local::find($id)->delete();
        return redirect()->back();
    }
}
