<template>
    <div>
        <slot name="favorite"></slot>
        <PokemonDataLayout :pokemon_id="pokemon_id"/>
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
