<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Mensalista};
use App\Http\Requests\MensalistaRequest;
use DB;

class MensalistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensalistas = Mensalista::get();
        $data = [
            'mensalistas' => $mensalistas
        ];
    
        return view('mensalistas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'mensalista' => '',
            'url' => 'mensalistas',
            'method' => 'POST',
        ];
        return view('mensalistas.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $mensalista = Mensalista::create([
                'nome' => $request['mensalista']['nome'],
                'email' => $request['mensalista']['email'],
                'cpf' => $request['mensalista']['cpf'],
                'telefone' => $request['mensalista']['telefone']

            ]);
            DB::commit();
            return redirect('mensalistas')->with('success', 'Mensalista cadastrado com sucesso!');
        }
        catch(\Exception $e) {
            DB::rollback();
            return redirect('mensalistas')->with('error', 'Erro no servidor! Mensalista não cadastrado!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mensalista = Mensalista::findOrFail($id);
        $taxas = Taxas::get();
        $data = [
            'taxas' => $taxas,
           'mensalista' => $mensalista,
           'url' => 'mensalistas/'.$id,
           'method' => 'PUT',
        ];
        
        return view('mensalistas.form', compact('data'));
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
        $mensalista = Mensalista::findOrFail($id);
        
        DB::beginTransaction();

         try {
             $mensalista->update([
                'nome' => $request['mensalista']['nome'],
                'email' => $request['mensalista']['email'],
                'cpf' => $request['mensalista']['cpf'],
                'telefone' => $request['mensalista']['telefone']              
             ]);
             DB::commit();
             return redirect('mensalistas')->with('success', 'mensalista cadastrado com sucesso!');
         }
         catch(\Exception $e) {
             DB::rollback();
             return redirect('mensalistas')->with('error', 'Erro no servidor! mensalista não cadastrado!');
         }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensalista = Mensalista::withTrashed()->findOrFail($id);
        if($mensalista->trashed()) {
           $mensalista->restore();
           return redirect('mensalistas')->with('success', 'Mensalista ativado com sucesso!');
        } else {
           $mensalista->delete();
           return redirect('mensalistas')->with('success', 'Mensalista desativado com sucesso!');
        }
    }
}
