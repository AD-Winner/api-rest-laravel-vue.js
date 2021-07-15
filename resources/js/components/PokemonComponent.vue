<template>
    <div class="container">
        <div class="row">
             <div class="col-sm-12 col-md-6">               
                <h3 class="text-white">Pokemons </h3>
            </div>
           
        </div>
        <div class="row">
                <div class="input-group mb-0 mt-0"> 
                  <input type="text" class="form-control" @keyup="searchPokemon" v-model="q" placeholder="Pesquisar Pokemon..."/>
                   <div class="input-group-append ">
                        <add-pokemon @pokemon-added="atualizar"></add-pokemon> 
                    </div>
                </div>
        </div>
        
        <div class="row">
             <pagination :data="pokemons" @pagination-change-page="getResults" class="mt-2"></pagination>
             
        </div>
        <div class="row bg-white mb-2">

            <div class="table">
                <table class="table table-sm table-bordered table-hover">
                    <thead bg-info>
                        <tr>                
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Type 1</th>
                            <th>Legendary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pokemon in pokemons.data" :key="pokemon.id">
                            <td>{{ pokemon.id}}</td>
                            <td>{{ pokemon.name}}</td>
                            <td>{{ pokemon.type1}}</td> 
                        <td>
                        {{ pokemon.legendary }}
        
                        </td>                              
                        <td class="d-flex">
                            
                            <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" 
                            data-target="#showPokemonModal" @click="getPokemonToShow(pokemon.id)">
                              show
                            </button> 

                            <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" 
                                data-target="#editPokemonModal" @click="getPokemon(pokemon.id)">
                                Edit
                            </button>   

                            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" 
                                data-target="#deletePokemonModal" @click="deletePokemon(pokemon.id)">
                                Del
                            </button>   
                            <edit-pokemon v-bind:pokemonToEdit="pokemonToEdit" @pokemon-updated="atualizar"></edit-pokemon>     
                             
                             <show-pokemon v-bind:pokemonToShow="pokemonToShow"></show-pokemon>
                        </td>                              
                        
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
            <pagination :data="pokemons" @pagination-change-page="getResults" class="mt-2"></pagination>
    </div>
    
</template>

<script>
    export default {

        data(){
            return {
                pokemons: [],
                pokemonToEdit: '',
                pokemonToShow: '',
                q: '' // q -> quer dizer Query
            }
        },

        created(){

             axios.get('http://127.0.0.1:8000/api/pokemons')
             .then(response => {
               // console.log(response.data);
               this.pokemons = response.data
           })
           .catch(error => {
               console.log(error)
           });
        },
       
       methods: {
           getResults(page = 1){
                  axios.get('http://127.0.0.1:8000/api/pokemons?page='+ page)
                        .then(response => {
                        console.log(response.data);
                        this.pokemons = response.data;
             }); 
           },
           getPokemon(id){
                axios.get('http://127.0.0.1:8000/api/pokemons/edit/' + id)
                    // .then( response => console.log(response.data.data))
                    .then( response => this.pokemonToEdit = response.data.data)
                    .catch(error => console.log(error));             
           },
           getPokemonToShow(id){
                axios.get('http://127.0.0.1:8000/api/pokemons/edit/' + id)
                    // .then( response => console.log(response.data.data))
                    .then( response => this.pokemonToShow = response.data.data)
                    .catch(error => console.log(error));             
           },

           //Método para deletar pokemon
           deletePokemon(id){
                axios.delete('http://127.0.0.1:8000/api/pokemons/' + id)
                    .then(response => this.pokemons = response.data)
                    .catch(error => console.log(error));
           },

           atualizar(pokemons){
               this.pokemons = pokemons.data
           },
     
            searchPokemon() {
                if(this.q.length > 2){

                    axios.get('http://127.0.0.1:8000/api/pokemons/' + this.q)
                         .then(response => this.pokemons = response.data)
                            .catch(error => console.log(error));
                }else{                        
                    axios.get('http://127.0.0.1:8000/api/pokemons')
                    .then(response => this.pokemons = response.data)
                    .catch(error => console.log(error));
                }
                    
            },
        mounted() {
            console.log('Component mounted.')
           
        }
       }
    }
</script>
