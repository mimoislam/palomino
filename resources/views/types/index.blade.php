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
            <h1 >Types</h1>
            <form method="POST" action="{{route("type.store")}}" >
                @csrf
              <div class="form-group">
              
                <div class="input-group">
                    <div class="custom-file">
                        <input type="text" class="form-control" name="name" placeholder="Ajouter un type">
                      
                    </div>
                    <div class="input-group-append">
                      <input type="submit" class="btn btn-success" value="Ajouter">
                    </div>
                  </div>
            
              </div>
            </form>
            <h3>Tous les types</h3>
            <!-- will be used to show any messages -->
           
            <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($types as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                      
                        <td>{{ $value->name }}</td>
                        
                        <td>
        
                           
                           <div class="d-flex align-items-start">                      
                            <a class="btn btn-small btn-info mr-1" href="{{ URL::to('type/' . $value->id . '/edit') }}"><i class="fa-solid fa-pen"></i></a>
                            <form  action="/type/{{$value->id}}" method="POST">
                              @csrf
                              @method('delete')
                              <button type="submit" class=" ml-5 btn btn-small btn-danger"> <i class="fa-solid fa-trash-can"></i></button>
                              
                            </form> 
                           </div>
                        </td>
                        
                    </tr>
                @endforeach
                  </tbody>
                </table>
              </div>
                
            <form method="POST" action="{{route("type.store")}}" >
                
            </form>
            <!-- /.card-header -->
            
              <!-- /.card-body -->
          </div>
        
        </div>
        <!-- ./wrapper -->
        
        
        
        </div>