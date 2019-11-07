<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Taxas};
use App\Http\Requests\TaxasRequest;
use DB;

class TaxasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxas = Taxas::get();
        return view('taxas.index', compact('taxas'));
    }

    /**
     * Show the form for creating a new resource.
     * Não é utilizado em 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'taxa' => '',
            'url' => 'taxas',
            'method' => 'POST',
        ];
        return view('taxas.form', compact('data'));
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
            $taxa = Taxas::create([
                'nome' => $request['taxa']['nome'],
                'valor' => $request['taxa']['valor']
            ]);
            DB::commit();
            return redirect('taxas')->with('success', 'Taxa cadastrado com sucesso!');
        }
        catch(\Exception $e) {
            DB::rollback();
            return redirect('taxas')->with('error', 'Erro no servidor! Taxa não cadastrado!');
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
        $taxa = Taxas::findOrFail($id);
        $data = [
           'taxa' => $taxa,
           'url' => 'taxas/'.$id,
           'method' => 'PUT',
        ];

       return view('taxas.form', compact('data'));
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
        $taxa = Taxas::findOrFail($id);
        
        DB::beginTransaction();

         try {
             $taxa->update([
                 'nome' => $request['taxa']['nome'],
                 'valor' => $request['taxa']['valor']
             ]);
             DB::commit();
             return redirect('taxas')->with('success', 'taxa cadastrado com sucesso!');
         }
         catch(\Exception $e) {
             DB::rollback();
             return redirect('taxas')->with('error', 'Erro no servidor! taxa não cadastrado!');
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
        $taxa = Taxas::withTrashed()->findOrFail($id);
       if($taxa->trashed()) {
           $taxa->restore();
           return redirect('taxas')->with('success', 'taxa ativado com sucesso!');
       } else {
           $taxa->delete();
           return redirect('taxas')->with('success', 'taxa desativado com sucesso!');
        }
    }
}
