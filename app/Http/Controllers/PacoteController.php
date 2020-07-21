<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Services\PacoteService;

class PacoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     private $pacoteService;    

    public function __construct(PacoteService $pacoteService)
    {
        $this->pacoteService = $pacoteService;
    }
    
    public function buscarTodosPacotes(){

        return $this->pacoteService->buscarTodosPacotes();
    }  
    
    public function buscarPacote(int $id){
        return $this->pacoteService->buscarPacote($id);
    }

    public function buscardetalhePacote(int $id){
        return $this->pacoteService->buscarDetalhePacote($id);
    }

    public function criarPacote(Request $request){
        return $this->pacoteService->criarPacote($request);
    }
    
    public function editarPacote(int $id, Request $request){
        return $this->pacoteService->editarPacote($id, $request);
    }

    public function excluirPacote(int $id){
        return $this->pacoteService->excluirPacote($id);
    }
}
