$(document).ready(function(){

    var route = "http://127.0.0.1:8000/searchclients?search=";
    var clientSelected;

    $('#openModalClient').click(function(){
        clientSelected = null;
        $('#collectionClient').empty();
    });

    $('#searchClient').keypress(function(event){
        if(event.keyCode == 13){
            var collection = $('#collectionClient');
            collection.html("Cargando...");
            
            $.get(route + $('#searchClient').val(),function(response){
                collection.empty();

                if(response.length > 0)
                    $(response).each(function(key, client){ appendClient(this, client); });
                else
                    collection.html("<h5 class='center-align' >Sin resultados!</h5>");
            });
        }
    });

    function appendClient(client){
        var collection = $('#collectionClient');
        var li = $('<li/>')
            .addClass('collection-item avatar')
            .appendTo(collection)
            .click(function(){
                this.setAttribute("data-id", client.id);
                setSelectedClient(this, client); 
            });
        
        var a = $('<a/>',{href: '#',style: 'color: #666;'}).appendTo(li);                    
        $('<span>').addClass('title').text(client.name).appendTo(a);
        $('<i>').addClass('material-icons circle gray').text('domain').appendTo(a);
        $('<p>').html(client.phone+"<br>"+client.email).appendTo(a);
    }

    function setSelectedClient(li, client){
        clientSelected = client;
        li.style.background = "#dedede";

        var input = li.getElementsByTagName('input')[0]; 
        var collection = $('#collectionClient');
        var items = collection[0].childNodes;

        var i = 0;
        while(items.length != 1){
            if(items[i] == li ) i++;
            else items[i].remove();
        }
    }

    $('#addClient').click(function(){
        var collection = $('#collectionClient');
        var nodes = collection[0].childNodes; 
        if( nodes.length == 1 && nodes[0].nodeName != "#text"){
            if(nodes[0].getAttribute("data-id") != null) setDataClient();
        }
    });

    function setDataClient(){
        $("#client_id").val(clientSelected.id);
        $("#client_name").text(clientSelected.name);
        $("#client_phone").text(clientSelected.phone);
        $("#client_email").text(clientSelected.email);
        $("#itemClient").css("display", "block");
        
        clearClientData();
    }

    function clearClientData(){
        $("#itemAddress").css("display", "none");
        $("#itemEmployee").css("display", "none");

        $("#address_id").val("");
        $("#employee_id").val("");
    }

});