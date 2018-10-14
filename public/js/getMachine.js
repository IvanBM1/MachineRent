$(document).ready(function(){
    var route = "http://127.0.0.1:8000/searchmachines?search=";
    var machineSelected;

    $('#openModalMachine').click(function(){
        machineSelected = null;

        $("#search").val("");
        $('#collectionMachine').empty();
        $('#dateinit').val("");
        $('#dateend').val("");
        $('#widthoutcost').val("");

        var dateinit = $('#dateinit');
        var init = M.Datepicker.getInstance(dateinit);
        init.setDate(new Date());

        var dateend = $('#dateend');
        var end = M.Datepicker.getInstance(dateend);
        end.setDate(new Date());
        
    });

    $('#search').keypress(function(event){
        if(event.keyCode == 13){
            var collection = $('#collectionMachine');
            collection.html("Cargando...");

            $.get(route + $('#search').val(),function(response){
                collection.empty();
                if(response.length > 0)
                    $(response).each(function(key, machine){ appendMachine(machine); });
                else
                    collection.html("<h5 class='center-align' >Sin resultados!</h5>");
            });
        }
    });

    $('#addMachine').click(function(){

        if(machineSelected == null) {
            return closeModalMachine();
        }

        var collection = $('#collectionMachine');
        var nodes = collection[0].childNodes; 
        if( nodes.length == 1 && nodes[0].nodeName != "#text"){
            if(nodes[0].getAttribute("data-id") != null) setDataMachine();
        }
    });

    function appendMachine(machine){
        var collection = $('#collectionMachine');

        var li = $('<li>')
            .addClass('collection-item avatar')
            .appendTo(collection)
            .click(function(){
                this.setAttribute("data-id", machine.id);
                setSelectedMachine(this, machine);
            });
        var a = $('<span>').addClass('title').text(machine.brand).appendTo(li);
        if(machine.status == 1) $('<i/>').addClass('material-icons circle green').text('beenhere').appendTo(a);
        if(machine.status == 2) $('<i/>').addClass('material-icons circle orange').text('group').appendTo(a);
        if(machine.status == 3) $('<i/>').addClass('material-icons circle red').text('build').appendTo(a);
        $('<p>').html(machine.model+"<br>"+machine.economic).appendTo(a);
    }

    function setSelectedMachine(li, machine){

        if( window.inArray(machine.id) ) {
            M.toast({html: 'Ya se encuentra agregada!'});
            return;
        }
        
        if( machine.status == 2 ){
            M.toast({html: 'La maquina se encuentra en renta!'});

            if(machine.machinerent[0].dateend != null)
                M.toast({html: 'Disponible apartir del: '+ machine.machinerent[0].dateend });
            
            return;
        }
        
        if( machine.status == 3 ){
            M.toast({html: 'La maquina se encuentra desabilitada!'});
            return;
        }

        machineSelected = machine;
        li.style.background = "#dedede";
        
        var collection = $('#collectionMachine');
        var items = collection[0].childNodes;

        var i = 0;
        while(items.length != 1){
            if(items[i] == li ) i++;
            else items[i].remove();
        }
    }


    function setDataMachine(){
        var info = getInfoMachine();

        if( info != null) 
            appendMachineSelected(machineSelected, info);
    }

    function appendMachineSelected(machine, info){
        var collection = $('#itemsMachine');

        var li = $('<li>')
            .attr('id', 'machine_'+machineSelected.id)
            .addClass('collection-item avatar')
            .appendTo(collection);
        
        var a = $('<span>').addClass('title').text(machine.brand).appendTo(li);
        $('<i/>').addClass('material-icons circle green').text('beenhere').appendTo(a);
        $('<p>').html(
            "<div class='row'>"+
                "<div class='col s3'>"+
                    machine.model+"<br><strong>"+machine.economic+"</strong>"+
                    "<br><br><br><a href='#' class='red-text' onclick='removeMachine("+machine.id+")'><i class='material-icons'>delete</i>Quitar</a>"+
                "</div>"+
                "<div class='col s9'>"+
                    info+
                "</div>"+
            "</div>"
        ).appendTo(a);
    }

    function getInfoMachine(){
        var rentinfo = "<strong>Información de la Renta </strong><br>";
        var dateinit = $('#dateinit');
        var init = M.Datepicker.getInstance(dateinit);
        var dateend = $('#dateend');
        var end = M.Datepicker.getInstance(dateend);
        var days = validateDate(init.toString(), end.toString());


        days =  days/1000/60/60/24;
        days =  Math.round(days);

        if( days < 1 ){
            M.toast({html: 'La fecha es incorrecta!'});
        }else{
            rentinfo += "<em>Inicia:</em> " + getFormatDate(init.toString()) + "<br>";
            rentinfo += "<em>Termina:</em> " + getFormatDate(end.toString()) + " <br>";
            rentinfo += "Renta por: " + days + " días<br>";
    
            var widthoutcost = parseInt($('#widthoutcost').val()+"");

            if(widthoutcost > 0){
                days -= widthoutcost;
                rentinfo += "Días de regalo: " + widthoutcost + " <br>";
            }else widthoutcost = 0;
    
            var costs = [];
            costs[0] = machineSelected.day_1;
            costs[1] = machineSelected.day_2;
            costs[2] = machineSelected.day_3;
            costs[3] = machineSelected.day_4;
            costs[4] = machineSelected.day_7;
            costs[5] = machineSelected.day_15;
            costs[6] = machineSelected.day_30;
    
            var rentcost = 0;
            var days_temp = days;
            while( days_temp > 0 ){
                if(days_temp >= 30){ rentcost += costs[6]; days_temp -=30;      rentinfo += "30 Días, Costo: $"+costs[6]+".00 <br>"}
                else if(days_temp >= 15){ rentcost += costs[5]; days_temp -=15; rentinfo += "15 Días, Costo: $"+costs[5]+".00 <br>"}
                else if(days_temp >= 7) { rentcost += costs[4]; days_temp -=7;  rentinfo += "7  Días, Costo: $"+costs[4]+".00 <br>"}
                else if(days_temp >= 4) { rentcost += costs[3]; days_temp -=4;  rentinfo += "4  Días, Costo: $"+costs[3]+".00 <br>"}
                else if(days_temp >= 3) { rentcost += costs[2]; days_temp -=3;  rentinfo += "3  Días, Costo: $"+costs[2]+".00 <br>"}
                else if(days_temp >= 2) { rentcost += costs[1]; days_temp -=2;  rentinfo += "2  Días, Costo: $"+costs[1]+".00 <br>"}
                else if(days_temp >= 1) { rentcost += costs[0]; days_temp -=1;  rentinfo += "1  Días, Costo: $"+costs[0]+".00 <br>"}
            }
    
            rentinfo += "<strong>Cobro: "+days+" Días, <em>SubTotal: $" + rentcost + ".00</em></strong>";

            closeModalMachine();
            
            // ASIGNAMOS DE FORMA GLOBAL LA MAQUINA AGREGADA **************************
            var machinerent = {
                machine_id: machineSelected.id,
                dateinit: init.toString(),
                dateend: end.toString(),
                rentcost: rentcost,
                extradays: widthoutcost,
                description: rentinfo,
                concret: false
            };
            window.machines.push(machinerent);
            // ASIGNAMOS DE FORMA GLOBAL LA MAQUINA AGREGADA **************************
            
            return rentinfo;
        }

        return null;
    }

    function validateDate(init, end){
        var date1 = init.split('-');
        var dateInit = new Date(parseInt(date1[2]),parseInt(date1[1]),parseInt(date1[0]));
        
        var date2 = end.split('-');
        var dateEnd = new Date(parseInt(date2[2]),parseInt(date2[1]),parseInt(date2[0]));

        return dateEnd.getTime() - dateInit.getTime();
    }

    
    function getFormatDate(date){
        date = date.split('-'); 
        var months = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre', 'Diciembre'];
        var day = date[0];
        var month = parseInt(date[1]);
        var year = date[2];
        return day +' de '+ months[month-1]+' de '+ year;
    }

    function closeModalMachine(){
        var modalMachine = $('#modalMachine');
        var instanceModal = M.Modal.getInstance(modalMachine);
        instanceModal.close();
        return true;
    }

});