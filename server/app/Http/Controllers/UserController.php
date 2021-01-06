<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $this->sendResponse($users, 'Usuários recuperados com sucesso.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return $this->sendResponse($user, 'Usuário criado com sucesso.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $user = User::findOrFail($id);
            return $this->sendResponse($user, 'Usuário recuperado com sucesso.');
        }catch(ModelNotFoundException $e){
            return $this->sendError('Usuário não encontrado', $e, 404);  
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try{
            $user = User::findOrFail($id);
            $user->update($request->all());
            return $this->sendResponse($user, 'Usário alterado com sucesso.');
        }catch(ModelNotFoundException $e){
            return $this->sendError('Usuário não encontrado', $e, 404);  
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            User::findOrFail($id)->delete();
            return $this->sendResponse([], 'Usário deletado com sucesso.');
        }catch(ModelNotFoundException $e){
            return $this->sendError('Usuário não encontrado', $e, 404);  
        }  
    }
}
