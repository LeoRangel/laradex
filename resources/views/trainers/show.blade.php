@extends('layouts.app')

@section('title', 'Trainers')

@section('content')

    @include('common.success')

    <img style='height: 200px; width: 200px; background-color: #EFEFEF; margin: 20px;' class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="">
    <div class="text-center">
        <h5 class="card-title">{{$trainer->name}}</h5>
        <p class="card-text">Complete description of the trainer.</p>
        <a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>

        <form method="POST" action="/trainers/{{$trainer->slug}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <div class="form-group">
              <input type="submit" class="btn btn-danger" value="Delete">
            </div>
        </form>
    </div>



@endsection