<?php

namespace App\Services;

use App\Models\ValidacaoPacote;
use Illuminate\Http\Request;
use App\Repositories\PacoteRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class PacoteService{

    private $pacoteRepository;

    public function __construct(PacoteRepositoryInterface $pacoteRepository)
    {
        $this->pacoteRepository = $pacoteRepository;
    }

    public function buscarTodosPacotes(){

        $pacotes = $this->pacoteRepository->buscarTodosPacotes();

        try {
            if(count($pacotes)){
                return response()->json($pacotes, Response::HTTP_OK);
            } else{
                return response()->json([], Response::HTTP_OK);;
            }
        } 
        catch (QueryException $e) {
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    public function buscarPacote(int $id){         
       
       try {
        $pacote = $this->pacoteRepository->buscarPacote($id); 

            if(count($pacote)){
                return response()->json($pacote, Response::HTTP_OK);
            } else{
                return response()->json([], Response::HTTP_NOT_FOUND);;
            }
        } 
        catch (QueryException $e) {
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function buscarDetalhePacote($id){

        $pacote = $this->pacoteRepository->buscardetalhePacote($id);

        if (is_null($pacote)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        } else {
            return response()->json([
                'id'            => $pacote->id,
                'descriacao'    => $pacote->descricao,
                'urlImagem'     => $pacote->urlImagem,
                'site'          => $pacote->site,
                'telefone'      => $pacote->telefone,
                'pacote'        => [
                    'id'            => $pacote->id,
                    'nome'          => $pacote->nome,
                    'dataInicio'    => $pacote->dataInicio,
                    'dataFim'       => $pacote->dataFim,
                    'valor'         => $pacote->valor
                ]
            ], Response::HTTP_OK);
        }
        
    }

    public function criarPacote(Request $request){        
        
        $validacao = Validator::make(
            $request->all(),
            ValidacaoPacote::REGRA_NOVO_PACOTE,
            ValidacaoPacote::MENSAGENS_DE_ERRO,
        );

        if ($validacao->fails()) {
            return response()->json($validacao->errors(), Response::HTTP_BAD_REQUEST);
        }
        else{
            try {
                $pacote = $this->pacoteRepository->criarPacote($request);  
            
                return response()->json($pacote, Response::HTTP_CREATED);                                    
            } 
            catch (QueryException $e) {
                return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
        
    }

    public function editarPacote(int $id, Request $request){           
        
        try {
            $pacote = $this->pacoteRepository->editarPacote($id, $request); 
        
            return response()->json($pacote, Response::HTTP_OK);                                    
        } 
        catch (QueryException $e) {
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function excluirPacote(int $id){        
        
        try {
            $pacote = $this->pacoteRepository->excluirPacote($id); 
        
            return response()->json($pacote, Response::HTTP_OK);                                    
        } 
        catch (QueryException $e) {
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}