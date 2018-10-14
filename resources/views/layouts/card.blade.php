@extends('layouts.main')
@include('partials.navbar')

@section('link')
<style type="text/css" media="print">
    .noPrint{
        display: none !important;
    }
    .toPrint{
        display: block !important;
    }
    .card{
        border: none !important;
        box-shadow: none !important;
    }
</style>
@stop

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card">
            <div class="card-content">
                <span class="card-title center-align noPrint">@yield('card_title')</span>
                <div class="row">
                    @yield('card_content')
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@stop
