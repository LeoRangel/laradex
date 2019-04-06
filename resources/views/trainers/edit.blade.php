@extends('layouts.app')

@section('title', 'Trainers - Edit')

@section('content')

    <div class="container">
        <h1> EDIT TRAINER </h1>

        <form class="form-group" method="POST" action="/trainers/{{$trainer->slug}}" enctype="multipart/form-data">
            
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="{{$trainer->name}}">
            </div>

            <!-- <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{$trainer->slug}}">
            </div> -->

            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" name="avatar" value="{{$trainer->avatar}}">
            </div>

            <button tpye="submit" class="btn btn-primary">Update</button>
        </form>
    </div> 


@endsection