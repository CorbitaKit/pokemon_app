<template>
    <div>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">User List</div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Birthday</th>
                                <th scope="col">Favorite Pokemon</th>
                                <th scope="col">Liked Pokemon</th>
                                <th scope="col">Hated Pokemon</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(user,i) in users" :key="i">
                                    <td scope="row">
                                        {{ user.id}}
                                    </td>
                                    <td scope="row">
                                        {{ user.information.firstname}} {{ user.information.lastname }}
                                    </td>
                                    <td scope="row">
                                        {{ user.email}}
                                    </td>
                                    <td scope="row">
                                        {{ user.information.phone}}
                                    </td>
                                    <td scope="row">
                                        {{ user.information.gender}}
                                    </td>
                                    <td scope="row">
                                        {{ user.information.bday}}
                                    </td>
                                    <td scope="row">
                                        <div v-if="user.favorite">
                                            <a href="#" @click="viewPokemonData(user.favorite.pokemon_id)">{{ user.favorite.pokemon_name }}</a>
                                        </div>
                                        <div v-else>
                                            <span>---No Favorite Pokemon Yet---</span>
                                        </div>
                                    </td>
                                    <td scope="row">
                                        <div v-if="user.like.length > 0">
                                            <a href="#" @click="viewPokemonData(pokemon.pokemon_id)" v-for="(pokemon, i) in user.like" :key="i">
                                                {{ pokemon.pokemon_name}}
                                            </a>
                                        </div>
                                        <div v-else>
                                            <span>---No Liked Pokemon Yet</span>
                                        </div>
                                    </td>
                                    <td scope="row">
                                        <div v-if="user.hate.length > 0">
                                            <a href="#" @click="viewPokemonData(pokemon.pokemon_id)" v-for="(pokemon, i) in user.hate" :key="i">
                                                {{ pokemon.pokemon_name}}
                                            </a>
                                        </div>
                                        <div v-else>
                                            <span>---No Hated Pokemon Yet</span>
                                        </div>
                                    </td>


                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>



    </div>

</template>

<script>

    import {mapGetters,mapActions} from 'vuex';

    export default{
        computed:{
            ...mapGetters({
                users : 'getUsers',

            })
        },
        created(){
            this.getUserList()


        },
        methods : {
            ...mapActions({
                getUserList : 'fetchUsers'
            }),

            viewPokemonData(id){
                this.$router.push('/pokemon-information/'+id)
            }
        }
    }
</script>
