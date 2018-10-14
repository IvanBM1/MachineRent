@extends('layouts.main')
@section('title','Zeicom')

@section('content')

    <nav>
        <div class="nav-wrapper indigo darken-1">
        <a href="/" class="brand-logo" style="margin-left: 16px;">Zeycom</a>
    </nav>

   @include('partials.message') 
   @include('partials.merror') 
    
   <div class="container valign-wrapper" style="height: calc(100vh - 64px);"><br>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title center-align">Iniciar Sesión</span>
                        <div class="row">
                            <form action="/login" method="post"> @csrf

                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="name" type="text" class="validate" name="name">
                                    <label for="name">Nombre</label>
                                </div>

                                <div class="input-field col s12" id="itemPhone">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="lock" type="password" class="validate" name="password">
                                    <label for="lock">Contraseña</label>
                                </div>
                                <div class="row center-align">
                                    <input type="submit" value="Entrar" class="btn">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop