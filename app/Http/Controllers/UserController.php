<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class UserController extends Controller
{
    public function index()
    {
        $Users = user::all();

        return view('users', ['users' => $Users]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    
        return redirect('/dashboard')->with('message', 'Funcionário adicionado com sucesso');

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Users = new user;

        $Users->id = $request->id;
        $Users->nome = $request->nome;  
        $Users->idade = $request->idade;
        $Users->email = $request->email;
        $Users->senha = $request->senha;

        $Users->save();

        

            return redirect('/UserController.store')->with('message', 'Funcionário criado com sucesso');

        

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
        $Users = user::findOrFail($id);

        return view('update', ['update' => $Users]);        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =$request->all();

        user::findOrFail($request->id)->update($data);
        

            return redirect('/UserController.store')->with('message', 'Funcionário atualizado com sucesso');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        user::findOrFail($id)->delete();
        return redirect('/UserController.store')->with('message', 'Funcionário excluído com sucesso');
    }
}
