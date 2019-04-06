@extends('layouts.layout')

@section('title') Atlas @endsection

@section('content')


<h1> OLá MUndo! </h1>

<div class="row">
    @foreach($Modelo as $mod)
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$mod->nome}}</h5>
                    <p class="card-text">Alguma descrição</p>
                    <a href="#" class="btn btn-primary"> Ir </a>
                </div>
            </div>
        </div>
    @endforeach
</div>


@endsection