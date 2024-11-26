<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\constructions;

class ConstructionController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */            
    public function index()
    {
        $Constructions = constructions::all();

        return view('constructions', ['constructions' => $Constructions]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        

        $data =$request->all();

        constructions::findOrFail($request->id)->create($data);

        $novaConstrucao = $this->constructions->where('id', $id)->create($request->except(['_token', '_method']));

        

            return redirect('/create')->with('message', 'Obra criada com sucesso');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Constructions = new constructions;

        $Constructions->id = $request->id;
        $Constructions->nome = $request->nome;  
        $Constructions->data_de_finalizacao = $request->data_de_finalizacao;
        $Constructions->andamento_da_obra = $request->andamento_da_obra;
        $Constructions->solicitacao_de_materiais = $request->solicitacao_de_materiais;

        $Constructions->save();


        $construcaoCriada = $this->constructions->create([
            'nome' => $request->input('nome'),
            'data_de_finalizacao' => $request->input('data_de_finalizacao'),
            'andamento_da_obra' => $request->input('andamento_da_obra'),
            'solicitacao_de_materiais' => $request->input('solicitacao_de_materiais'),
        ]);

        

            return redirect('/ConstructionController.store')->with('message', 'Obra criada com sucesso');
 

    }
    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Constructions = constructions::findOrFail($id);

        return view('update', ['constructions' => $Constructions]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =$request->all();

        constructions::findOrFail($request->id)->update($data);

        $atualizarConstrucao = $this->constructions->where('id', $id)->update($request->except(['_token', '_method']));

        

            return redirect('/ConstructionController.store')->with('message', 'Obra atualizada com sucesso');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        constructions::findOrFail($id)->delete();

        $this->constructions->where('id', $id)->delete();

        return redirect('/ConstructionController.store')->with('message', 'Construção excluída com sucesso');
    }
}

