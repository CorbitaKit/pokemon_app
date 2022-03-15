import axios from 'axios'

export default{

    getUser : ({commit},payload)=>{

        axios.get('/api/get-user-info/'+payload)
        .then(response=>{
            commit('setUser',response.data)
        })
    },

    async fetchPokemons({commit},payload){
        let result = await axios.get('/api/get-pokemon-list/'+payload)

        commit('setPokemons',result.data.results)
    },

    async getPokemonData({commit},payload){
        let  result = await axios.get('/api/get-pokemon/'+payload)

        commit('setPokemon',result.data)
    },

    addUsersPokemon : ({dispatch,state},payload)=>{

        axios.post('/api/add-users-pokemon',payload)
        .then(response=>{
            dispatch('getUser',state.user.id)
        })
    },


}
