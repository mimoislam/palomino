@extends('layouts.app')

@include('layouts.navbars.homenavbar')
@include('layouts.sidebar')
  <title>Dashboard</title>
    @section('content')


    <div class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
          <div class="content-wrapper p-5">
      
         
      
          <div class="d-flex justify-content-start mb-3">
            
            <a href="{{ route('menu.index') }}" class ="ml-3 mr-3    mb-3 mt-2 btn btn-small btn-info text-center"><i class="fa-solid fa-angle-left"></i></a>
            <h1>Modifier le Menu <em>"{{$menu->name}}"</em></h1>
          </div>  
          <hr>
    
         
          <form method="POST" action="{{route("menu.update",$menu->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="iputnom">Nom du menu</label>
                <input type="text" class="form-control" name="name" id="iputnom" value="{{$menu->name}}">
              </div>
              
              <div class="form-group">
                <label for="image">L'image du Menu</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="imaged" />
                    <label class="custom-file-label" for="imaged">Modifier l'image</label>
                  </div>
                  <div class="input-group-append">
                    <input type="submit" class="btn btn-primary" value="Modifier">
                  </div>
                </div>
              </div>
            
            </div>
      
      
      
      </div>
      </div>
      
      



    