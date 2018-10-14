@if(Session::has('error'))
    <script>
        $(document).ready(function(){
            var message = "{{Session::get('error')}}" ;
            M.toast({html: message});
        });
    </script>
@endif