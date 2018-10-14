@extends('layouts.card')
@section('title','Cliente')

@section('card_title','Dirección')

@section('card_content')
    <form id="formAddress" action="/address" method="post"> @csrf
        <div class="row">

            <input type="hidden" value="{{$client->id}}" name="client_id">

            <div class="row">            
                <div class="col s12 center-align"> <br> <br>
                    <label>
                        <input id="fiscal" type="checkbox" class="filled-in" name="fiscal"/>
                        <span>Es Fiscal</span>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <input id="street" type="text" class="validate" name="street">
                    <label for="street">Calle</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6 m3 offset-m3">
                    <input id="numberext" type="text" class="validate" name="numberext">
                    <label for="numberext">Numero Exterior</label>
                </div>
                <div class="input-field col s6 m3">
                    <input id="numberint" type="text" class="validate" name="numberint">
                    <label for="numberint">Numero Interior</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <input id="colony" type="text" class="validate" name="colony">
                    <label for="colony">Colonia</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12 m3 offset-m3">
                    <input id="state" type="text" class="validate" name="state">
                    <label for="state">Estado</label>
                </div>

                <div class="input-field col s12 m3">
                    <input id="municipality" type="text" class="validate" name="municipality">
                    <label for="municipality">Municipio</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12 m3 offset-m3">
                    <input id="cp" type="text" class="validate" name="cp">
                    <label for="cp">Código Postal</label>
                </div>

                <div class="input-field col s12 m3">
                    <input id="rfc" type="text" class="validate" name="rfc">
                    <label for="rfc">RFC</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <input id="razon" type="text" class="validate" name="razon">
                    <label for="razon">Razón Social</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12 m3 offset-m3">
                    <input id="betweenstreet1" type="text" class="validate" name="betweenstreet1">
                    <label for="betweenstreet1">Entre Calle</label>
                </div>


                <div class="input-field col s12 m3 ">
                    <input id="betweenstreet2" type="text" class="validate" name="betweenstreet2">
                    <label for="betweenstreet2">Entre Calle</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <input id="references" type="text" class="validate" name="references">
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