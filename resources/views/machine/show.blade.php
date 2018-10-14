@extends('layouts.card')
@section('title','Maquinas')
@section('card_title','Maquina')
@section('card_content')

    

    <div class="row">
        <div class="col s12 m8 l6 offset-m2 offset-l3 ">
            <table class="highlight">
                <tbody>
                    <tr>
                        <th>Número Económico</th>
                        <td>{{$machine->economic}}</td>
                    </tr>
                    <tr>
                        <th>Marca</th>
                        <td>{{$machine->brand}}</td>
                    </tr>
                    <tr>
                        <th>Modelo</th>
                        <td>{{$machine->model}}</td>
                    </tr>
                    <tr>
                        <th>Serie</th>
                        <td>{{$machine->series}}</td>
                    </tr>
                    <tr>
                        <th>Motor</th>
                        <td>{{$machine->motor}}</td>
                    </tr>
                    <tr>
                        <th>Año</th>
                        <td>{{$machine->year}}</td>
                    </tr>
                    <tr>
                        <th>HP</th>
                        <td>{{$machine->hp}}</td>
                    </tr>
                    <tr>
                        <th>Serie del Motor</th>
                        <td>{{$machine->motorseries}}</td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        @if($machine->status == 1)
                            <td>Disponible</td>
                        @endif
                        
                        @if($machine->status == 2)
                            <td>Trabajando</td>
                        @endif
                        
                        @if($machine->status == 3)
                            <td>Desabilitada</td>
                        @endif
                    </tr>
                    <tr>
                        <th>Observaciones</th>
                        <td>{{$machine->observations}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col s9 right-align"> <br>
            <a href="/machine/{{$machine->id}}/edit" class="waves-effect waves-light teal-text"><i class="material-icons left">edit</i>Editar</a>
        </div>
    </div>

    <div class="row">
        <div class="col s12 center-align">
            <h5>Costos de Renta</h5>
            <table  class="highlight responsive-table centered">
                <thead>
                    <tr>
                        <th>1 Día</th>
                        <th>2 Días</th>
                        <th>3 Días</th>
                        <th>4 Días</th>
                        <th>7 Días</th>
                        <th>15 Días</th>
                        <th>1 Mes</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>${{$machine->day_1}}.00</td>
                        <td>${{$machine->day_2}}.00</td>
                        <td>${{$machine->day_3}}.00</td>
                        <td>${{$machine->day_4}}.00</td>
                        <td>${{$machine->day_7}}.00</td>
                        <td>${{$machine->day_15}}.00</td>
                        <td>${{$machine->day_30}}.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="row">
        @if($client)
        <br>
        <h5 class="center-align">Rentas Registradas</h5>
        <div class="col s12 center-align">
            <table class="highlight responsive-table centered">
                <thead>
                    <tr>
                        <th>Rentada</th>
                        <th>Cliente</th>
                        <th>Fecha de renta</th>
                        <th>Fecha de entrega</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($machinerents as $machinerent)
                    <tr>
                        <td><a href="/rent/{{$machinerent->rent_id}}" class="teal-text" ><i class="material-icons" style="font-size: 2em;">description</i></a></td>
                        <td><a href="/client/{{$client->id}}" class="teal-text">{{$client->name}}</a></td>
                        <td>{{$machinerent->dateinit}}</td>
                        <td>{{$machinerent->dateend}}</td>
                        <td>
                        @if( strtotime($machinerent->dateend) < getdate()[0] )
                            <strong class="red-text">Fecha Vencida</strong>
                        @else
                            <strong class="teal-text">Renta Activa</strong>
                        @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>


        
@stop