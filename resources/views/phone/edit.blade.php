@extends('layouts.card')
@section('title','Cliente')
@section('card_title','Editar Número')
@section('card_content')

 <form action="/phone/{{$phone->id}}" method="post"> @csrf @method('PATCH')

    <input type="hidden" value="{{$client->id}}" name="client_id">

    <div class="modal-content">
        <div class="row">
            <div class="input-field col s12 m6 offset-m3">
                <i class="material-icons prefix">bookmark</i>
                <input id="razon" type="text" class="validate" name="razon" value="{{$phone->razon}}">
                <label for="razon">Etiqueta</label>
            </div>

            <div class="input-field col s12 m6 offset-m3">
                <i class="material-icons prefix">local_phone</i>
                <input id="number" type="text" class="validate" name="number" value="{{$phone->number}}">
                <label for="number">Número</label>
            </div>
        </div>
    </div>
    <div class="modal-footer center-align">
        <input type="submit" class="btn" value="Guardar">
    </div>
    </div>
</form>
@stop