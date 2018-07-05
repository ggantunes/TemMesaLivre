<template>
<div><img v-bind:width="width" v-bind:src="src"/></div>
    
</template>

<script>
    export default {
        props:['src', 'width']
    }
</script>
