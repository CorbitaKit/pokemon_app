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
                            <div class="col-md-2">
                                <div class="btn-group" role="group" aria-label="Basic example" v-if="! this.$route.path.includes('/home')">
                                    <button type="button" class="btn btn-warning" @click="addPokemon('favorite')">Favorite</button>
                                    <button type="button" class="btn btn-primary" @click="addPokemon('like')">Like</button>
                                    <button type="button" class="btn btn-danger" @click="addPokemon('hate')">Hate</button>
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
    import Swal from 'sweetalert2'
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
                addUsersPokemon : 'addUsersPokemon'
            }),

            addPokemon(mode){
                if(this.userCanAddPokemon(mode)){
                    if(! this.isAlreadyAttachedToUser()){


                        var data = new FormData()
                        data.append('user_id',localStorage.getItem('user_id'))
                        data.append('pokemon_id',this.pokemon_id)
                        data.append('mode',mode)
                        this.addUsersPokemon(data)

                        Swal.fire({
                            icon : 'success',
                            title : 'Success!',
                            text : this.pokemon.name+" is added as your "+mode+" pokemon"
                        })

                        this.$router.push('/pokemon')
                    }
                }



            },


            userCanAddPokemon(mode){
                if(mode === 'favorite'){
                    return this.checkForFavorite();
                }else if(mode === 'like'){
                    return this.checkPokemon(this.user.like,mode)
                }else if(mode === 'hate'){
                    return this.checkPokemon(this.user.hate,mode)
                }


            },

            checkForFavorite(){

                if(this.user.favorite){

                    Swal.fire({
                        icon : 'error',
                        title : 'Oops...',
                        text : 'You already added your favorite pokemon'
                    })
                    return false
                }

                return true
            },

            checkPokemon(pokemon,mode){

                if(pokemon.length == 3){
                    Swal.fire({
                        icon : 'error',
                        title : 'Ooops',
                        text : 'You already '+mode+'d 3 pokemons'
                    })

                    return false
                }
                return true
            },

            isAlreadyAttachedToUser(){


                //Check if pokemon is already added as favorite pokemon
                if(this.user.favorite){
                    if(this.user.favorite.pokemon_id == this.pokemon_id){
                        Swal.fire({
                            icon : 'error',
                            title : 'Ooops...',
                            text : 'This pokemon is already your favorite pokemon'
                        })
                        return true
                    }
                }

                //Check if pokemon is already added as liked pokemon

                if(this.user.like.length > 0){
                    for(var i = 0; i < this.user.like.length;i++){
                        if(this.user.like[i].pokemon_id == this.pokemon_id){
                            Swal.fire({
                                icon : 'error',
                                title : 'Ooops...',
                                text : 'This pokemon is already one of your liked pokemon'
                            })
                            return true
                        }
                    }
                }

                //check if pokemon is already added as hate pokemon
                if(this.user.hate.length > 0){
                    for(var i = 0; i < this.user.hate.length; i++){
                        if(this.user.hate[i].pokemon_id == this.pokemon_id){
                            Swal.fire({
                                icon : 'error',
                                title : 'Ooops...',
                                text : 'This pokemon is already one of your hated pokemon'
                            })
                            return true
                        }
                    }
                }

                return false
            }


        }

    }
</script>
