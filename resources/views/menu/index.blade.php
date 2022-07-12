@extends('layouts.app')

@include('layouts.navbars.homenavbar')
@include('layouts.sidebar')
  <title>Menus</title>
    @section('content')

    <div class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
        
          <div class="content-wrapper p-5">
        
            <h1 >Menus</h1>
        
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
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($menus as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td><a href="{{ URL::to('menu/' . $value->id) }}"> <img width="50px" src="{{asset('images/'. $value->image )}}"></td>
                        
        
                        
                        <td>
        
                           
                           <div class="d-flex align-items-start">
                            <a class="btn btn-small btn-success mr-1" href="{{ URL::to('menu/' . $value->id) }}">Show</a>
        
                           
                            <a class="btn btn-small btn-info mr-1" href="{{ URL::to('menu/' . $value->id . '/edit') }}">Edit</a>
                            <form  action="menu/{{$value->id}}" method="POST">
                              @csrf
                              @method('delete')
                              <button type="submit" class=" mr-1 btn btn-small btn-danger"> Remove</button>
                              
                            </form> 
                           </div>
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