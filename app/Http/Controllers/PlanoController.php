<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Mensalista, Plano, Taxas};
use App\Http\Requests\MensalistaRequest;
use DB;

class PlanoController extends Controller
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
    
        return view('planos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mensalistas = Mensalista::get();
        $data = [
            'plano' => '',
            'url' => 'planos',
            'mensalistas' => $mensalistas,
            'method' => 'POST'
        ];
        return view('planos.form', compact('data'));
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
            
            $plano = Plano::create([
                'data_inicio' => $request['plano']['data_ini'],
                'data_fim' => $request['plano']['data_fim'],
                'valor' => $request['plano']['valor'],
                'mensalista_id' => $request['plano']['mensalista_id']
            ]);

            DB::commit();
            return redirect('planos')->with('success', 'Planos cadastrado com sucesso!');
        }
        catch(\Exception $e) {
            DB::rollback();
            return redirect('planos')->with('error', 'Erro no servidor! Planos não cadastrado!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
