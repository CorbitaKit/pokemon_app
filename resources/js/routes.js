import Vue from 'vue';
import VueRouter from 'vue-router';

//Components

import ProfileLayout from './components/ProfileComponent';
import PokemonLayout from './components/pokemon/PokemonListComponent';
import PokemonInfoLayout from './components/pokemon/PokemonDataComponent';
import UserListLayout from './components/user/UserListComponent';
Vue.use(VueRouter);

const routes = [
    {
        path : '/home',
        component : ProfileLayout
    },
    {
        path : '/pokemon',
        component : PokemonLayout
    },
    {
        path : '/pokemon-information/:pokemon_id',
        component : PokemonInfoLayout,
        props : true
    },
    {
        path : '/user-list',
        component : UserListLayout
    }
]

export default new VueRouter({routes,mode:'history',base : __dirname})
