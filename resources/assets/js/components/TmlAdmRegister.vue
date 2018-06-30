<template>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{iptlabel}}</label>

        <div class="col-md-6">
            <input v-bind:id="iptid" v-bind:type="ipttype" v-bind:class="iptclass" v-bind:name="iptname" v-bind:value="iptvalue" required autofocus>
            <slot></slot>
        </div>
        <slot name="title"></slot>
    </div>
</template>

<script>
    export default {
        props:['iptclass', 'iptvalue', 'iptname', 'iptlabel', 'iptid', 'ipttype']
    }
</script>
