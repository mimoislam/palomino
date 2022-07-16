@extends('layouts.app')

@include('layouts.navbars.homenavbar')
@include('layouts.sidebar')
  <title>Menus</title>
    @section('content')

    <div class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
         
          <div class="content-wrapper p-5">
          
            <div class="d-flex justify-content-end">
             
              <a href="{{ route('menu.trash') }}" class="  btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
            
            </div>  
          <div class="d-flex justify-content-start mb-3">
            <h1 >Menus</h1>
            <a href="{{ route('menu.create') }}" class ="ml-3   mb-3 mt-2 btn btn-small btn-success text-center"><i class="fa-solid fa-plus"></i></a>
          
          </div>  
          <hr>
        
            <!-- will be used to show any messages -->
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
        
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Plats</th>
                       
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($menus as $key => $value)
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
                   
        
                        
                        <td>
        
                           
                           <div class="d-flex align-items-start">
                            <a class="btn btn-small btn-success mr-1" href="{{ URL::to('menu/' . $value->id) }}"><i class="fa-solid fa-angle-right"></i></a>
        
                           
                            <a class="btn btn-small btn-info mr-5" href="{{ URL::to('menu/' . $value->id . '/edit') }}"><i class="fa-solid fa-pen"></i></a>
                            <form  action="menu/{{$value->id}}" method="POST">
                              @csrf
                              @method('delete')
                              <button type="submit" class=" mr-1 btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                              
                            </form> 
                           </div>
                        </td> 
                        </td>
                        
                    </tr>
                @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
          </div>
        </div>
        <!-- ./wrapper -->
        
        
        
        </div>