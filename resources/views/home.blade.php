@extends('layouts.app')

@section('content')
<tml-page pagesize="10">
    <tml-panel title="Dashboard">
    <div class="row">
        @can('admin')
        <div class="col-md-4">
            <tml-caixa qtd="{{$totalLocals}}" titulo="Cadastro de Lugares" url="{{route('places.index')}}" cor="orange" icone="fa fa-map-marker"></tml-caixa>
        </div>
        @endcan
    </div>
    <tml-panel>
</tml-page>
@endsection
