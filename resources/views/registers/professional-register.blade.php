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
                            <input type="hidden" name="profile" value="3">
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

                            <tml-input iptclass="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                            iptvalue="{{ old('name') }}"
                                            iptname="name"
                                            iptlabel="Nome"
                                            iptid="name"
                                            ipttype="text">
                                
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </tml-input>

                            

                            <tml-input iptclass="form-control{{ $errors->has('cel') ? ' is-invalid' : '' }}" 
                                            iptvalue="{{ old('cel') }}"
                                            iptname="cel"
                                            iptlabel="Nrº Celular"
                                            iptid="cel"
                                            ipttype="text">
                                
                                @if ($errors->has('cel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cel') }}</strong>
                                    </span>
                                @endif
                            </tml-input>

                            <tml-input iptclass="form-control{{ $errors->has('itr') ? ' is-invalid' : '' }}" 
                                            iptvalue="{{ old('itr') }}"
                                            iptname="itr"
                                            iptlabel="CPF"
                                            iptid="itr"
                                            ipttype="text">
                                
                                @if ($errors->has('itr'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('itr') }}</strong>
                                    </span>
                                @endif
                            </tml-input>

                            <tml-input iptclass="form-control{{ $errors->has('nic') ? ' is-invalid' : '' }}" 
                                            iptvalue="{{ old('nic') }}"
                                            iptname="nic"
                                            iptlabel="RG"
                                            iptid="nic"
                                            ipttype="text">
                                
                                @if ($errors->has('nic'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nic') }}</strong>
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
                                <tml-register></tml-register>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
