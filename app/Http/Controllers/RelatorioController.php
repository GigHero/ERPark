<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Mensalista, Plano, Patio, Taxas};
use App\Http\Requests\RelatoriosRequest;
use DB;

class RelatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pesquisa()
    {
        $data = [
            'relatorio' => '',
            'url' => 'relatorios/pesquisa',
            'method' => 'POST'
        ];

        return view('relatorios.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data_ini = date('Y-m-d H:i:s',strtotime($request['relatorio']['data_ini']));
        $data_fim = date('Y-m-d H:i:s',strtotime($request['relatorio']['data_fim']));
      
        $pesquisas = Patio::where('entrada', '>=', $data_ini)
                    ->where('saida', '<', $data_fim)
                    ->get();         
        $data = [
            'pesquisas' => $pesquisas,
        ];

        return view('relatorios.relatorio', compact('data'));
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
