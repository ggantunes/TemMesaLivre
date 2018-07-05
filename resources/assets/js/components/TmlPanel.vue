<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{title}}</h5>            
            <slot></slot>                  
        </div>
    </div>
</template>
<script>
    export default {
        props: ['title', 'color'],
        
    };

</script>