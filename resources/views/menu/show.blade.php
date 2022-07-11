@extends('layouts.app')

@include('layouts.navbars.homenavbar')
@include('layouts.sidebar')
  <title>{{$menu->name}}</title>
    @section('content')

<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper p-5">
    <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            {{$menu->name}}
          </h3>
        </div>
            <div class="card-body align-items-center">
            
                    <img  src="{{asset('images/'. $menu->image )}}">

                
          </div>
          <div class="card-footer">
            Menu Ajouté le {{$menu->created_at}}
          </div>
</div>
    </div>
    

</div>


