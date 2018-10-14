@extends('layouts.card')
@section('title','Maquinas')
@section('card_title','Maquinas')
@section('card_content')

    <form action="/machine/{{$machine->id}}" method="post"> @csrf @method('PATCH')
        
        <div class="row">
            <div class="input-field col s12 m4 offset-m1">
                <input id="economic" type="text" class="validate" name="economic" value="{{$machine->economic}}">
                <label for="economic">Número Económico</label>
            </div>

            <div class="input-field col s12 m4 offset-m1">
                <input id="brand" type="text" class="validate" name="brand" value="{{$machine->brand}}">
                <label for="brand">Marca</label>
            </div>    

            <div class="input-field col s12 m4 offset-m1">
                <input id="model" type="text" class="validate" name="model" value="{{$machine->model}}">
                <label for="model">Modelo</label>
            </div>

            <div class="input-field col s12 m4 offset-m1">
                <input id="series" type="text" class="validate" name="series" value="{{$machine->series}}">
                <label for="series">Serie</label>
            </div>

            <div class="input-field col s12 m4 offset-m1">
                <input id="motor" type="text" class="validate" name="motor" value="{{$machine->motor}}">
                <label for="motor">Motor</label>
            </div>

            <div class="input-field col s12 m4 offset-m1">
                <input id="year" type="number" class="validate" name="year" value="{{$machine->year}}" min="1990">
                <label for="year">Año</label>
            </div>

            <div class="input-field col s12 m4 offset-m1">
                <input id="hp" type="number" class="validate" name="hp" value="{{$machine->hp}}">
                <label for="hp">HP</label>
            </div>
            
            <div class="input-field col s12 m4 offset-m1">
                <input id="motorseries" type="text" class="validate" name="motorseries" value="{{$machine->motorseries}}">
                <label for="motorseries">Serie del Motor</label>
            </div>

            <div class="input-field col s12 m4 offset-m1">
                <select name="status">
                @if($machine->status == 1)
                    <option value="1" selected>Disponible</option>
                @else
                    <option value="1">Disponible</option>
                @endif
                @if($machine->status == 2)
                    <option value="2" selected>Trabajando</option>
                @else
                    <option value="2">Trabajando</option>
                @endif
                @if($machine->status == 3)
                    <option value="3" selected>Desabilitada</option>
                @else
                    <option value="3">Desabilitada</option>
                @endif
                </select>
                <label>Status</label>
            </div>

            <div class="input-field col s12 m9 offset-m1">
                <textarea id="observations" class="materialize-textarea" name="observations">{{$machine->observations}}</textarea>
                <label for="observations">Observaciones</label>
            </div>
        </div>

        <div class="row">
            <div class="col s12 center-align">
                <h5>Costos de Renta</h5>
            </div>

            <div class="input-field col s3 m3 l2 offset-m1 offset-l1">
                <input id="day_1" type="number" class="validate" name="day_1" value="{{$machine->day_1}}" min="0">
                <label for="day_1">1 Día</label>
            </div>

            <div class="input-field col s3 m3 l2">
                <input id="day_2" type="number" class="validate" name="day_2" value="{{$machine->day_2}}" min="0">
                <label for="day_2">2 Días</label>
            </div>

            <div class="input-field col s3 m3 l2">
                <input id="day_3" type="number" class="validate" name="day_3" value="{{$machine->day_3}}" min="0">
                <label for="day_3">3 Días</label>
            </div>

            <div class="input-field col s3 m3 l2">
                <input id="day_4" type="number" class="validate" name="day_4" value="{{$machine->day_4}}" min="0">
                <label for="day_4">4 Días</label>
            </div>

            <div class="input-field col s3 m3 l2">
                <input id="day_7" type="number" class="validate" name="day_7" value="{{$machine->day_7}}" min="0">
                <label for="day_7">7 Días</label>
            </div>

            <div class="input-field col s3 m3 l2 offset-l1">
                <input id="day_15" type="number" class="validate" name="day_15" value="{{$machine->day_15}}" min="0">
                <label for="day_15">15 Días</label>
            </div>

            <div class="input-field col s3 m3 l2">
                <input id="day_30" type="number" class="validate" name="day_30" value="{{$machine->day_30}}" min="0">
                <label for="day_30">1 Mes</label>
            </div>
        </div>

        <div class="row">
            <div class="col s12 center-align">
                <input type="submit" value="Guardar" class="btn">
            </div>
        </div>

    </form>

    <div class="row">
        <div class="col s12">
            <form action="/machine/{{$machine->id}}" method="post">  @csrf @method('DELETE')
                <input type="submit" class="waves-effect waves-light red-text material-icons left" style="border: solid 1px; padding: 4px; border-radius: 2px; font-size: 1.2em;" value="Borrar">
            </form>
        </div>
    </div>

@stop