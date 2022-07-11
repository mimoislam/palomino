@extends('layouts.app')

@include('layouts.navbars.homenavbar')
@include('layouts.sidebar')
  <title>Plats</title>
    @section('content')

    <div class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
        
          <div class="content-wrapper p-5">
        
            <h1 >Plats</h1>
        
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($plats as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                      
                        <td> <a href="{{asset('images/'.$value->imagePath )}}"><img width="50px" src="{{asset('images/'. $value->imagePath )}}"></a></td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->price }}</td>
                        <td>{{ $value->type->name }}</td>
        
                        
                        <td>
        
                           
                           <div class="d-flex align-items-start">
                            <a class="btn btn-small btn-success mr-1" href="{{ URL::to('plat/' . $value->id) }}">Show</a>
        
                           
                            <a class="btn btn-small btn-info mr-1" href="{{ URL::to('plat/' . $value->id . '/edit') }}">Edit</a>
                            <form  action="/plat/{{$value->id}}" method="POST">
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