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
                        
                        <tml-select-profile></tml-select-profile>

                        <tml-adm-register  iptclass="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
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
                            
                        </tml-adm-register>
                        
                        <tml-adm-register iptclass="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
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
                            
                        </tml-adm-register>

                        <tml-adm-register iptclass="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
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
                        </tml-adm-register>   

                        <tml-adm-register iptclass="form-control" 
                                          iptvalue=""
                                          iptname="password_confirmation"
                                          iptlabel="Confirmar senha"
                                          iptid="password-confirm"
                                          ipttype="password">

                        </tml-adm-register>   

                        <!--div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div-->

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
