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

             <div class="d-flex justify-content-start mb-3">
             <a href="{{route('type.index')}} "class="btn btn-small btn-info ml-3 mt-2 mb-3 mr-3" ><i class="fa-solid fa-angle-left"></i></a>
            
             <h1>Trash</h1>
          
             </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($trash as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                      
                        <td>{{ $value->name }}</td>
                        
                        <td>
        
                           
                           <div class="d-flex align-items-start">                      
                            <a class="btn btn-small btn-info mr-1" href="{{ URL::to('type/trash/' . $value->id) }}"><i class="fa-solid fa-trash-arrow-up"></i></a>
                            <form  action="/type/trash/{{$value->id}}" method="POST">
                              @csrf
                              @method('delete')
                              <button type="submit" class=" ml-5 btn btn-small btn-danger"> <i class="fa-solid fa-ban"></i></button>
                              
                            </form> 
                           </div>
                        </td>
                        
                    </tr>
                @endforeach
                  </tbody>
                </table>
              </div>
                
          
            <!-- /.card-header -->
            
              <!-- /.card-body -->
          </div>
        
        </div>
        <!-- ./wrapper -->
        
        
        
        </div>