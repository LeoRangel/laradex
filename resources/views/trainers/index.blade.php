@extends('layouts.app')

@section('title', 'Trainers')

@section('content')


    <h1 style=''> TRAINERS </h1>
    <br><br>
    <div class="row">
        @foreach($trainers as $trainer)
            <div class="col-sm">
                <div class="card text-center" style="width: 18rem;">
                    <img style='height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;' class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$trainer->name}}</h5>
                        <p class="card-text">Some quick description of the trainer.</p>
                        <a href="/trainers/{{$trainer->slug}}" class="btn btn-primary"> See more </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection