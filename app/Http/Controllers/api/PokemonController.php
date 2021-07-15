<?php

namespace App\Http\Controllers\api;

use App\API\ApiError;

use App\Models\Pokemon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    
    private $pokemon;

    public function __construct(Pokemon $pokemon){
        $this->pokemon = $pokemon;
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    
    public function index()
    {
        if(request('q') !==  null){
            $pokemons['data'] = Pokemon::where('name', 'like', '%'.request('q').'%')
            ->orWhere('type1', 'like', '%'.request('q').'%')
            ->get();
            return response()->json($pokemons);
        }else{

            return $this->atualizarPagina();
        }
        
        // #--- Utilisation de resposta factory para criar resposta
        //  #--- Pode retornar também paginando, como segue 
        // $pokemons =Pokemon::orderBy('id', 'DESC')->paginate(50);
        // // return response()->json($this->pokemon->paginate(5));
        // // return response()->json($this->pokemon->all());
        // return response()->json($pokemons);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        try {
            //code...
            #-- Recuperar todos os atributos de request
            $pokemonData = $request->all();
            #-- Essa Instancia de Pokemon, adicionar nela novos dados request
            $pokemon = $this->pokemon->create($pokemonData);
            if($pokemon){
               return $this->atualizarPagina();
            }
         
            
            #-- Retornar json com mensagem de sucesso
            // return response()->json(['msg' => 'Dados adicionados com sucesso'], 201);

        } catch (\Exception $e) {
            //throw $th;

            if(config('app.debug')){
                #-- Se erro é de debug d'aplicação, recuperamos esse erro e mostramo-lo com seu codigo
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }
            #-- Senão, Se houver qualquer erro de banco de dados ou sintaxe, recuperamos esse erro e mostramo-lo com seu codigo
            return response()->json(ApiError::errorMessage('Houve um erro ao realizar operaçcao.', 1010), 500);
        }
    }

   

    #---Outra maneira para atualizar dados --->
    public function update(Request $request, $id)
    {
        //
        try {
            //code...
            $pokemonData = $request->all();
            ##-- Encontrar registo ###
            $pokemon= $this->pokemon->find($id);
            ##-- Atualizar registo ###
            $pokemon->update($pokemonData);

            ##-- Retornar mensagem de sucesso
            // return response()->json(['msg' => 'Dados de '.$pokemon->name. ' foram atualizados com sucesso'], 201);
                            
            if($pokemon){
                //Recarregar dados apos aatualizaçãos 
                return $this->atualizarPagina();
            }
        } catch (\Exception $e) {
            //throw $th;
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010));
            }
            return response()->json(ApiError::errorMessage('Houve um erro ao realizar operaçcao.', 1011));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        // Encontrar o registro por ID
        $pokemon = $this->pokemon->find($id);
        // Se não for encontrado, retornamos json explicativo com seu codigo
        if(!$pokemon){
            return response()->json(ApiError::errorMessage('Registo não encontrado!', 4040), 404);
        }
            
    
        ## - Se encontrar o registro, retornamo-lo -#
        $data = ['data' =>$pokemon];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokemon $pokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Pokemon $id)
    {
        //
        try {
            //code...
            if($id->delete()){

                return $this->atualizarPagina();
            }
            
            ##-- Retornar mensagem de sucesso
            // return response()->json(['msg' => 'Dados de '.$id->name.' foram eliminados com sucesso!'], 200);

        } catch (\Exception $e) {
            //throw $th;
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012));
            }
            return response()->json(ApiError::errorMessage('Houve um erro ao realizar operaçcao.', 1012));
        }
    }
    
    
   
    private function atualizarPagina(){
        $pokemons =Pokemon::orderBy('id', 'DESC')->paginate(50);            
        return response()->json($pokemons);
       }
}
