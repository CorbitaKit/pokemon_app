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
           <div class="card text-center">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#personalInfo" aria-expanded="true" aria-controls="personalInfo">
                                    Personal Information
                                    </button>
                                </h2>
                            </div>
                            <div id="personalInfo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#favoritePokemon" aria-expanded="false" aria-controls="favoritePokemon">
                                    Favorite Pokemon
                                    </button>
                                </h2>
                            </div>
                            <div id="favoritePokemon" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <UserFavorite v-if="user.favorite" :pokemon_id="1"></UserFavorite>
                                    <div v-else>
                                        <p>---No Data Yet---</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#likedPokemon" aria-expanded="false" aria-controls="likedPokemon">
                                    Liked Pokemon
                                    </button>
                                </h2>
                            </div>
                            <div id="likedPokemon" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <!-- <UserLike  :user_like="user.like"></UserLike> -->

                                     <!-- <UserLike :pokemon_id="2"></UserLike> -->
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#hatedPokemon" aria-expanded="false" aria-controls="hatedPokemon">
                                    Hated Pokemon
                                    </button>
                                </h2>
                            </div>
                            <div id="hatedPokemon" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
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
    import Avatar from 'vue-avatar'
    import {mapGetters,mapActions} from 'vuex'
    import UserFavorite from './user/UserFavoritePokemonComponent.vue'
    import UserLike from './user/UserLikedPokemonComponent.vue'

    export default{
        data(){
            return{

                user_id : $("#user_id").val(),
            }
        },

        components : {
            Avatar,
            UserFavorite,
            UserLike
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
                getUser : 'getUser'
            })
        }


    }

</script>
