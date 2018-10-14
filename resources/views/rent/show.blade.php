@extends('layouts.card')
@section('title','Renta')
@section('card_title','Renta')
@section('card_content')

    <!-- <div class="row toPrint" style="display: none;">
        <div class="col s12">
            <h3 class="toPrint center-align">Zeycom - Renta</h3>
        </div>
    </div> -->

    <div class="col s12 m8 offset-m2" style="border: 1px solid #ddd; border-radius: 2px;">
        <h5 class="center-align">Cliente</h5>
        <table class="responsive-table striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Número</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$client->name}}</td>
                <td>{{$client->phone}}</td>
                <td>{{$client->email}}</td>
            </tr>
            </tbody>
        </table>
        <br>
    </div>
    <div class="row"></div>
    <div class="col s12 m8 offset-m2" style="border: 1px solid #ddd; border-radius: 2px;">
        <h5 class="center-align">Contacto</h5>
        <table class="responsive-table striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Número</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$employee->name}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->email}}</td>
            </tr>
            </tbody>
        </table>
        <br>
    </div>
    <div class="row"></div>

    <div class="col s12 m8 offset-m2" style="border: 1px solid #ddd; border-radius: 2px;">
        <h5 class="center-align">Dirección</h5>
        <table class="striped">
            <tbody>
                <tr>
                    <th>Calle</th>
                    <td>{{$address->street}}</td>
                </tr>
                <tr>
                    <th>Número Exterior</th>
                    <td>{{$address->numberext}}</td>
                </tr>
                <tr>
                    <th>Número Interior</th>
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
                    <th>Razón Social</th>
                    <td>{{$address->razon}}</td>
                </tr>
                <tr>
                    <th>Es Fiscal</th>
                    @if($address->fiscal == 'true')
                    <td>Si</td>
                    @else
                    <td>No</td>
                    @endif
                </tr>
                <tr>
                    <th>Entre la Calle</th>
                    <td>{{$address->betweenstreet1}}</td>
                </tr>
                <tr>
                    <th>Entre la Calle</th>
                    <td>{{$address->betweenstreet2}}</td>
                </tr>
                <tr>
                    <th>Referencias</th>
                    <td>{{$address->references}}</td>
                </tr>
            </tbody>
        </table>
        <br>
    </div>

    <div class="row"></div>
    <div class="col s12 m8 offset-m2" style="border: 1px solid #ddd; border-radius: 2px;">
        <h5 class="center-align">Maquinas Rentadas</h5><br>
        <ul class="collection">
        @foreach($machinerents as $machinerent)
            <li class="collection-item avatar">
                <i class="material-icons circle">assignment</i>
                <div class="row">
                    <div class="col s4">
                        <span class="title"><strong>{{$machinerent->machine->economic}}</strong></span>
                        <p>{{$machinerent->machine->brand}}</p>
                        <p>{{$machinerent->machine->model}}</p>
                    </div>
                    <div class="col s8">
                        <?php echo $machinerent->description; ?>
                    </div>
                </div>
                <a href="/machinerent/{{$machinerent->id}}/edit" class="secondary-content"><i class="material-icons">update</i></a>
            </li>
        @endforeach
        </ul>
    </div>

    <div class="row"></div>
    <div class="col s12 m8 offset-m2" style="border: 1px solid #ddd; border-radius: 2px;">
        <h5 class="center-align">Observaciones</h5><br>
        <textarea style="min-width: 99%; max-width: 99%; border:none; resize: none;" readonly>{{$rent->observations}}</textarea>
    </div>
    <div class="row"></div>

    <div class="col s12 right-align noPrint">
        <a href="#modalPayment" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">add</i>Nuevo Pago</a>
    </div>
    <div class="row"></div>
    <div class="col s12 m8 offset-m2" style="border: 1px solid #ddd; border-radius: 2px;">
        <h5 class="center-align">Costos</h5><br>
        <table class="striped">
            <tbody>

                @if($rent->bill != "")
                <tr>
                    <th>Factura</th>
                    <td>{{$rent->bill}}</td>
                </tr>
                @endif
                <tr>
                    <th>Flete</th>
                    <td>${{$rent->extracost}}.00</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>${{$rent->total}}.00</td>
                </tr>

                @if($rent->discount != "")
                <tr>
                    <th>Descuento aplicado</th>
                    <td>${{$rent->discount}}.00</td>
                </tr>
                @endif
                @if($rent->iva > 0)
                <tr>
                    <th>+{{$rent->iva}}% IVA</th>
                    <td>${{$rent->total + intval($rent->total * ($rent->iva / 100)) }}.00</td>
                </tr>
                @endif
                @if(count($payments) > 0)
                    <tr>
                        <th>Pagos</th>
                        <td></td>
                    </tr>
                    @foreach($payments as $payment)
                        <tr>
                            <td style="padding-left:4em;">{{$payment->created_at->format('d-m-Y h:iA')}}</td>
                            <td>${{$payment->entry}}.00</td>
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <th>Pago Total</th>
                    <td>${{$rent->payment}}.00</td>
                </tr>
                <tr>
                    <th>Restan</th>
                    @if($rent->iva > 0)
                    <td>${{intval(($rent->total + ($rent->total * ($rent->iva / 100))) - $rent->payment)}}.00</td>
                    @else
                    <td>${{$rent->total - $rent->payment}}.00</td>
                    @endif
                </tr>
                
            </tbody>
        </table>
        <br>
    </div>

    <!-- Modal  ------------------------------------------------------------------------------  -->

     <div id="modalPayment" class="modal">
        <form action="/payment" method="post"> @csrf

            <input type="hidden" value="{{$rent->id}}" name="rent_id">

            <div class="modal-content">
                <div class="row">
                    <h4 class="center-align">Nuevo Pago</h4>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 offset-m3">
                        <i class="material-icons prefix">attach_money</i>
                        <input id="entry" type="number" class="validate" name="entry">
                        <label for="entry">Monto</label>
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