@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Perfil') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                            <input type="hidden" name="profile" value="2">
                            <tml-input iptclass="form-control{{ $errors->has('userName') ? ' is-invalid' : '' }}" 
                                            iptvalue="{{ old('userName') }}"
                                            iptname="userName"
                                            iptlabel="Nome de Usuário"
                                            iptid="userName"
                                            ipttype="text">
                                
                                @if ($errors->has('userName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('userName') }}</strong>
                                    </span>
                                @endif
                            </tml-input>

                            <tml-input iptclass="form-control{{ $errors->has('companyName') ? ' is-invalid' : '' }}" 
                                            iptvalue="{{ old('companyName') }}"
                                            iptname="companyName"
                                            iptlabel="Razão Social"
                                            iptid="companyName"
                                            ipttype="text">
                                
                                @if ($errors->has('companyName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('companyName') }}</strong>
                                    </span>
                                @endif
                            </tml-input>

                            <tml-input iptclass="form-control{{ $errors->has('ctr') ? ' is-invalid' : '' }}" 
                                            iptvalue="{{ old('ctr') }}"
                                            iptname="ctr"
                                            iptlabel="CNPJ"
                                            iptid="ctr"
                                            ipttype="text">
                                
                                @if ($errors->has('ctr'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ctr') }}</strong>
                                    </span>
                                @endif
                            </tml-input>

                            <tml-input iptclass="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                            iptvalue="{{ old('email') }}"
                                            iptname="email"
                                            iptlabel="E-mail"
                                            iptid="email"
                                            ipttype="text">
                                
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                
                            </tml-input>

                            <tml-input iptclass="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                            iptvalue="{{ old('password') }}"
                                            iptname="password"
                                            iptlabel="Senha"
                                            iptid="password"
                                            ipttype="password">
                                
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                
                                <span slot="title">
                                    <tml-title-reset-pass titletext="A senha deve conter ao menos uma letra maiúscula, um número e umcaracter especial."></tml-title-reset-pass>
                                </span>
                            </tml-input>   

                            <tml-input iptclass="form-control" 
                                            iptvalue=""
                                            iptname="password_confirmation"
                                            iptlabel="Confirmar senha"
                                            iptid="password-confirm"
                                            ipttype="password">

                            </tml-input>   
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <tml-register ></tml-register>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
