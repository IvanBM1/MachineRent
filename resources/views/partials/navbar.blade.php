<nav>
    <div class="nav-wrapper indigo darken-1">
    <a href="#" data-target="mobile_menu" class="sidenav-trigger noPrint"><i class="material-icons">menu</i></a>
    <ul class="left hide-on-med-and-down">
        <li><a href="/" style="font-size: 1.5em;" class="toPrint">Zeycom</a></li>
        <li><a href="/rent" class="noPrint">Rentas</a></li>
        <li><a href="/maintenance" class="noPrint">Servicio</a></li>
        <li><a href="/sale" class="noPrint">Ventas</a></li>
        <li><a href="/machine" class="noPrint">Maquinas</a></li>
        <li><a href="/client" class="noPrint">Clientes</a></li>
    </ul>
    <ul class="right noPrint">

        <li><a href="#" class='dropdown-trigger' data-target='session_drop' style="
        width: 150px !important;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row-reverse;
        "><i class="material-icons right">account_circle</i>@if(isset(Auth::user()->name)){!!Auth::user()->name!!}@endif</a></li>

        <!-- Dropdown Structure -->
        <ul id='session_drop' class='dropdown-content'>
        <li><a href="/user/create">Nueva Cuenta</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a href="/logout">Cerrar Sesión</a></li>
        </ul>

    </ul>
    </div>
</nav>

<ul class="sidenav noPrint" id="mobile_menu">
    <li><a href="/rent">Rentas</a></li>
    <li><a href="/sale">Ventas</a></li>
    <li><a href="/sale">Mantenimiento</a></li>
    <li><a href="/machine">Maquinas</a></li>
    <li><a href="/client">Clientes</a></li>
</ul>