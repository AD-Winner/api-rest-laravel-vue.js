<template>
   <div>
       <!-- <div class="row "> -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddPokemonModal">
            + Pokemon
            </button>
        <!-- </div> -->

        <div class="modal fade" id="AddPokemonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable " role="document">
            <div class="modal-content">
                <div class="modal-header">
                <!--Titre de modal-->
                    <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar pokemon</h5>
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
                             v-model="name" id="name"/>
                        </div>

                        <div class="row cols-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="type1">Type 1:</label>
                                    <input type="text"  class="form-control"  placeholder="Informa aqui..." 
                                    name="type1"  v-model="type1" id="type1"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="type2">Type 2:</label>
                                    <input type="text" min="1" max="50" class="form-control"  
                                    placeholder="Informa aqui..." 
                                    name="type2"  v-model="type2" id="type2"/>
                                </div>
                            </div>
                        </div>
                        <div class="row cols-3">
                            <div class="col">
                                <div class="form-group">
                                    <label for="total">Total :</label>
                                    <input type="number" min="1" max="50" class="form-control"  
                                    placeholder="Informa Total..." 
                                    name="total" v-model="total" id="total"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="hp">HP :</label>
                                    <input type="number" min="1" max="50" class="form-control"  
                                    placeholder="Informa aqui..." 
                                    name="hp" v-model="hp" id="hp"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="attack">Attack :</label>
                                    <input type="number" min="1" max="50" class="form-control"  placeholder="Informa aqui..." 
                                    name="attack" v-model="attack" id="attack"/>
                                </div>
                            </div>

                        </div>
                      
                       <div class="row cols-3">

                           <div class="col">
                               <div class="form-group">
                                    <label for="defense">Defense :</label>
                                    <input type="number" min="1" max="50" class="form-control"  
                                    placeholder="Informa aqui..." 
                                    name="defense" v-model="defense" id="defense" />
                                 </div>                               
                           </div>
                           <div class="col">
                                <div class="form-group">
                                    <label for="sp_atk">Sp Atk :</label>
                                    <input type="number" min="1" max="50" class="form-control"  
                                    placeholder="Informa aqui..." 
                                    name="sp_atk" v-model="sp_atk" id="sp_atk" />
                                </div>
                           </div>
                           <div class="col">
                                <div class="form-group">
                                    <label for="sp_def">Sp Def :</label>
                                    <input type="number" min="1" max="50" class="form-control"  
                                    placeholder="Informa aqui..." 
                                    name="sp_def" v-model="sp_def" id="sp_def" />
                                </div>
                           </div>
                       </div>
                       <div class="row cols-2">
                           <div class="col">
                                <div class="form-group">
                                    <label for="speed">Speed :</label>
                                    <input type="number" min="1" max="50" class="form-control"  
                                    placeholder="Informa aqui..." 
                                    name="speed" v-model="speed" id="speed" />
                                </div>
                               
                           </div>
                           <div class="col">
                                <div class="form-group">
                                    <label for="generation">Geração :</label>
                                    <input type="number" min="1" max="50" class="form-control"  
                                    placeholder="Informa aqui..." 
                                    name="generation" v-model="generation" id="generation" />
                                </div>
                           </div>
                           
                        </div>    
                        <div class="form-group">
                            <label for="legendary">Legenda :</label>
                            <select name="legendary" v-model="legendary" id="legendary" class="form-control">
                                <option value="" selected></option>
                                <option value="true" selected>True</option>
                                <option value="false" selected>False</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                         <button type="submit" @click="storePokemon" class="btn btn-outline-success" data-dismiss="modal" >Cadastrar</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
   </div>
</template>

<script>
    export default {
        data(){
            return {
                name: '',
                type1: '',
                type2: '',
                total: '',
                hp: '',
                attack: '',
                defense: '',
                sp_atk: '',
                sp_def:'',
                speed: '',
                generation:'',
                legendary : '',
                generation: ''

            }
        },
        

        methods: {
            storePokemon(){
                axios.post('http://127.0.0.1:8000/api/pokemons', {
                    name: this.name,
                    type1: this.type1,
                    type2: this.type2,
                    total : this.total,
                    hp : this.hp,
                    attack: this.attack,
                    defense: this.defense,
                    sp_atk: this.sp_atk,
                    sp_def: this.sp_def,
                    speed : this.speed,
                    generation: this.generation,
                    legendary: this.legendary,

                })
                // .then(response => console.log(response))                   
                .then(response => this.$emit('pokemon-added', response))                   
                .catch(error => console.log(error))
            }

        }
    }
</script>