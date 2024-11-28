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
        $allConstructions = constructions::all();

        return view('constructions', ['allConstructions' => $allConstructions]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('create');

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
        $Constructions->relatorio_da_obra	 = $request->relatorio_da_obra;
        $Constructions->andamento_da_obra = $request->andamento_da_obra;
        $Constructions->solicitacao_de_materiais = $request->solicitacao_de_materiais;

        $Constructions->save();

        $allConstructions = constructions::all();

        return view('constructions', ['allConstructions' => $allConstructions])->with('message', 'Obra criada com sucesso');
 

    }
    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ConstructionsId = constructions::findOrFail($id);

        return view('update', ['ConstructionsId' => $ConstructionsId]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_de_finalizacao' => 'required|date',
            'andamento_da_obra' => 'required|string|max:255',
            'solicitacao_de_materiais' => 'max:3000',
        ], [
            'nome.required' => 'Este campo é obrigatório',
            'data_de_finalizacao.required' => 'Este campo é obrigatório',
            'andamento_da_obra.required' => 'Este campo é obrigatório',
            'solicitacao_de_materiais.required' => 'Este campo é obrigatório',
            'nome.string' => 'Utilize um nome válido',
            'data_de_finalizacao.date' => 'Utilize uma data válida',
            'andamento_da_obra.string' => 'Preencha este o campo andamento corretamente',
            'solicitacao_de_materiais.string' => 'Preencha o campo solicitações corretamente',
            'nome.max' => 'O nome só pode conter 255 caracteres',
            'andamento_da_obra.max' => 'O campo andamento só pode conter até 255 caracteres',
            'solicitacao_de_materiais.max' => 'O campo solicitações só pode conter 3000 caracteres',

        ]);

        $Constructions = constructions::findOrFail($id);

        $Constructions->nome = $request->nome;  
        $Constructions->data_de_finalizacao = $request->data_de_finalizacao;
        $Constructions->andamento_da_obra = $request->andamento_da_obra;
        $Constructions->solicitacao_de_materiais = $request->solicitacao_de_materiais;

        $Constructions->updated_at = now();

        $Constructions->save();

        return redirect('/constructions/update');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        constructions::findOrFail($id)->delete();
        return redirect()->route('ConstructionControllerIndex')->with('message', 'Obra deletada com sucesso');
    }
}

