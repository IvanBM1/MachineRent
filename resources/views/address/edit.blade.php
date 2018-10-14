@extends('layouts.card')
@section('title','Cliente')

@section('card_title','Dirección')

@section('card_content')
    <form id="formAddress" action="/address/{{$address->id}}" method="post"> @csrf @method('PATCH')
        <div class="row">

             <div class="row">            
                <div class="col s12 center-align"> <br> <br>
                    <label>
                        <input type="checkbox" class="filled-in" name="fiscal"/>
                        <span>Es Fiscal</span>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <input id="street" type="text" class="validate" name="street" value="{{$address->street}}">
                    <label for="street">Calle</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6 m3 offset-m3">
                    <input id="numberext" type="text" class="validate" name="numberext" value="{{$address->numberext}}">
                    <label for="numberext">Numero Exterior</label>
                </div>
                <div class="input-field col s6 m3">
                    <input id="numberint" type="text" class="validate" name="numberint" value="{{$address->numberint}}">
                    <label for="numberint">Numero Interior</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <input id="colony" type="text" class="validate" name="colony" value="{{$address->colony}}">
                    <label for="colony">Colonia</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m3 offset-m3">
                    <input id="state" type="text" class="validate" name="state" value="{{$address->state}}">
                    <label for="state">Estado</label>
                </div>

                <div class="input-field col s12 m3">
                    <input id="municipality" type="text" class="validate" name="municipality" value="{{$address->municipality}}"
                    <label for="municipality">Municipio</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m3 offset-m3">
                    <input id="cp" type="text" class="validate" name="cp" value="{{$address->cp}}">
                    <label for="cp">Código Postal</label>
                </div>

                <div class="input-field col s12 m3">
                    <input id="rfc" type="text" class="validate" name="rfc" value="{{$address->rfc}}">
                    <label for="rfc">RFC</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <input id="razon" type="text" class="validate" name="razon" value="{{$address->razon}}">
                    <label for="razon">Razón Social</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m3 offset-m3">
                    <input id="betweenstreet1" type="text" class="validate" name="betweenstreet1" value="{{$address->betweenstreet1}}">
                    <label for="betweenstreet1">Entre Calle</label>
                </div>

                <div class="input-field col s12 m3 ">
                    <input id="betweenstreet2" type="text" class="validate" name="betweenstreet2" value="{{$address->betweenstreet2}}">
                    <label for="betweenstreet2">Entre Calle</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <input id="references" type="text" class="validate" name="references" value="{{$address->references}}">
                    <label for="references">Referencias</label>
                </div>
            </div>

            <div class="col s12 center-align">
                <a href="#" id="submitAddress" class="btn">Guardar</a>
            </div>

        </div>
    </form>

    <script src="/js/setAddress.js"></script>
@stop