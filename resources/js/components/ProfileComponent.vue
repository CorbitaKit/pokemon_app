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
