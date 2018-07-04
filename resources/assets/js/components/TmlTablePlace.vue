<template>
    <div>
        
                        
        
        <div class="form-group pull-right">                
            <input type="search" placeholder="Buscar" class="form-control" v-model="buscar">
        </div>
            
        <br>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th style="cursor:pointer" v-on:click="orderColumn(index)" v-for="(titulo, index) in titles">{{titulo}}</th>                    
                    <th v-if="(detalhe || editar || deletar)">Ação</th>
                </tr>
            </thead>
            <tbody>                
                <tr v-for="(item, index) in lista">
                    <td v-for="i in item">{{i | formataData}}</td>
                    <td v-if="(detalhe || editar || deletar)">
                        <!-- Implements delete action -->
                        <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar + item.id" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">

                            <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                            <tml-modallink v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe" tipo="link" nome="detalhe" titulo=" Detalhe |" css=""></tml-modallink>

                            <a v-if="editar && !modal" v-bind:href="editar"> Editar |</a>
                            <tml-modallink v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo="link" nome="editar" titulo=" Editar |" css=""></tml-modallink>
                            <a href="#" v-on:click="execForm(index)">Deletar</a>
                        </form>

                        <span v-if="!token">
                            <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                            <tml-modallink v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe" tipo="link" nome="detalhe" titulo=" Detalhe |" css=""></tml-modallink>

                            <a v-if="editar && !modal" v-bind:href="editar"> Editar |</a>
                            <tml-modallink v-if="editar && modal" tipo="link" v-bind:item="item" v-bind:url="editar" nome="editar" titulo=" Editar |" css=""></tml-modallink>
                            <a v-if="deletar" v-bind:href="deletar">Deletar</a>
                        </span>
                        <span v-if="token && !deletar">
                            <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                            <tml-modallink v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe" tipo="link" nome="detalhe" titulo=" Detalhe |" css=""></tml-modallink>

                            <a v-if="editar && !modal" v-bind:href="editar"> Editar</a>
                            <tml-modallink v-if="editar && modal" tipo="link" v-bind:item="item" v-bind:url="editar" nome="editar" titulo=" Editar" css=""></tml-modallink>
                        </span>
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titles', 'itens', 'ordem', 'ordemcol', 'criar', 'detalhe', 'editar', 'deletar', 'token', 'modal'],
        data: function function_name() {
            return{
                buscar:"",
                ordemAux: this.ordem || "asc",
                ordemAuxCol: this.ordemcol || 0
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
            formataData: function(valor){
                if(!valor) return "";    

                valor = valor.toString();
                if(valor.split('-').length == 3){
                    valor = valor.split('-');
                    return valor[2]+'/'+ valor[1]+'/'+valor[0];
                }
                return valor;
                
                
            }
        },
        computed:{
            lista:function(){
                let lista = this.itens;
                let ordem = this.ordemAux;
                let ordemCol = this.ordemAuxCol;
                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if(ordem == "asc"){
                    lista.sort(function (a,b) {
                    if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {return 1};
                    if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {return -1};
                    return 0;
                    });
                }else{
                    lista.sort(function (a,b) {
                        if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {return 1};
                        if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {return -1};
                        return 0;
                    });
                }
                
                if(this.buscar){
                    return lista.filter(res => {
                        res = Object.values(res);
                        for(let k = 0; k < res.length; k++){
                            if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                                return true;    
                            }    
                        }
                    return false;
                    }) ;
                }
                
                return lista;
            }
        }
    };
</script>
    