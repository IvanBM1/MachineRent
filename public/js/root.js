$(document).ready(function(){
    $('.sidenav').sidenav();
    $('select').formSelect();
    $('.dropdown-trigger').dropdown();
    $('.modal').modal();
    $('.collapsible').collapsible();
    
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy'
    });
});