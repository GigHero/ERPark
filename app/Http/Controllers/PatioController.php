<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Patio, Taxas, Plano, Mensalista};
use App\Http\Requests\PatioRequest;
use DB;
use Carbon\Carbon;

class PatioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $carros = Patio::get();
        $data = [
            'carros' => $carros
        ];
    
        return view('patio.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taxas = Taxas::get();
        $mensalistas = Mensalista::get();
        $data = [
            'mensalistas' => $mensalistas,
            'taxas' => $taxas,
            'patio' => '',
            'url' => 'patio',
            'method' => 'POST'
        ];
        return view('patio.form', compact('data'));
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
            $patio = Patio::create([
                'entrada' => Carbon::now('America/Sao_Paulo'),
                'placa' => $request['patio']['placa'],
                'obs' => $request['patio']['obs'],
                'vaga' => $request['patio']['vaga'],
                'taxa_id' =>$request['patio']['taxa_id']
            ]);
            DB::commit();
            return redirect('patio')->with('success', 'Carro cadastrado com sucesso!');
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
        //
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
        $carro = Patio::findOrFail($id);
        
        DB::beginTransaction();
         try {

            if(!$carro->saida){
                $carro->update([
                'saida' => Carbon::now('America/Sao_Paulo')
             ]);
            }
            else{
                return redirect('patio')->with('error', 'Erro Operação invalida!');
            }

             DB::commit();
             return redirect('patio')->with('success', 'mensalista cadastrado com sucesso!');
         }
         catch(\Exception $e) {
             DB::rollback();
             return redirect('patio')->with('error', 'Erro no servidor! mensalista não cadastrado!');
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
        //
    }
}
