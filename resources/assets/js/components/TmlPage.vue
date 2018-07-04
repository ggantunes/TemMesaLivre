<template>
    <div class="container">
        <div class="row">
            <div v-bind:class="sizeDefinition">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       props:['pagesize'],
       computed:{
        sizeDefinition: function(){
            console.log('this.pagesize',this.pagesize)
            if(this.pagesize >=12){
                return "col-md-12";
            }
            if(this.pagesize <=2){
                return "col-md-2 col-md-offset-5";
            }
            if((this.pagesize % 2) == 0){
                return "col-md-" +this.pagesize+ " col-md-offset-" +((12 - this.pagesize)/2);
            }else{
                return "col-md-" +(parseInt(this.pagesize) + 1)+ " col-md-offset-" +((12 - (parseInt(this.pagesize) + 1))/2);
            }
            return "col-md-4 col-md-offset-4";
        }
       }
    };
</script>
