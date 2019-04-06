@extends('layouts.app')

@section('title', 'Trainers - Create')

@section('content')

    <div class="container">

        @include('common.erros')
        

        <h1> NEW TRAINER </h1>

        <form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" name="avatar">
            </div>

            <button tpye="submit" class="btn btn-primary">Save</button>
        </form>
    </div> 


@endsection