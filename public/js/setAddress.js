$(document).ready(function(){

    $('#submitAddress').click(function(){
        $("#fiscal").val(!!$("#fiscal").prop("checked"));
        $("#formAddress").submit();
    });

});