@extends('layouts.app')

@section('content')
<tml-page pagesize="10">
    <tml-panel title="Dashboard">
        <div class="row">
            @can('admin')
            <div class="col-md-4">
                <tml-box qtd="{{$totalLocals}}" title="Cadastro de Lugares" url="{{route('places.index')}}" color="orange" icon="fa fa-map-marker"></tml-box>
            </div>
            @endcan
            @can('professional')
            <div class="col-md-12">
                <h2>Bem Vindo {{Auth::user()->name}}! Em breve teremos novidades...</h2>
            </div>
            @endcan
             @can('rh')
            <div class="col-md-12">
                <h2>Bem Vindo {{Auth::user()->name}}! Em breve teremos novidades...</h2>
            </div>
            @endcan
        </div>
    </tml-panel>
</tml-page>
@endsection
