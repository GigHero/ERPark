<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\{Mensalista, Plano, Taxas};
use App\Http\Requests\MensalistaRequest;
use DB;
use Carbon\Carbon;

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

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mensalistas = Mensalista::get();
        $taxas = Taxas::get();
        $data = [
            'taxas' => $taxas,
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
        
        $inicio = $request['plano']['data_ini'];
        $fim = $request['plano']['data_fim'];
        

        try {
            
            $plano = Plano::create([
                'data_inicio' => Carbon::createFromFormat('Y-m-d',$inicio),
                'data_fim' => Carbon::createFromFormat('Y-m-d',$fim),
                'taxa_id' => $request['plano']['taxa_id'],
                'mensalista_id' => $request['plano']['mensalista_id']
            ]);

            DB::commit();
            return redirect('planos')->with('success', 'Planos cadastrado com sucesso!');
        }
        catch(\Exception $e) {
            DB::rollback();
            return redirect('patio')->with('error', 'Erro no servidor! Carro não cadastrado!');
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
        $atual = Carbon::now();

        $planos = DB::table('plano')->where([
            ['mensalista_id', '=', $id],
            ['data_fim', '>', $atual],  
        ])->get();

        if($planos->isEmpty()){
            
        return redirect('planos')->with('error', 'Usuário sem planos cadastrados!');

        }else{
            $data = [
                'planos' => $planos
            ];
            return view('planos.show', compact('data'));
        }

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
