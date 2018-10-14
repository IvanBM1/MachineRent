@extends('layouts.card')
@section('title','Rentas')
@section('card_title','Nueva Renta')

@section('card_content')

    
    <form action="/rent" method="post" id="formSend"> @csrf

        <div class="row">
            <div class="input-field col s12 m8 offset-m2">
                <a id="openModalClient" class="waves-effect waves-light modal-trigger teal-text" href="#modalClient"><i class="material-icons left">domain</i>Seleccionar Cliente</a>
                <input type="hidden" id="client_id" name="client_id" value="">
                <!-- ITEM CLIENT -->
                <div id="itemClient" style="display: none;">
                    <div class="row">
                        <div class="col s12 ">
                            <table class="highlight responsive-table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="client_name"></td>
                                        <td id="client_phone"></td>
                                        <td id="client_email"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <a id="searchAddress" class="waves-effect waves-light modal-trigger  teal-text" href="#modalAddress"><i class="material-icons left">home</i>Seleccionar Dirección</a>
                        <input type="hidden" id="address_id" name="address_id" value="">
                        <!-- ITEM ADDRESS -->
                        <div id="itemAddress" style="display: none;">
                            <div class="row">
                                <div class="col s12 ">
                                    <table class="highlight responsive-table">
                                        <thead>
                                            <tr>
                                                <th>Colonia</th>
                                                <th>Calle</th>
                                                <th>Número Ext.</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td id="address_colony"></td>
                                            <td id="address_street"></td>
                                            <td id="address_numberext"></td>
                                            <td id="address_state"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" >
                        <a id="searchEmployee" class="waves-effect waves-light modal-trigger  teal-text" href="#modalEmployee"><i class="material-icons left">face</i>Seleccionar Contacto</a>
                        <input type="hidden" id="employee_id" name="employee_id" value="">
                        <!-- ITEM EMPLOYEE -->
                        <div id="itemEmployee" style="display: none;">
                            <div class="row">
                                <div class="col s12 ">
                                    <table class="highlight responsive-table">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cargo</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td id="employee_name"></td>
                                                <td id="employee_position"></td>
                                                <td id="employee_phone"></td>
                                                <td id="employee_email"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MACHINES IDS TO SEND METHOD POST -->
        <input type="hidden" id="machines_ids" name="machines_ids" value="">
        <!-- MACHINES IDS TO SEND METHOD POST -->

        <div class="row">
            <div class="input-field col s12 m8 offset-m2">
                <a id="openModalMachine" class="waves-effect waves-light modal-trigger teal-text" href="#modalMachine"><i class="material-icons left">add</i>Agregar Maquina</a>
                <!-- ITEMS MACHINE -->
                <ul id="itemsMachine" class="collection">
                </ul>  
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m8 offset-m2">
                <i class="material-icons prefix">local_shipping</i>
                <input id="extracost" type="number" class="validate" name="extracost" min="0">
                <label for="extracost">Flete</label>
            </div>

            <div class="input-field col s7 m5 offset-m2">
                <i class="material-icons prefix">description</i>
                <input id="bill" type="text" class="validate" name="bill">
                <label for="bill">Factura</label>
            </div>

             <div class="input-field col s5 m3">
                <i class="material-icons prefix">poll</i>
                <input id="iva" type="number" class="validate" name="iva" min="0">
                <label for="iva">IVA (%)</label>
            </div>

            <div class="input-field col s12 m8 offset-m2">
                <i class="material-icons prefix">redeem</i>
                <input id="discount" type="number" class="validate" name="discount" min="0">
                <label for="discount">Descuento</label>
            </div>
            
           

            <div class="input-field col s7 m5 offset-m2">
                <i class="material-icons prefix">monetization_on</i>
                <input id="payment" type="number" class="validate" name="payment" min="0">
                <label for="payment">Pago del Cliente</label>
            </div>

            <div class="col  col s5 m3" style="height: 10%; display: flex; justify-content: center; align-items: center;">
                <label>
                    <input id="check_total" type="checkbox" class="filled-in"/>
                    <span>Pago Completo</span>
                </label>
            </div>

            <!-- TOTAL DE LA RENTA -->
            <input type="hidden" id="total" name="total">

            <div class="input-field col s12 m8 offset-m2">
                <textarea id="observation" class="materialize-textarea" name="observations"></textarea>
                <label for="observation">Observaciones</label>
            </div>

            <div class="row">
                <div class="col s12 center-align">
                    <a id="openModalInfo" class="waves-effect waves-light modal-trigger btn" href="#modalInfo">Continuar</a>
                </div>
            </div>
            
        </div>

    </form>


    <!-- MODALS ---------------------------------------------------------------------- -->

     <!-- Modal Client -->
     <div id="modalClient" class="modal">
        <div class="modal-content">

            <div class="row">
                <h4 class="center-align">Seleccionar Cliente</h4>
            </div>

            <div class="row">
                <div class="input-field col s12 m8 offset-m2">
                    <i class="material-icons prefix">search</i>
                    <input id="searchClient" type="text" class="validate" name="searchClient">
                    <label for="searchClient">Buscar</label>
                </div>

                <div class="col s12 m8 offset-m2">
                    <ul class="collection" id="collectionClient">    
                    </ul>
                </div>
            </div>
        
            <div class="row center-align">
                <a id="addClient" href="#" class="modal-close waves-effect waves-green btn">Agregar</a>
            </div>
        </div>
    </div>

     <!-- Modal Address -->
     <div id="modalAddress" class="modal">
        <div class="modal-content">
            
            <div class="row">
                <h4 class="center-align">Selecciona Dirección</h4>
            </div>

            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <!-- UL COLLECTION -->
                    <ul class="collection" id="collectionAddress"></ul>
                </div>
            </div>

            <div class="row center-align">
                <a id="addAddress" href="#" class="modal-close waves-effect waves-green btn">Agregar</a>
            </div>
        </div>
    </div>

    <!-- Modal Employee -->
    <div id="modalEmployee" class="modal">
        <div class="modal-content">
            
            <div class="row">
                <h4 class="center-align">Selecciona Contacto</h4>
            </div>

            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <ul class="collection" id="collectionEmployee">    
                    </ul>
                </div>
            </div>

            <div class="row center-align">
                <a id="addEmployee" href="#" class="modal-close waves-effect waves-green btn">Agregar</a>
            </div>
        </div>
    </div>

    <!-- Modal Machine -->
    <div id="modalMachine" class="modal">
        <div class="modal-content">
            
            <div class="row">
                <h4 class="center-align">Agregar Maquina</h4>
            </div>

            <div class="row">
                
                <div class="input-field col s12 m8 offset-m2">
                    <i class="material-icons prefix">search</i>
                    <input id="search" type="text" class="validate" name="search">
                    <label for="search">Buscar</label>
                </div>

                <div class="col s12 m8 offset-m2">
                    <ul class="collection" id="collectionMachine">    
                    </ul>
                </div>

            </div>

            <div class="row">
                <div class="input-field col s12 m4 offset-m2">
                    <i class="material-icons prefix">event_available</i>
                    <input id="dateinit" type="text" class="datepicker" placeholder="Fecha de Inicio" name="dateinit">
                </div>
                <div class="input-field col s12 m4 ">
                    <i class="material-icons prefix">event</i>
                    <input id="dateend" type="text" class="datepicker" placeholder="Fecha de Entrega" name="dateend">
                </div>
            </div>

             <div class="row">
                <div class="input-field col s12 m4 offset-m2">
                    <i class="material-icons prefix">access_time</i>
                    <input id="widthoutcost" type="number" placeholder="Dias sin costo" name="widthoutcost">
                </div>
            </div>

            <div class="row center-align">
                <a id="addMachine" href="#" class="waves-effect waves-green btn">Agregar</a>
            </div>
        </div>
    </div>


     <!-- Modal INFO PAY -->
     <div id="modalInfo" class="modal">
        <div class="modal-content">
            
            <div class="row">
                <h4 class="center-align">Total</h4>
            </div>

            <div class="row">
                <div class="col s12">
                    <table class="highlight responsive-table">
                        <thead>
                            <tr>
                                <th>Total</th>
                                <th>Descuento</th>
                                <th id="show_iva" style="display: none;">+IVA</th>
                                <th>Pago</th>
                                <th>Restan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="info_total"></td>
                                <td id="info_discount"></td>
                                <td id="info_iva" style="display: none;"></td>
                                <td id="info_partial"></td>
                                <td id="info_remaining"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row center-align">
                <a id="submitForm" href="#" class="modal-close waves-effect waves-green btn">Aceptar</a>
            </div>
        </div>
    </div>

    
<script src="/js/setMachine.js"></script>
<script src="/js/getMachine.js"></script>
<script src="/js/getClient.js"></script>
<script src="/js/getAddress.js"></script>
<script src="/js/getEmployee.js"></script>
@stop