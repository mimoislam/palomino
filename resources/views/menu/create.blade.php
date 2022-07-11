@extends('layouts.app')

@include('layouts.navbars.homenavbar')
@include('layouts.sidebar')
  <title>Dashboard</title>
    @section('content')


    <div class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
          <div class="content-wrapper p-5">
      
          <h1>Creer Un Menu</h1>
      
    
         
          <form method="POST" action="{{route("menu.store")}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="iputnom">Nom du menu</label>
                <input type="text" class="form-control" name="name" id="iputnom" placeholder="Enter le Nom">
              </div>
              
              <div class="form-group">
                <label for="image">L'image du Menu</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="imaged"/>
                    <label class="custom-file-label" for="imaged">Ajouter une image</label>
                  </div>
                  <div class="input-group-append">
                    <input type="submit" class="btn btn-success" value="Ajouter">
                  </div>
                </div>
              </div>
            
            </div>
      
      
      
      </div>
      </div>
      
      



    