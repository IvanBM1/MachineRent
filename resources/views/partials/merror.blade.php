@if($errors && count($errors) > 0)
   @foreach($errors->all() as $error)
   <script>
        $(document).ready(function(){
            var message = "{!!$error!!}" ;
            M.toast({html: message});
        });
    </script>
    @endforeach
@endif