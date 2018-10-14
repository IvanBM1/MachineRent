@extends('layouts.card')
@section('title','Usuario')

@section('card_title','Nueva Cuenta')

@section('card_content')
<form action="/user" method="post"> @csrf
    <div class="row col s12 m6 offset-m3">
        <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="name" type="text" class="validate" name="name">
            <label for="name">Nombre</label>
        </div>

        <div class="input-field col s12" id="itemPhone">
            <i class="material-icons prefix">email</i>
            <input id="email" type="text" class="validate" name="email">
            <label for="email">Correo</label>
        </div>

        <div class="input-field col s12" id="itemPhone">
            <i class="material-icons prefix">lock</i>
            <input id="lock" type="password" class="validate" name="password">
            <label for="lock">Contraseña</label>
        </div>

        <div class="input-field col s12">
            <select name="type">
            <option value="" disabled selected>Selecciona una opción</option>
            <option value="1">Todos los Permisos</option>
            <option value="2">Administrativo</option>
            <option value="3">Consultas</option>
            </select>
            <label>Tipo de Cuenta</label>
        </div>
    
        <div class="row center-align">
            <input type="submit" value="Registrar" class="btn">
        </div>
    </div>
    
</form>  
@stop