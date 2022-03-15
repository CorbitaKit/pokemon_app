<template>
    <div>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">Pokemon Data</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img :src="pokemon.sprites.other.dream_world.front_default" alt="..." class="img-thumbnail mb-2">

                            </div>
                            <div class="col-md-4">
                                <span>Basic Information</span>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Name: </td>
                                            <td>{{ pokemon.name }}</td>
                                        </tr>


                                        <tr>
                                            <td>Height: </td>
                                            <td>{{ pokemon.height }}</td>
                                        </tr>

                                        <tr>
                                            <td>Weight: </td>
                                            <td>{{ pokemon.weight }}</td>
                                        </tr>

                                        <tr>
                                            <td>Base experience: </td>
                                            <td>{{ pokemon.base_experience }}</td>
                                        </tr>

                                        <tr>
                                            <td>Available Moves: </td>
                                            <td>{{ pokemon.moves.length }}</td>
                                        </tr>

                                    </tbody>
                                </table>

                                <span>Types</span>
                                <table class="table table-bordered">

                                    <tbody>
                                        <tr v-for="(type,i) in pokemon.types" :key="i">
                                            <td>Type: </td>
                                            <td>{{ type.type.name}}</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                Stat Information
                                <table class="table table-bordered">

                                    <tbody>
                                        <tr v-for="(stat, i) in pokemon.stats" :key="i">
                                            <td>{{ stat.stat.name}}: </td>
                                            <td>{{ stat.base_stat}}</td>
                                        </tr>


                                    </tbody>
                                </table>

                                <span>Abilities</span>
                                <table class="table table-bordered">

                                    <tbody>
                                        <tr v-for="(ability,i) in pokemon.abilities" :key="i">
                                            <td>Ability {{ i+1 }}: </td>
                                            <td>{{ ability.ability.name}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-3">
                                <div class="btn-group" role="group" aria-label="Basic example" v-if="! this.$route.path.includes('/home')">
                                    <button v-if="! user.favorite" type="button" class="btn btn-warning" @click="addAsFavoritePokemon">Favorite</button>
                                    <button type="button" class="btn btn-primary" @click="addAsLikedPokemon">Like</button>
                                    <button type="button" class="btn btn-danger" @click="addAsHatedPokemon">Hate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    export default{
        name : 'pokemon-data',
        props : ['pokemon_id'],
        data(){
            return{

            }
        },

        created(){
            this.getPokemonData(this.pokemon_id)

        },

        computed : {
            ...mapGetters({
                pokemon : 'getPokemon',
                user : 'getUser'
            })


        },

        methods :{

            ...mapActions({
                getPokemonData : 'getPokemonData',
                addPokemon : 'addUsersPokemon'
            }),

            addAsFavoritePokemon(){
                this.addPokemon(this.getData('favorite'))
            },

            addAsLikedPokemon(){
                this.addPokemon(this.getData('like'))
            },

            addAsHatedPokemon(){
                this.addPokemon(this.getData('hate'))
            },

            getData(mode){

                var data = new FormData()
                data.append('user_id',localStorage.getItem('user_id'))
                data.append('pokemon_id',this.pokemon_id)
                data.append('mode',mode)

                return data
            }
        }

    }
</script>
