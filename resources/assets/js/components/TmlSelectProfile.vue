<template>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Perfil</label>

        <div class="col-md-6">
            <p>{{this.$store.state.profile}}</p>
            <select v-on:change="selectProfile($event)" class="form-control" name="profile">
                <option value="">Selecione o tipo de perfil</option>
                <option value="1">Administrador</option>
                <option value="2">RH</option>
                <option value="3">Profissional</option>
            </select>                                
        </div>
    </div>
</template>

<script>
    export default {
        methods:{
            selectProfile: function (e) {
                this.$store.state.profile = e.target.value
                console.log(e.target.value)
            }
        }
    }
</script>

