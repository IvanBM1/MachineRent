@extends('layouts.main')
@include('partials.navbar')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col s12">    
                
                <div class="card">
                    <form action="/machine" method="post"> @csrf
                        <div class="card-content">

                            <span class="card-title center-align">Agregar Maquina</span>
                            <div class="row">

                                <div class="input-field col s12 m4 offset-m1">
                                    <input id="economic" type="text" class="validate" name="economic">
                                    <label for="economic">Número Económico</label>
                                </div>

                                <div class="input-field col  s12 m4 offset-m1">
                                    <input id="brand" type="text" class="validate" name="brand">
                                    <label for="brand">Marca</label>
                                </div>

                                <div class="input-field col s12 m4 offset-m1">
                                    <input id="model" type="text" class="validate" name="model">
                                    <label for="model">Modelo</label>
                                </div>

                                <div class="input-field col s12 m4 offset-m1">
                                    <input id="series" type="text" class="validate" name="series">
                                    <label for="series">Serie</label>
                                </div>

                                <div class="input-field col s12 m4 offset-m1">
                                    <input id="motor" type="text" class="validate" name="motor">
                                    <label for="motor">Motor</label>
                                </div>

                                <div class="input-field col s12 m4 offset-m1">
                                    <input id="year" type="number" class="validate" name="year" min="1990">
                                    <label for="year">Año</label>
                                </div>

                                <div class="input-field col s12 m4 offset-m1">
                                    <input id="hp" type="number" class="validate" name="hp" min="0">
                                    <label for="hp">HP</label>
                                </div>
                                
                                <div class="input-field col s12 m4 offset-m1">
                                    <input id="motorseries" type="text" class="validate" name="motorseries">
                                    <label for="motorseries">Serie del Motor</label>
                                </div>

                                <div class="input-field col s12 m4 offset-m1">
                                    <select name="status">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="1">Disponible</option>
                                    <option value="2">Trabajando</option>
                                    <option value="3">Desabilitada</option>
                                    </select>
                                    <label>Status</label>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12 m9 offset-m1">
                                        <textarea id="observations" class="materialize-textarea" name="observations"></textarea>
                                        <label for="observations">Observaciones</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 center-align">
                                        <h5>Costos de Renta</h5>
                                    </div>

                                    <div class="input-field col s3 m3 l2 offset-m1 offset-l1">
                                        <input id="day_1" type="number" class="validate" name="day_1" min="0">
                                        <label for="day_1">1 Día</label>
                                    </div>

                                    <div class="input-field col s3 m3 l2">
                                        <input id="day_2" type="number" class="validate" name="day_2" min="0">
                                        <label for="day_2">2 Días</label>
                                    </div>

                                    <div class="input-field col s3 m3 l2">
                                        <input id="day_3" type="number" class="validate" name="day_3" min="0">
                                        <label for="day_3">3 Días</label>
                                    </div>

                                    <div class="input-field col s3 m3 l2">
                                        <input id="day_4" type="number" class="validate" name="day_4" min="0">
                                        <label for="day_4">4 Días</label>
                                    </div>

                                    <div class="input-field col s3 m3 l2">
                                        <input id="day_7" type="number" class="validate" name="day_7" min="0">
                                        <label for="day_7">7 Días</label>
                                    </div>

                                    <div class="input-field col s3 m3 l2 offset-l1">
                                        <input id="day_15" type="number" class="validate" name="day_15" min="0">
                                        <label for="day_15">15 Días</label>
                                    </div>

                                    <div class="input-field col s3 m3 l2">
                                        <input id="day_30" type="number" class="validate" name="day_30" min="0">
                                        <label for="day_30">1 Mes</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-action center-align">
                            <input type="submit" value="Guardar" class="btn">
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>

@stop