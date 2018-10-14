@extends('layouts.card')
@section('title','Clientes')
@section('card_title','Clientes')
@section('card_content')

    <div class="row">
        
        <div class="col s12 right-align">
            <a href="/client/create" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Agegar</a>
        </div>

        <form action="/client" method="get">
            <div class="input-field col s12 m8 offset-m2">
                <i class="material-icons prefix">search</i>
                <input id="seach" type="text" class="validate" name="search">
                <label for="seach">Buscar</label>
            </div>
        </form>

        <div class="col s12 m8 offset-m2">
        
            <ul class="collection">
                @foreach($clients as $client)
                <li class="collection-item avatar">
                    <a href="/client/{{$client->id}}" style="color: #666;">
                        <i class="material-icons circle gray">face</i>

                        <span class="title">{{$client->name}}</span>
                        <p>{{$client->phone}}<br>
                            {{$client->email}}
                        </p>
                        <a href="/client/{{$client->id}}/edit" class="secondary-content"><i class="material-icons">edit</i></a>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        
    </div>
    <div class="row center-align">
        {!! $clients->render() !!}
    </div>

@stop