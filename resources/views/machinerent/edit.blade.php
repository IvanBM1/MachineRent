@extends('layouts.card')
@section('title','Maquina')
@section('card_title','Maquina')
@section('card_content')


<script>
$(document).ready(function(){

    window.machineSelected = {
        day_1: {{$machinerent->machine->day_1}},
        day_2: {{$machinerent->machine->day_2}},
        day_3: {{$machinerent->machine->day_3}},
        day_4: {{$machinerent->machine->day_4}},
        day_7: {{$machinerent->machine->day_7}},
        day_15: {{$machinerent->machine->day_15}},
        day_30: {{$machinerent->machine->day_30}}
    };

    var dateinitstring = "<?php echo $machinerent->dateinit; ?>";
    var dateendstring = "<?php echo $machinerent->dateend; ?>";

    var init = $("#dateinit");
    var dateinit = M.Datepicker.getInstance(init);
    dateinit.setDate(new Date(getFormatToDate( dateinitstring )));
    
    var end = $("#dateend");
    var dateend = M.Datepicker.getInstance(end);
    dateend.setDate(new Date(getFormatToDate(dateendstring)));

    function getFormatToDate(date){
        var array = date.split("-");
        return array[1] + "-" + array[0] + "-" + array[2];
    }
});
</script>


<form id="formUpdateMachine" action="/machinerent/{{$machinerent->id}}" method="post"> @csrf @method('PATCH')

    <input type="hidden" name="rent_id" value="{{$machinerent->rent_id}}">
    <input type="hidden" name="machine_id" value="{{$machinerent->machine_id}}">

    <input type="hidden" name="rentcost" id="rentcost"  value="">
    <input type="hidden" name="description" id="description"  value="">
    <input type="hidden" name="concret" id="concret"  value="">

    <div class="row">
        <h4 class="center-align">Actualizar Renta de Maquina</h4>
    </div>

    <div class="row">
        <h5 id="machine_info"></h5>
    </div>

    <div class="row">
        <div class="input-field col s12 m4 offset-m2">
            <i class="material-icons prefix">event_available</i>
            <input id="dateinit" type="text" class="datepicker" placeholder="Fecha de Inicio" name="dateinit" value="{{$machinerent->dateinit}}">
        </div>

        <div class="input-field col s12 m4">
            <i class="material-icons prefix">event</i>
            <input id="dateend" type="text" class="datepicker" placeholder="Fecha de Entrega" name="dateend" value="{{$machinerent->dateend}}">
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12 m4 offset-m2">
            <i class="material-icons prefix">access_time</i>
            <input id="extradays" type="number" placeholder="Dias sin costo" name="extradays" value="{{$machinerent->extradays}}">
        </div>
    </div>

    <div class="row center-align">
        <a id="updateMachine" href="#" class="waves-effect waves-green btn">Aceptar</a>
    </div>
</form>

<!-- MODAL INFO ------------------------------------------------------------------- -->
    <div id="modalInfo" class="modal">
        <div class="modal-content">
            
            <div class="row">
                <h4 class="center-align">Actualización</h4>
            </div>

            <div class="row">
                <div class="col s12 center-align">
                    <div id="machinerent_info"></div>
                </div>
            </div>

            <div class="row center-align">
                <a id="submitForm" href="#" class="modal-close waves-effect waves-green btn">Aceptar</a>
            </div>
        </div>
    </div>


<script src="/js/updateMachine.js"></script>
@stop