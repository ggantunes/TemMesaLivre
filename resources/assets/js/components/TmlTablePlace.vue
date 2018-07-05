<template>
    <div>
        <a v-if="create && !modal" v-bind:href="create">Adicionar</a>
            <tml-modallink v-if="create && modal" tipo="botao" nome="adicionar" titulo="Adicionar" css=""></tml-modallink>
        <div class="form-group pull-right">                
            <input type="search" placeholder="Buscar" class="form-control" v-model="buscar">
        </div>
            
        <br>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th style="cursor:pointer" v-on:click="orderColumn(index)" v-for="(titulo, index) in titles">{{titulo}}</th>                    
                    <th v-if="(datail || edit || todelete)">Ação</th>
                </tr>
            </thead>
            <tbody>                
                <tr v-for="(item, index) in objList">
                    <td v-for="i in item">{{i | dateFormat}}</td>
                    <td v-if="(datail || edit || todelete)">
                        <!-- Implements delete action -->
                        <form v-bind:id="index" v-if="todelete && token" v-bind:action="todelete + item.id" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">

                            <a v-if="datail && !modal" v-bind:href="datail">Detalhe |</a>
                            <tml-modallink v-if="datail && modal" v-bind:item="item" v-bind:url="datail" tipo="link" nome="detalhe" titulo=" Detalhe |" css=""></tml-modallink>

                            <a v-if="edit && !modal" v-bind:href="edit"> Editar |</a>
                            <tml-modallink v-if="edit && modal" v-bind:item="item" v-bind:url="edit" tipo="link" nome="editar" titulo=" Editar |" css=""></tml-modallink>
                            <a href="#" v-on:click="execForm(index)">Deletar</a>
                        </form>

                        <span v-if="!token">
                            <a v-if="datail && !modal" v-bind:href="datail">Detalhe |</a>
                            <tml-modallink v-if="datail && modal" v-bind:item="item" v-bind:url="datail" tipo="link" nome="detalhe" titulo=" Detalhe |" css=""></tml-modallink>

                            <a v-if="edit && !modal" v-bind:href="edit"> Editar |</a>
                            <tml-modallink v-if="edit && modal" tipo="link" v-bind:item="item" v-bind:url="edit" nome="editar" titulo=" Editar |" css=""></tml-modallink>
                            <a v-if="todelete" v-bind:href="todelete">Deletar</a>
                        </span>
                        <span v-if="token && !todelete">
                            <a v-if="datail && !modal" v-bind:href="datail">Detalhe |</a>
                            <tml-modallink v-if="datail && modal" v-bind:item="item" v-bind:url="datail" tipo="link" nome="detalhe" titulo=" Detalhe |" css=""></tml-modallink>

                            <a v-if="edit && !modal" v-bind:href="edit"> Editar</a>
                            <tml-modallink v-if="edit && modal" tipo="link" v-bind:item="item" v-bind:url="edit" nome="editar" titulo=" Editar" css=""></tml-modallink>
                        </span>
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titles', 'items', 'order', 'ordercol', 'create', 'datail', 'edit', 'todelete', 'token', 'modal'],
        data: function function_name() {
            return{
                buscar:"",
                ordemAux: this.order || "asc",
                ordemAuxCol: this.ordercol || 0
            }
        },
        methods:{
            execForm: function(index){
                document.getElementById(index).submit();
            },
            orderColumn: function(coluna){
                this.ordemAuxCol = coluna;
                if(this.ordemAux.toLowerCase() == "asc"){
                    this.ordemAux = "desc";
                }else{
                    this.ordemAux = "asc";
                }
            }
        },
        filters:{
            //date format 
            dateFormat: function(val){
                if(!val) return "";    
                val = val.toString();
                if(val.split('-').length == 3){
                    val = val.split('-');                    
                    return val[2].substr(0,2)+'/'+ val[1]+'/'+val[0];
                }
                return val;
            }
        },
        computed:{
            objList:function(){
                let list = this.items.data;
                let order = this.ordemAux;
                let ordemCol = this.ordemAuxCol;
                order = order.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if(order == "asc"){
                    list.sort(function (a,b) {
                    if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {return 1};
                    if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {return -1};
                    return 0;
                    });
                }else{
                    list.sort(function (a,b) {
                        if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {return 1};
                        if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {return -1};
                        return 0;
                    });
                }
                
                if(this.buscar){
                    return list.filter(res => {
                        res = Object.values(res);
                        for(let k = 0; k < res.length; k++){
                            if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                                return true;    
                            }    
                        }
                    return false;
                    });
                }
                
                return list;
            }
        }
    };
</script>
    