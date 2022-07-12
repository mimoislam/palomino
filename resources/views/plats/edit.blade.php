@extends('layouts.app')

@include('layouts.navbars.homenavbar')
@include('layouts.sidebar')
  <title>Edit</title>
    @section('content')


    <div class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
          <div class="content-wrapper p-5">
      
          <h1>Modifier le Plat<em>"{{$plat->name}}"</em></h1>
      
    
         
          <form method="POST" action="{{route("plat.update",$plat->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="iputnom">Nom du plat</label>
                <input type="text" class="form-control" name="name" id="iputnom" value="{{$plat->name}}">
              </div>
              <div class="form-group">
                <label for="iputnom">Description</label>
                <input type="text" class="form-control" name="description" id="iputnom" value="{{$plat->description}}" placeholder="Enter la description">
              </div>  
              <div class="form-group">
                <label for="iputnom">Prix</label>
                <input type="number" min="0" class="form-control" name="prix" id="iputnom" value="{{$plat->price}}" placeholder="Enter le prix">
              </div> 
              <div class="form-group">
                <label>Type</label>
                <select name="type_id" class="form-control select2"  style="width: 100%;">

                    @foreach($types as $key => $type)
                    @if($type->name == $plat->type->name)
                        <option selected value={{$type->id}}>{{$type->name}}</option>
                    @else
                        <option value={{$type->id}}>{{$type->name}}</option>
                    @endif
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="image">L'image du Plat</label>
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
      
      



    