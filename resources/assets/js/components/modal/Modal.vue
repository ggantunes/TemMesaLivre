<template>
    <div class="modal fade" v-bind:id="name" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">            
                <div class="modal-header">
                    <h5 v-if="!icon" class="modal-title">{{title_header}}</h5>
                    <h5 v-if="icon" class="modal-title"><i class="fa fa-save"></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <div class="modal-footer">
                    <slot name="buttons"></slot>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['name', 'title_header', 'icon'],        
    };
</script>

