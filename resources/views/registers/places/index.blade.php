@extends('layouts.app')

@section('content')

<tml-page pagesize="12">
    <!--list error message -->
    @if($errors->all())
        <div class="alert alert-danger alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden></span></button>
                @foreach($errors->all() as $key =>$value)
                    <li>{{$value}}</li>   
                @endforeach
        </div>
    @endif
    <!--end list error message -->

    <tml-panel title="Lista de Lugares">
        <tml-table-place
            v-bind:titles="['#', 'Descrição', 'Endereço', 'Cidade', 'Mesas', 'Cadeiras', 'Custo', 'Período Disp', 'Hora Disp']"
            v-bind:items="{{ json_encode($modelList) }}"
            order="desc" ordercol="1"
            create="#create" datail="/admin/places/" edit="/admin/places/" todelete="/admin/places/" 
            token="{{ csrf_token() }}" modal="sim">
        </tml-table-place>
        <!--paginate-->
        <div class="float-right">
            {{$modelList}}
        </div>
        <!--end paginate-->
        </tml-panel>
</tml-page>

<tml-modal name="adicionar" title_header="Adicionar">
    <tml-form id="formAdd" class="" action="{{route('places.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">
        <div class="form-group">
            <tml-local-desc title="Descrição do local" name="descricao" v-bind:items="{{ $localDescription }}"></tml-local-desc>
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="{{old('endereco')}}">
        </div>
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="{{old('cidade')}}">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="{{old('estado')}}">
        </div>
        <div class="form-group">
            <label for="qtd_mesas">Quantidade de mesas</label>
            <input type="number" class="form-control" id="qtd_mesas" name="qtd_mesas" placeholder="Digite a quantidade de mesas" value="{{old('qtd_mesas')}}">
        </div>
        <div class="form-group">
            <label for="qtd_cadeiras">Quantidade de mesas</label>
            <input type="number" class="form-control" id="qtd_cadeiras" name="qtd_cadeiras" placeholder="Digite a quantidade de cadeiras" value="{{old('qtd_cadeiras')}}">
        </div>
        <div class="form-group">
            <label for="custo_hora">Custo por hora alocada</label>
            <input type="number" class="form-control" id="custo_hora" name="custo_hora" placeholder="Digite custo/hora" value="{{old('custo_hora')}}">
        </div>
        <div class="form-group">
            <label for="periodo_disponivel">Período disponível</label>
            <input type="datetime-local" class="form-control" id="periodo_disponivel" name="periodo_disponivel" placeholder="Digite o período disponível" value="{{old('periodo_disponivel')}}">
        </div>
        <div class="form-group">
            <label for="horario_disponivel">Horário disponível</label>
            <input type="text" class="form-control" id="horario_disponivel" name="horario_disponivel" placeholder="Digite o horário disponível" value="{{old('horario_disponivel')}}">
        </div>
        <div class="form-group">
            <input type="file" name="image" class="form-control">
        </div>
    </tml-form>

    <span slot="buttons">
        <button form="formAdd" class="btn btn-success">Adicionar</button>
    </span>
    
</tml-modal>

<tml-modal name="editar" title_header="Editar">
    <tml-form id="formEdit" v-bind:action="'/admin/places/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
        <div class="form-group">
            <tml-local-desc title="Descrição do local" name="descricao" v-bind:selected="$store.state.item.descricao" v-bind:items="{{ $localDescription }}"></tml-local-desc>
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" v-model="$store.state.item.endereco" placeholder="Endereço">            
        </div>
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" v-model="$store.state.item.cidade" placeholder="Cidade">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" v-model="$store.state.item.estado" placeholder="Estado">
        </div>
        <div class="form-group">
            <label for="qtd_mesas">Quantidade de mesas</label>
            <input type="number" class="form-control" id="qtd_mesas" name="qtd_mesas" v-model="$store.state.item.qtd_mesas" placeholder="Digite a quantidade de mesas">
        </div>
        <div class="form-group">
            <label for="qtd_cadeiras">Quantidade de mesas</label>
            <input type="number" class="form-control" id="qtd_cadeiras" name="qtd_cadeiras" v-model="$store.state.item.qtd_cadeiras" placeholder="Digite a quantidade de cadeiras">
        </div>
        <div class="form-group">
            <label for="custo_hora">Custo por hora alocada</label>
            <input type="number" class="form-control" id="custo_hora" name="custo_hora" v-model="$store.state.item.custo_hora" placeholder="Digite custo/hora">
        </div>
        <div class="form-group">
            <label for="periodo_disponivel">Período disponível</label>
            <input type="datetime-local" class="form-control" id="periodo_disponivel" name="periodo_disponivel" v-model="$store.state.item.periodo_disponivel" placeholder="Digite o período disponível">
        </div>
        <div class="form-group">
            <label for="horario_disponivel">Horário disponível</label>
            <input type="text" class="form-control" id="horario_disponivel" name="horario_disponivel" v-model="$store.state.item.horario_disponivel" placeholder="Digite o horário disponível">
        </div>
        <div class="form-group">
            <input type="file" name="image" value="$store.state.item.horario_disponivel" class="form-control">
        </div>
    </tml-form>
    <span slot="buttons">
        <button form="formEdit" class="btn btn-success">Salvar</button>
    </span>
</tml-modal>

<tml-modal name="detalhe" v-bind:title_header="$store.state.item.endereco">
    <p>@{{$store.state.item.cidade}}</p>
        <tml-image v-bind:src="$store.state.item.image"></tml-image>
    </p>
</tml-modal>
    
@endsection
