<template>
    <div>
        <PokemonDataLayout :pokemon_id="pokemon_id"></PokemonDataLayout>
    </div>
</template>

<script>

    import PokemonDataLayout from './../pokemon/PokemonDataComponent'

    export default{

        props : ['pokemon_id'],

        components : {
            PokemonDataLayout
        },


    }

</script>
