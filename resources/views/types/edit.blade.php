@extends('layouts.app')

@include('layouts.navbars.homenavbar')
@include('layouts.sidebar')
  <title>Types</title>
    @section('content')

    <div class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
        
          <div class="content-wrapper p-5">
            @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
             @endif
            <h1 >modifier le type {{$type->id}}</h1>

            <form method="POST" action="{{route("type.update",$type->id)}}">
                @csrf
                @method('PUT')

                <div class="input-group">
                    <div class="custom-file">
                        <input type="text" class="form-control" name="name" value="{{$type->name}}">
                      
                    </div>
                    <div class="input-group-append">
                      <input type="submit" class="btn btn-primary" value="modifier">
                    </div>
                  

                </div>
            </form>