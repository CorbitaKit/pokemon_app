import Vue from 'vue'
import Vuex from 'vuex'


import getters from './getters'
import mutations from './mutations'
import actions from './actions'

Vue.use(Vuex);

const state = {
    user : [],
    top_favorite_pokemons : [],
    top_liked_pokemoons : [],
    top_hated_pokemons : [],
    pokemons : [],
    pokemon :  [],
    users : [],


}

export default new  Vuex.Store({
    state,
    getters,
    mutations,
    actions
})
