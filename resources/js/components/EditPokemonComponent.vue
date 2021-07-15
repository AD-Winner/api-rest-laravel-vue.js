<template>
    <div>

        <div class="modal fade" id="editPokemonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <!--Titre de modal-->
                        <h5 class="modal-title" id="exampleModalLongTitle">Atualizar informação de : <strong>{{pokemonToEdit.name}}</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <!-- Corp de Modal-->
                    <form>                
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" min="1" max="50" class="form-control" 
                                placeholder="Informa nome..." name="name" 
                                  v-model="pokemonToEdit.name" id="name"/>
                            </div>

                            <div class="row cols-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="type1">Type 1:</label>
                                        <input type="text" min="1" max="50" class="form-control" 
                                        placeholder="Informa aqui..." 
                                        name="type1"  v-model="pokemonToEdit.type1" id="type1"/>
                                    </div>                                    
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="type2">Type 2:</label>
                                        <input type="text" min="1" max="50" class="form-control"  
                                        placeholder="Informa aqui..." 
                                        name="type2"  v-model="pokemonToEdit.type2" id="type2"/>
                                    </div>                                    
                                </div>
                            </div>
                        

                            
                            <div class="row cols-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="total">Total :</label>
                                        <input type="number" min="1" class="form-control"  
                                        placeholder="Informa Total..." 
                                        name="total" v-model="pokemonToEdit.total" id="total"/>
                                    </div>                                    
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="hp">HP :</label>
                                        <input type="number" min="1" class="form-control"  
                                        placeholder="Informa aqui..." 
                                        name="hp" v-model="pokemonToEdit.hp" id="hp"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="attack">Attack :</label>
                                        <input type="number"   class="form-control"  placeholder="Informa aqui..." 
                                        name="attack" v-model="pokemonToEdit.attack" id="attack"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row cols-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="defense">Defense :</label>
                                        <input type="number"  class="form-control"  
                                        placeholder="Informa aqui..." 
                                        name="defense" v-model="pokemonToEdit.defense" id="defense" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="sp_atk">Sp Atk :</label>
                                        <input type="number"  class="form-control"  
                                        placeholder="Informa aqui..." 
                                        name="sp_atk" v-model="pokemonToEdit.sp_atk" id="sp_atk" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="sp_def">Sp Def :</label>
                                        <input type="number"  class="form-control"  
                                        placeholder="Informa aqui..." 
                                        name="sp_def" v-model="pokemonToEdit.sp_def" id="sp_def" />
                                    </div>

                                </div>
                            </div>
                              
                              <div class="row cols-2">
                                  <div class="col">
                                    <div class="form-group">
                                        <label for="speed">Speed :</label>
                                        <input type="number" class="form-control"  
                                        placeholder="Informa aqui..." 
                                        name="speed" v-model="pokemonToEdit.speed" id="speed" />
                                    </div>                                       
                                  </div>
                                  <div class="col">                                    
                                    <div class="form-group">
                                        <label for="generation">Generation :</label>
                                        <input type="number" class="form-control"  
                                        placeholder="Informa aqui..." 
                                        name="generation" v-model="pokemonToEdit.generation" id="generation" />
                                    </div>                                      
                                  </div>
                              </div>
                            <div class="form-group">
                                <select name="legendary" v-model="pokemonToEdit.legendary" id="legendary" class="form-control">
                                <option value="" selected></option>
                                <option value="true" selected>True</option>
                                <option value="false" selected>False</option>
                            </select>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit"  class="btn btn-outline-success" @click="update" data-dismiss="modal"  >Atualizar</button>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['pokemonToEdit'],

        methods: {
            update(){
                axios.put('http://127.0.0.1:8000/api/pokemons/' + this.pokemonToEdit.id, {

                    name: this.pokemonToEdit.name,
                    type1: this.pokemonToEdit.type1,
                    type2: this.pokemonToEdit.type2,
                    total: this.pokemonToEdit.total,
                    hp: this.pokemonToEdit.hp,
                    attack: this.pokemonToEdit.attack,
                    defense: this.pokemonToEdit.defense,
                    sp_atk: this.pokemonToEdit.sp_atk,
                    sp_def: this.pokemonToEdit.sp_def,
                    speed: this.pokemonToEdit.speed,
                    generation: this.pokemonToEdit.generation,
                    legendary: this.pokemonToEdit.legendary
                })
                .then(response => this.$emit('pokemon-updated', response))
                .catch(error => console.log(error));
            }
        }
    }
</script>