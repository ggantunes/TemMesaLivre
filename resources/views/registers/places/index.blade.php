@extends('layouts.app')

@section('content')

<tml-page pagesize="12">
    <tml-panel title="Lista de Lugares">
        <tml-modallink tipo="link" nome="mdtest" titulo="criar" css=""></tml-modallink>

        <tml-table-place
            v-bind:titles="['#', 'Título', 'Descrição']"
            v-bind:itens="[[1, 'mesa 1', 'faria lima'],[2, 'mesa lisa', 'av paulista']]"
            ordem="desc" ordemcol="1"
            criar="#criar" detalhe="/admin/artigos/" editar="/admin/artigos/" deletar="/admin/artigos/" 
            token="{{ csrf_token() }}" modal="sim"></tml-table-place>
        </tml-panel>
</tml-page>

<tml-modal nome="mdtest">
    <tml-form class="" action="#" method="put" enctype="multipart/form-data" token="">
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="email" class="form-control" id="titulo" name="titulo" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="email" class="form-control" id="descricao" name="descricao" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <button class="btn btn-success">Adicionar</button>
    </tml-form>
</tml-modal>
    
@endsection
