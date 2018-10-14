$(document).ready(function(){
    
    $("#updateMachine").click(function(){

        var info = getInfoMachine(); 

        if( info != null){
            $("#machinerent_info").html(info);

            var modal = $("#modalInfo");
            var modalinstance = M.Modal.getInstance(modal);
            modalinstance.open();
        }
    });
    
    $("#submitForm").click(function(){
        $("#formUpdateMachine").submit();
    });

    function getInfoMachine(){

        var machineSelected = window.machineSelected;

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
    
            var extradays = parseInt($('#extradays').val()+"");

            if(extradays > 0){
                days -= extradays;
                rentinfo += "Días de regalo: " + extradays + " <br>";
            }else extradays = 0;
    
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

            
            $("#dateinit").val(init.toString());
            $("#dateend").val(end.toString());
            $("#rentcost").val(rentcost);
            $("#extradays").val(extradays);
            $("#description").val(rentinfo);

            debugger;

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

});