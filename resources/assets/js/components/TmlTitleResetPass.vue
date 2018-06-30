<template>
    <div class="col-md-1">
        <i class="fa fa-question" 
            v-bind:title="titletext" style="margin:10px 0 0 -15px">
        </i>
    </div>
</template>

<script>
    export default {
        
        props:['titletext'],
        mounted() {
            console.log(this.titletext);
        }
    }
</script>

