$(document).ready(function(){

    var route = "http://127.0.0.1:8000/searchaddress?search=";
    var addressSelected;

    $("#searchAddress").click(function(){
        var collection = $('#collectionAddress');
        collection.html("Cargando...");

        $.get(route + $("#client_id").val(),function(response){
            collection.empty();

            if(response.length > 0)
                $(response).each(function(key, address){ appendAddress(address); });
            else
            collection.html("<h5 class='center-align' >Sin resultados!</h5>");
        });
    });

    function appendAddress(address){
        var collection = $('#collectionAddress');
        var li = $('<li/>')
            .addClass('collection-item avatar')
            .appendTo(collection)
            .click(function(){
                this.setAttribute("data-id", address.id);
                setSelectedAddress(this, address); 
            });
        
        var a = $('<a/>',{href: '#',style: 'color: #666;'}).appendTo(li);                    
        $('<span>').addClass('title').text(address.colony).appendTo(a);
        $('<i>').addClass('material-icons circle gray').text('home').appendTo(a);
        $('<p>').html(address.street+"<br>"+address.state).appendTo(a);
    }

    function setSelectedAddress(li, address){
        addressSelected = address;
        li.style.background = "#dedede";

        var collection = $('#collectionAddress');
        var items = collection[0].childNodes;

        var i = 0;
        while(items.length != 1){
            if(items[i] == li ) i++;
            else items[i].remove();
        }
    }

    $('#addAddress').click(function(){
        var collection = $('#collectionAddress');
        var nodes = collection[0].childNodes; 
        if( nodes.length == 1 && nodes[0].nodeName != "#text"){
            if(nodes[0].getAttribute("data-id") != null) setDataAddress();
        }
    });

    function setDataAddress(){
        $("#address_id").val(addressSelected.id);

        $("#address_colony").text(addressSelected.colony);
        $("#address_street").text(addressSelected.street);
        $("#address_numberext").text(addressSelected.numberext);
        $("#address_state").text(addressSelected.state);

        $("#itemAddress").css("display", "block");
    }

});