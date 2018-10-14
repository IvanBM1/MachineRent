@extends('layouts.card')
@section('title','Cliente')
@section('card_title','Editar Cliente')
@section('card_content')

    <div class="row">
        <div class="input-field col s2 offset-s10">
            <form action="/client/{{$client->id}}" method="post">  @csrf @method('DELETE')
                <input type="submit" class="waves-effect waves-light red-text material-icons left" style="border: solid 1px; padding: 4px; border-radius: 2px; font-size: 1.2em;" value="Borrar">
            </form>
        </div>
    </div>


    <form action="/client/{{$client->id}}" method="post"> @csrf @method('PATCH')
        <div class="row">

            <div class="input-field col s12 m6 offset-m3">
                <i class="material-icons prefix">domain</i>
                <input id="name" type="text" class="validate" name="name" value="{{$client->name}}" >
                <label for="name">Nombre</label>
            </div>

            <div class="input-field col s12 m6 offset-m3" id="itemPhone">
                <i class="material-icons prefix">local_phone</i>
                <input id="phone" type="text" class="validate" name="phone" value="{{$client->phone}}">
                <label for="phone">Telefono</label>
            </div>

            <div class="input-field col s12 m6 offset-m3" id="itemPhone">
                <i class="material-icons prefix">email</i>
                <input id="email" type="text" class="validate" name="email" value="{{$client->email}}">
                <label for="email">Correo</label>
            </div>

            <div class="col s12 center-align">
                <input type="submit" value="Guardar" class="btn">
            </div>

        </div>
    </form>
     
@stop