@extends('layouts.layout')

@section('title') Atlas @endsection

@section('content')



<h1> OLá MUndo! </h1>

<form action="/test" class="form-group" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" name="nome" class="form-control">
    </div>
    <button tpye="submit" class="btn btn-primary">Salvar</button>
</form>


@endsection