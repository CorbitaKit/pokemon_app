export default{

    setUser : (state,payload)=>{
        state.user = payload
    },

    setPokemons:(state,payload)=>{
        state.pokemons.push(...payload)
    },

    setPokemon:(state,payload)=>{
        state.pokemon = payload
    },

    setUsers:(state,payload)=>{
        state.users = payload
    }
}
