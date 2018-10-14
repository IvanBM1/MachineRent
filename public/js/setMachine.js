$(document).ready(function(){
    window.machines = [];

    window.removeMachine = function(id){
        
        var local = [];

        for(var i=0; i<window.machines.length; i++)
            if(window.machines[i].machine_id == id) continue;
            else local.push(window.machines[i]);
        
        window.machines = local;
        $('#machine_'+id).remove();
    };

    window.inArray = function(id){
        var temp = window.machines;
        for(var i=0; i<temp.length; i++)
            if( temp[i].machine_id == id ) return true;
        return false;
    };

    $('#submitForm').click(function(){
        $("#machines_ids").val(getFormatIDS());
        $("#formSend" ).submit();
    });

    function getFormatIDS(){
        var machines = window.machines;

        var strSend = "";
        for(var i=0; i < machines.length; i++){
            strSend +=  machines[i].machine_id 
                + "&" + machines[i].dateinit 
                + "&" + machines[i].dateend 
                + "&" + machines[i].rentcost 
                + "&" + machines[i].extradays 
                + "&" + machines[i].description 
                + "*";
        }

        return strSend; 
    }

    $('#openModalInfo').click(function(){
        $("#info_iva").css("display","none");
        $("#show_iva").css("display","none");

        var machines = window.machines;
        
        var extracost = $("#extracost").val();
        var iva = $("#iva").val();
        var discount = $("#discount").val();
        var payment = $("#payment").val();
        var check_total = $("#check_total").prop("checked");
    
        var total = 0;
        for(var i=0; i < machines.length; i++){
            total += machines[i].rentcost;
        }

        if(extracost != "") total += parseInt(extracost);
        
        $("#info_total").html("$"+parseInt(total)+".00");

        if(discount != "") {
            total -= parseInt(discount);
            $("#info_discount").html("-$"+discount+".00 = $"+parseInt(total)+".00");
        }else
            $("#info_discount").html("$0.00");

        var totalIVA = 0;
        if(iva != "") {
            totalIVA = total + total * (parseInt(iva)/100);
            $("#info_iva").html("$"+parseInt(totalIVA)+".00");
            $("#info_iva").css("display","block");
            $("#show_iva").css("display","block");
        }
        
        if(check_total && iva != "") payment = totalIVA;
        else if(check_total && iva == "") payment = total;
        
        var remaining = 0;
        if(iva != "") remaining = totalIVA - payment;
        else    remaining = total - payment; 
        
        $("#payment").val(parseInt(payment));
        $("#info_partial").html("$"+parseInt(payment)+".00");
        $("#info_remaining").html("$"+parseInt(remaining)+".00");
        

        $("#total").val(total);
    });

});