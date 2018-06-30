<template>
    <button type="submit" v-on:click="register($event)" class="btn btn-primary">Enviar</button>
</template>

<script>
    export default {
        methods:{
            register:function(e){
                //e.preventDefault();
                console.log('cheguei')
            }
        }
    }
</script>

