@extends('layouts.card')
@section('title','Rentas')
@section('card_title','Rentas')
@section('card_content')

    <div class="col s12 right-align">
        <a href="/rent/create" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Agegar</a>
    </div>

    <form action="/rent" method="get">
        <div class="input-field col s12 m8 offset-m2">
            <i class="material-icons prefix">search</i>
            <input id="seach" type="text" class="validate" name="search">
            <label for="seach">Buscar</label>
        </div>
    </form>

    <div class="col s12 m8 offset-m2">
    
        <ul class="collection">
            @foreach($rents as $rent)
                <a href="/rent/{{$rent->id}}" style="color:#666;">
                    <li class="collection-item avatar">
                        <i class="material-icons circle">folder</i>
                        <span class="title">{{$rent->client->name}}</span>
                        @if($rent->total - $rent->payment > 0)
                            @if($rent->iva > 0)
                            <p class="orange-text">Pago Pendiente: ${{intval(($rent->total + ($rent->total * ($rent->iva / 100))) - $rent->payment)}}.00<br></p>
                            @else
                            <p class="orange-text">Pago Pendiente: ${{$rent->total - $rent->payment}}.00<br></p>
                            @endif
                        @else
                            <p class="green-text">Pago Completo<br></p>
                        @endif
                        <p>
                            {{$rent->created_at->format('d-m-Y')}}
                        </p>
                        <a href="/rent/{{$rent->id}}/edit" class="secondary-content"><i class="material-icons">edit</i></a>
                    </li>
                </a>
            @endforeach
        </ul>
    </div>

    <div class="row center-align">
        <div class="col s12">
            {!! $rents->render() !!}
        </div>
    </div>
@stop