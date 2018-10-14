@extends('layouts.card')
@section('title','Cliente')
@section('card_title','Nuevo Cliente')
@section('card_content')

    <form action="/client" method="post"> @csrf
            <div class="row">

                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">domain</i>
                    <input id="name" type="text" class="validate" name="name">
                    <label for="name">Nombre</label>
                </div>

                <div class="input-field col s12 m6 offset-m3" id="itemPhone">
                    <i class="material-icons prefix">local_phone</i>
                    <input id="phone" type="text" class="validate" name="phone">
                    <label for="phone">Telefono</label>
                </div>

                <div class="input-field col s12 m6 offset-m3" id="itemPhone">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="text" class="validate" name="email">
                    <label for="email">Correo</label>
                </div>

                <div class="col s12 center-align">
                    <input type="submit" value="Guardar" class="btn">
                </div>

            </div>
    </form>
     
@stop