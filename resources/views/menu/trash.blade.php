@extends('layouts.app')

@include('layouts.navbars.homenavbar')
@include('layouts.sidebar')
  <title>Menus</title>
    @section('content')

    <div class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
        
          <div class="content-wrapper p-5">
       
          <div class="d-flex justify-content-start mb-3">
            <a href="{{route('menu.index')}} "class="btn btn-small btn-info ml-3 mt-2 mb-3 mr-3" ><i class="fa-solid fa-angle-left"></i></a>
            <h1 >Trash </h1>
          
          </div>  
          <hr>
        
            <!-- will be used to show any messages -->
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
        
            <!-- /.card-header -->
            <div class="card-body p-0">
                @if($trash->isNotEmpty())
                <table class="table table-striped">
                  <thead>
                    
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Plats</th>
                        <th>Deleted_at</th>
                       <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  
                        @foreach($trash as $key => $value)
                            <tr>
                             <td>{{ $value->id }}</td>
                             <td>{{ $value->name }}</td>
                                <td><a href="{{ URL::to('menu/' . $value->id) }}"> <img width="50px" src="{{asset('images/'. $value->image )}}"></td>
                            <td>
                           
                                @if($value->plats->isNotEmpty())
                                    @foreach($value->plats as $plat)
                                    {{$plat->name}}
                                    
                                    <img width="50px"src="{{asset('images/'. $plat->imagePath )}}">
                                    <hr>
                                    @endforeach
                                @else 
                                    ---
                                @endif
                            
                            </td>
                            <td>
                            {{$value->deleted_at}}
                        </td>
                        <td>
                       
                           
                           <div class="d-flex align-items-start">

                            <a class="btn btn-small btn-success mr-5" href="{{ URL::to('menu/trash/' . $value->id) }}"><i class="fa-solid fa-trash-arrow-up"></i></a>
        
                           
                           
                            <form  action="/menu/trash/{{$value->id}}" method="POST">
                              @csrf
                              @method("delete")
                              <button type="submit" class=" mr-1 btn btn-small btn-danger"><i class="fa-solid fa-ban"></i></button>
                              
                            </form> 
                           </div>
                        </td>
                        
                    </tr>
                @endforeach
               
                  </tbody>
                </table>
                @else
                <div class="text-center">
                    
                    <h3>Vide</h3>
                </div>
                @endif
              </div>
              <!-- /.card-body -->
          </div>
        </div>
        <!-- ./wrapper -->
        
        
        
        </div>