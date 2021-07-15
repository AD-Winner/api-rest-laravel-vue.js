<template>
    <div>
        <div class="modal" id="showPokemonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <!--Titre de modal-->
                        <h5 class="modal-title" id="exampleModalLongTitle">Pokemon: {{pokemonToShow.name}} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div> <!-- Fim do Titulo-->
                     <!-- Corp de Modal-->
                    <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row cols-3 table-border">
                                    <div class="col"><strong>Type 1 :</strong> {{pokemonToShow.type1}} </div>
                                    <div class="col"><strong>Type 2 :</strong> {{pokemonToShow.type2}} </div>
                                    <div class="col"><strong>Total :</strong> {{pokemonToShow.total}} </div>
                                </div>
                                <div class="row cols-3">
                                    <div class="col"><strong>HP :</strong> {{pokemonToShow.hp}} </div>
                                    <div class="col"><strong>Attack :</strong> {{pokemonToShow.attack}} </div>
                                    <div class="col"><strong>Defense :</strong> {{pokemonToShow.defense}} </div>
                                </div>
                                <div class="row cols-3">
                                    <div class="col"><strong>Sp Atk :</strong> {{pokemonToShow.sp_atk}} </div>
                                    <div class="col"><strong>Sp Def :</strong> {{pokemonToShow.sp_def}} </div>
                                    <div class="col"><strong>Speed :</strong> {{pokemonToShow.speed}} </div>                                    
                                </div>
                                
                                <div class="row cols-2">
                                  
                                   <div class="col"><strong>Generation :</strong> {{pokemonToShow.generation}} </div>
                                   <div class="col"> <strong>Legendary :</strong> {{pokemonToShow.legendary}} </div>
                                </div>
                            </div> <!-- Fim do container fluid-->
                    </div> <!-- Fim do Corpo de Modal-->
                    <div class="modal-footer">
                         <button type="button" class="btn btnsm btn-danger" data-dismiss="modal">x</button>
                    </div>
                </div> <!-- Fim do contentt-->
               
            </div>
            <!-- Fim do Div class modal -->
        </div>
        <!-- Fim do Div de Template -->
    </div>
</template>
<script>

export default {
        props: ['pokemonToShow'],
    }
</script>
