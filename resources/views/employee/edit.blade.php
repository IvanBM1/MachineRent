@extends('layouts.card')
@section('title','Cliente')
@section('card_title','Contacto')

@section('card_content')

    <form action="/employee/{{$employee->id}}" method="post"> @csrf @method('PATCH')
        <div class="row">

            <input type="hidden" name="client_id" value="{{$employee->client_id}}">

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">face</i>
                    <input id="name" type="text" class="validate" name="name" value="{{$employee->name}}">
                    <label for="name">Nombre</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">portrait</i>
                    <input id="position" type="text" class="validate" name="position" value="{{$employee->position}}">
                    <label for="position">Cargo</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">contact_phone</i>
                    <input id="phone" type="text" class="validate" name="phone" value="{{$employee->phone}}">
                    <label for="phone">Teléfono</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">contact_mail</i>
                    <input id="email" type="text" class="validate" name="email" value="{{$employee->email}}">
                    <label for="email">Correo</label>
                </div>
            </div>

            <div class="col s12 center-align">
                <input type="submit" value="Guardar" class="btn">
            </div>

        </div>
    </form>

@stop