@extends('layouts.app')

@include('layouts.navbars.homenavbar')
@include('layouts.sidebar')
  <title>Plats</title>
    @section('content')


    <div class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
          <div class="content-wrapper p-5">
            
            <div class="d-flex justify-content-start mb-3">
              <a href="{{route('plat.index')}} "class="btn btn-small btn-info ml-3 mt-2 mb-3 mr-3" ><i class="fa-solid fa-angle-left"></i></a>
              <h1>Ajouter Un Plat</h1>
          
            
            </div>  
         
    
         
          <form method="POST" action="{{route("plat.store")}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="iputnom">Nom du plat</label>
                <input type="text" class="form-control" name="name" id="iputnom" placeholder="Enter le Nom">
              </div>
              <div class="form-group">
                <label for="iputnom">Description</label>
                <input type="text" class="form-control" name="description" id="iputnom" placeholder="Enter la description">
              </div>    
              <div class="form-group">
                <label for="iputnom">Prix</label>
                <input type="number" min="0" class="form-control" name="prix" id="iputnom" placeholder="Enter le prix">
              </div> 
              <div class="form-group">
                <label>Type</label>
                <select name="type_id" class="form-control select2"  style="width: 100%;">

                    @foreach($types as $key => $type)
                  <option value={{$type->id}}>{{$type->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="image">L'image du plat</label>
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
      
      



    