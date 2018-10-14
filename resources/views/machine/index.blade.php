@extends('layouts.card')
@section('title','Maquinas')
@section('card_title','Maquinas')
@section('card_content')

    <div class="row">
        
        <div class="col s12 right-align">
            <a href="/machine/create" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Agegar</a>
        </div>

        <form action="/machine" method="get">
            <div class="input-field col s12 m8 offset-m2">
            <i class="material-icons prefix">search</i>
                <input id="seach" type="text" class="validate" name="search">
                <label for="seach">Buscar</label>
            </div>
        </form>

        <div class="col s12 m8 offset-m2">
        
            <ul class="collection">
                @foreach($machines as $machine)

                <li class="collection-item avatar">
                    <a href="machine/{{$machine->id}}" style="color: #666;">
                        @if($machine->status == 1)
                        <i class="material-icons circle green">beenhere</i>
                        @endif
                        @if($machine->status == 2)
                        <i class="material-icons circle orange">group</i>
                        @endif
                        @if($machine->status == 3)
                        <i class="material-icons circle red">build</i>
                        @endif
                        <span class="title"><strong>{{$machine->economic}}</strong></span>
                        <p>{{$machine->brand}} <br> {{$machine->model}}</p>
                        <a href="/machine/{{$machine->id}}/edit" class="secondary-content"><i class="material-icons">edit</i></a>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        
    </div>
    <div class="row center-align">
        {!! $machines->render() !!}
    </div>
@stop