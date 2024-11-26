<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index()
    {
        $Relatorios = relatorios::all();

        return view('relatorios', ['relatorios' => $Relatorios]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');

        $data =$request->all();

        users::findOrFail($request->id)->create($data);

        $novoRelatorio = $this->relatorios->where('id', $id)->create($request->except(['_token', '_method']));

       

            return redirect('/RelatorioController.store')->with('message', 'Relatório adicionado com sucesso');

    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Relatorios = new relatorios;

        $Relatorios->id = $request->id;
        $Relatorios->relatorios = $request->relatorios;  

        $Relatorios->save();


        $relatorioCriado = $this->relatorios->create([
            'relatorios' => $request->input('relatorios'),
        ]);

       

            return redirect('/RelatorioController.store')->with('message', 'Relatório criado com sucesso');

        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Relatorios = relatorios::findOrFail($id);

        return view('update', ['update' => $Relatorios]);        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =$request->all();

        relatorios::findOrFail($request->id)->update($data);

        $atualizarRelatorio = $this->relatorios->where('id', $id)->update($request->except(['_token', '_method']));

        

            return redirect('/RelatorioController.store')->with('message', 'Relatório atualizado com sucesso');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        relatorios::findOrFail($id)->delete();

        $this->relatorios->where('id', $id)->delete();

        return redirect('/RelatorioController.store')->with('message', 'Relatório excluído com sucesso');
    }
}


