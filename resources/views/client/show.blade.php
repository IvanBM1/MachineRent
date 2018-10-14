@extends('layouts.card')
@section('title','Cliente')
@section('card_title')
<h5>Cliente</h5>
@stop
@section('card_content')

    <div class="row">

        <div class="col s12 m8 offset-m2 ">
            <table class="highlight ">
                <tbody>
                <tr>
                    <th>Nombre</th>
                    <td>{{$client->name}}</td>
                </tr>
                <tr>
                    <th>Teléfono</th>
                    <td>{{$client->phone}}</td>
                </tr>
                <tr>
                    <th>Correo</th>
                    <td>{{$client->email}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col s10 right-align">
            <a href="/client/{{$client->id}}/edit" class="waves-effect waves-light teal-text"><i class="material-icons left">edit</i>Editar</a>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m8 offset-m2">
            <h5 class="center-align">Personas Autorizadas</h5>
            <div class="row">
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Número</th>
                            <th>Correo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->position}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>{{$employee->email}}</td>
                                <td>
                                    <form action="/employee/{{$employee->id}}" method="post" style="display:flex; justify-content: space-evenly; align-items: center; margin: 0;">  @csrf @method('DELETE')
                                        <a href="/employee/{{$employee->id}}/edit" class="waves-effect waves-light teal-text"><i class="material-icons left">edit</i></a>
                                        <label style="cursor:pointer;">
                                            <input type="submit" style="display: none;">
                                            <i class="material-icons pink-text">delete</i>
                                        </label>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="col s10 right-align">
            <a href="/employee/create/{{$client->id}}" class="waves-effect waves-light teal-text modal-trigger"><i class="material-icons left">add</i> Agregar</a>
        </div>

    </div>


    <div class="row">
        <div class="col s12 m8 offset-m2">
            <h5 class="center-align">Teléfonos</h5>
            <div class="row">
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Etiqueta</th>
                            <th>Número</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($phones as $phone)
                            <tr>
                                <td>{{$phone->razon}}</td>
                                <td>{{$phone->number}}</td>
                                <td>
                                    <form action="/phone/{{$phone->id}}" method="post" style="display:flex; justify-content: space-evenly; align-items: center; margin: 0;">  @csrf @method('DELETE')
                                        <a href="/phone/{{$phone->id}}/edit" class="waves-effect waves-light teal-text"><i class="material-icons left">edit</i></a>
                                        <label style="cursor:pointer;">
                                            <input type="submit" style="display: none;">
                                            <i class="material-icons pink-text">delete</i>
                                        </label>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="col s10 right-align">
            <a class="waves-effect waves-light teal-text modal-trigger" href="#modalPhone"><i class="material-icons left">add</i> Agregar</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <h5 class="center-align">Direcciónes</h5>

            <ul class="collapsible">
            @foreach($addresses as $address )
                <li>
                    <div class="collapsible-header"><i class="material-icons">home</i>{{$address->state}} - {{$address->colony}}</div>
                    <div class="collapsible-body">
                        <div class="row">
                        <div class="col s12">
                            <table>
                                <tbody>
                                <tr>
                                    <th>Editar</th>
                                    <td><a href="/address/{{$address->id}}/edit" class="teal-text"><i class="material-icons">edit</i></a></td>
                                </tr>
                                <tr>
                                    <th>Calle</th>
                                    <td>{{$address->street}}</td>
                                </tr>
                                <tr>
                                    <th>Numero</th>
                                    <td>{{$address->numberext}}</td>
                                </tr>
                                <tr>
                                    <th>Interior</th>
                                    <td>{{$address->numberint}}</td>
                                </tr>
                                <tr>
                                    <th>Colonia</th>
                                    <td>{{$address->colony}}</td>
                                </tr>
                                <tr>
                                    <th>Estado</th>
                                    <td>{{$address->state}}</td>
                                </tr>
                                <tr>
                                    <th>Municipio</th>
                                    <td>{{$address->municipality}}</td>
                                </tr>
                                <tr>
                                    <th>CP</th>
                                    <td>{{$address->cp}}</td>
                                </tr>
                                <tr>
                                    <th>RFC</th>
                                    <td>{{$address->rfc}}</td>
                                </tr>
                                <tr>
                                    <th>Razon Social</th>
                                    <td>{{$address->razon}}</td>
                                </tr>
                                <tr>
                                    <th>Es Fiscal</th>
                                    @if($address->fiscal == "true")
                                        <td>Si</td>
                                    @else
                                        <td>No</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Entre</th>
                                    <td>{{$address->betweenstreet1}}</td>
                                </tr>
                                <tr>
                                    <th>Entre</th>
                                    <td>{{$address->betweenstreet2}}</td>
                                </tr>
                                <tr>
                                    <th>Referencias</th>
                                    <td>{{$address->references}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>

        <div class="col s10 right-align">
            <a href="/address/create/{{$client->id}}" class="waves-effect waves-light teal-text modal-trigger"><i class="material-icons left">add</i> Agregar</a>
        </div>
    </div>


    <!-- Modal  ------------------------------------------------------------------------------  -->

     <div id="modalPhone" class="modal">
        <form action="/phone" method="post"> @csrf

            <input type="hidden" value="{{$client->id}}" name="client_id">

            <div class="modal-content">
                <div class="row">
                    <h4 class="center-align">Agregar Número</h4>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 offset-m3">
                        <i class="material-icons prefix">bookmark</i>
                        <input id="razon" type="text" class="validate" name="razon">
                        <label for="razon">Etiqueta</label>
                    </div>

                    <div class="input-field col s12 m6 offset-m3">
                        <i class="material-icons prefix">local_phone</i>
                        <input id="number" type="text" class="validate" name="number">
                        <label for="number">Número</label>
                    </div>
                </div>

                <div class="row center-align">
                    <input type="submit" class="btn gray" value="Guardar">
                </div>
            </div>
            </div>
        </form>
    </div>


@stop