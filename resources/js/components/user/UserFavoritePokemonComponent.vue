<template>
    <div>
        <PokemonDataLayout :pokemon_id="pokemon_id"></PokemonDataLayout>
    </div>
</template>


<script>


    import PokemonDataLayout from './../pokemon/PokemonDataComponent'
    export default{
        name : 'users-favorite',

        components : {
            PokemonDataLayout
        },

        props : ['pokemon_id'],


    }

</script>
