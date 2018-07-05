<template>
    <div>
        <label for="titulo">{{title}}</label>
        <select v-bind:name="name" :value="selected" class="form-control">
            <option v-for="item in items"  v-bind:value="item.id">{{item.descricao}}</option>
        </select>
    </div>
</template>

<script>
    export default {
        props:['title','items', 'name', 'selected'],   
    }
</script>
