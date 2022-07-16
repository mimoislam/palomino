@extends('layouts.app')

@include('layouts.navbars.homenavbar')
@include('layouts.sidebar')
  <title>{{$plat->name}}</title>
    @section('content')

<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper p-5">
    <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            <a href="{{route('plat.index')}} "class="btn btn-small btn-info mr-3" ><i class="fa-solid fa-angle-left"></i></a>

            <h3>{{$plat->name}}</h3>
          </h3>
        </div>
            <div class="card-body align-items-center">
            
                    <img  src="{{asset('images/'. $plat->imagePath )}}">

                <hr> 
            </div>
          <h3 class="ml-3">Description</h3>
          <p class="ml-5">{{$plat->description}}</p>

          <h3 class="ml-3">Prix</h3>
          <p class="ml-5">{{$plat->price}} DA</p>
          <hr>

          <h3 class="ml-3">Type</h3>
          
          <p class="ml-5">
            @if($plat->type)
            {{ $plat->type->name }}
            @else
             --- 
            @endif         </p>
         
          <hr> 
          <div class="card-footer">
            Plat Ajouté le {{$plat->created_at}}
          </div>
</div>
    </div>
    

</div>


