@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Escolha o perfil de cadastro') }}</div>

                <div class="card-body">                    
                    <div class="text-center">
                        <a class="btn btn-primary" href="{{ route('register') }}">Administrador</a>
                        <a class="btn btn-primary" href="{{ url('rhRegister') }}">RH</a>
                        <a class="btn btn-primary" href="{{ url('professionalRegister') }}">Profissional</a>
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
