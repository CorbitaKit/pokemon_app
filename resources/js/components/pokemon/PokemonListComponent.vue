<template>

    <div>
        <div class="row mb-2">
            <div class="col-md-9">
                <div class="card ">
                    <div class="card-header">Pokemon List</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-2" placeholder="search pokemon...." v-model="query">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-md btn-primary">Search</button>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(pokemon,i) in pokemons" :key="i">
                                    <th scope="row">{{ i+1 }}</th>
                                    <td scope="row">
                                       <a href="#" @click="getPokemonData(i)">{{ pokemon.name }}</a>
                                    </td>


                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card ">
                    <div class="card-header">Top 10 favorite Pokemon</div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>

        <div  v-if="pokemons.length" v-observe-visibility="fetchAnotherPokemonList"></div>

    </div>

</template>
<script>

    import {mapGetters,mapActions} from 'vuex'
    export default{
        data(){
            return{

                query : '',
                lastList : 1,
                offset : 0
            }
        },

        created(){
            this.fetchPokemons(this.offset)
        },
        computed:{
            ...mapGetters({
                pokemons : 'getPokemons'
            })
        },

        methods : {

            ...mapActions({
                fetchPokemons  : 'fetchPokemons'
            }),


            fetchAnotherPokemonList(isVisible){
                if(! isVisible) {return}

                this.offset = this.pokemons.length

                this.fetchPokemons(this.offset)
            },

            getPokemonData(id){
                this.$router.push('/pokemon-information/'+(id+1));
            }
        },




    }
</script>
