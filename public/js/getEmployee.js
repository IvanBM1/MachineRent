$(document).ready(function(){

    var route = "http://127.0.0.1:8000/searchemployee?search=";
    var employeeSelected;

    $("#searchEmployee").click(function(){
        var collection = $('#collectionEmployee');
        collection.html("Cargando...");

        $.get(route + $("#client_id").val(),function(response){
            collection.empty();

            if(response.length > 0)
                $(response).each(function(key, employee){ appendEmployee(employee); });
            else
                collection.html("<h5 class='center-align' >Sin resultados!</h5>");
        });
    });

    function appendEmployee(employee){
        var collection = $('#collectionEmployee');
        var li = $('<li/>')
            .addClass('collection-item avatar')
            .appendTo(collection)
            .click(function(){
                this.setAttribute("data-id", employee.id);
                setSelectedEmployee(this, employee); 
            });
        
        var a = $('<a/>',{href: '#',style: 'color: #666;'}).appendTo(li);                    
        $('<span>').addClass('title').text(employee.name).appendTo(a);
        $('<i>').addClass('material-icons circle gray').text('face').appendTo(a);
        $('<p>').html(employee.phone+"<br>"+employee.email).appendTo(a);
    }

    function setSelectedEmployee(li, employee){
        employeeSelected = employee;
        li.style.background = "#dedede";

        var collection = $('#collectionEmployee');
        var items = collection[0].childNodes;

        var i = 0;
        while(items.length != 1){
            if(items[i] == li ) i++;
            else items[i].remove();
        }
    }

    $('#addEmployee').click(function(){
        var collection = $('#collectionEmployee');
        var nodes = collection[0].childNodes; 
        if( nodes.length == 1 && nodes[0].nodeName != "#text"){
            if(nodes[0].getAttribute("data-id") != null) setDataEmployee();
        }
    });

    function setDataEmployee(){
        $("#employee_id").val(employeeSelected.id);
        $("#employee_name").text(employeeSelected.name);
        $("#employee_position").text(employeeSelected.position);

        $("#employee_phone").text(employeeSelected.phone);
        
        $("#employee_email").text(employeeSelected.email);
        $("#itemEmployee").css("display", "block");
    }

});