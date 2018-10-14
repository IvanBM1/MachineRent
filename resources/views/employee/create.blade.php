@extends('layouts.card')
@section('title','Cliente')
@section('card_title','Contacto')

@section('card_content')

    <form action="/employee" method="post"> @csrf
        <div class="row">

            <input type="hidden" value="{{$client->id}}" name="client_id">

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">face</i>
                    <input id="name" type="text" class="validate" name="name">
                    <label for="name">Nombre</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">portrait</i>
                    <input id="position" type="text" class="validate" name="position">
                    <label for="position">Cargo</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">contact_phone</i>
                    <input id="phone" type="text" class="validate" name="phone">
                    <label for="phone">Teléfono</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">contact_mail</i>
                    <input id="email" type="text" class="validate" name="email">
                    <label for="email">Correo</label>
                </div>
            </div>

            <div class="col s12 center-align">
                <input type="submit" value="Guardar" class="btn">
            </div>

        </div>
    </form>

@stop