<template>

    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header">My Profile</div>
                    <div class="card-body">
                        <img src="/images/boy.png" alt="..." class="img-thumbnail mb-3">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-left">
                                Email : {{ user.email}}

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-left">
                                Firstname : {{ user.information.firstname}}

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Lastname : {{ user.information.lastname}}

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Bday : {{ user.information.bday}}

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Gender : {{ user.information.gender}}

                            </li>

                             <li class="list-group-item d-flex justify-content-between align-items-center">
                                Phone : {{ user.information.phone}}

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        <div class="col-md-8">
        <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <span>Favorite Pokemon</span>
                            <table class="table table-bordered" v-if="user.favorite">
                                <tbody>
                                    <tr>
                                        <th>{{ user.favorite.pokemon_id}}</th>
                                        <td>
                                            <a href="#" @click="getPokemonData(user.favorite.pokemon_id)">{{ user.favorite.pokemon_name}}</a>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <span>Liked Pokemon</span>
                            <table class="table table-bordered" v-if="user.like">
                                <tbody>
                                    <tr v-for="(pokemon,i) in user.like" :key="i">
                                        <th>{{ pokemon.pokemon_id}}</th>
                                        <td>
                                            <a href="#" @click="getPokemonData(pokemon.pokemon_id)">
                                                {{ pokemon.pokemon_name}}
                                            </a>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <span>Hated Pokemon</span>
                            <table class="table table-bordered" v-if="user.hate">
                                <tbody>
                                    <tr v-for="(pokemon,i) in user.hate" :key="i">
                                        <th>{{ pokemon.pokemon_id}}</th>
                                        <td>
                                            <a href="#" @click="getPokemonData(pokemon.pokemon_id)">{{  pokemon.pokemon_name }}</a>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form>
                                <div class="row mb-2">
                                    <div class="col">
                                        <label>Firstname</label>
                                        <input type="text" class="form-control" v-model="user.information.firstname" placeholder="First name">
                                    </div>
                                    <div class="col">
                                        <label>Lastname</label>
                                        <input type="text" class="form-control" v-model="user.information.lastname" placeholder="Last name">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <label>Email</label>
                                        <input disabled type="text" class="form-control" v-model="user.email" placeholder="Email Address">
                                    </div>
                                    <div class="col">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" v-model="user.information.phone" placeholder="Last name">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col">
                                        <label>Gender</label>
                                        <select v-model="user.information.gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label>Birthday</label>
                                        <input type="date" v-model="user.information.bday" class="form-control" placeholder="Last name">
                                    </div>
                                </div>
                                <div class="row mb-2">

                                    <div class="col pull-right">
                                        <button class="btn btn-primary" @click="updateUser" type="button">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import Avatar from 'vue-avatar'
    import {mapGetters,mapActions} from 'vuex'
    import Swal from 'sweetalert2'

    export default{
        data(){
            return{

                user_id : $("#user_id").val(),
                sample : '01-18-1992'
            }
        },

        components : {
            Avatar,

        },

        computed : {
            ...mapGetters({
                user : 'getUser',
            })
        },

        created(){
            this.getUser(this.user_id)
            localStorage.setItem('user_id',this.user_id)
        },

        methods : {
            ...mapActions({
                getUser : 'getUser',
                updateUserInfo : 'updateUserInformation'
            }),

            getPokemonData(id){
                this.$router.push('/pokemon-information/'+id)
            },

            updateUser(){
                this.updateUserInfo(this.user.information)

                Swal.fire({
                    icon : 'success',
                    title : 'Success!',
                    text : 'User information updated successfully!'
                })

            }
        }


    }

</script>
