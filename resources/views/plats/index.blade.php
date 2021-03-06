@extends('layouts.app')

@include('layouts.navbars.homenavbar')
@include('layouts.sidebar')
  <title>Plats</title>
    @section('content')

    <div class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">


          <div class="content-wrapper p-5">
            <div class="d-flex justify-content-end">

              <a href="{{ route('plat.trash') }}" class="  btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>

            </div>
            <div class="d-flex justify-content-start mb-3">
              <h1 >Plats</h1>
              <a href="{{ route('plat.create') }}" class ="ml-3   mb-3 mt-2 btn btn-small btn-success text-center"><i class="fa-solid fa-plus"></i></a>

            </div>
            <hr>

            <!-- will be used to show any messages -->
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif


{{--              <select id="countryChart" name="competition_id" class="form-control col-md-7 col-xs-12" onchange="this.form.submit()">--}}
{{--                  <option value="all">All Time</option>--}}
{{--                  @foreach($menus as $menu)--}}
{{--                      <option {{ (($competitionId == $menu->id) ? "selected":"") }} value="{{$menu->id}}">--}}
{{--                          {{$menu->name}}--}}
{{--                      </option>--}}
{{--                  @endforeach--}}
{{--              </select>--}}


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
                        <th>Menu</th>
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
<<<<<<< HEAD
                        <td>  <a class="btn btn-small btn-info mr-1" href="{{ URL::to('menu/' . $value->menu->id ) }}">{{ $value->menu->name }}</a></td>
                        <td>{{ $value->type->name }}</td>


=======
                        <td>
                          @if($value->type)
                          {{ $value->type->name }}
                          @else
                            <p>---</p>
                          @endif
                        </td>


>>>>>>> bad154a6b6e48d0372962c21f818a7175c0d8fa3
                        <td>


                           <div class="d-flex align-items-start">
<<<<<<< HEAD
                            <a class="btn btn-small btn-success mr-1" href="{{ URL::to('plat/' . $value->id) }}">Show</a>


                            <a class="btn btn-small btn-info mr-1" href="{{ URL::to('plat/' . $value->id . '/edit') }}">Edit</a>
=======
                            <a class="btn btn-small btn-success mr-1" href="{{ URL::to('plat/' . $value->id) }}"><i class="fa-solid fa-angle-right"></i></a>


                            <a class="btn btn-small btn-info mr-5" href="{{ URL::to('plat/' . $value->id . '/edit') }}"><i class="fa-solid fa-pen"></i></a>

>>>>>>> bad154a6b6e48d0372962c21f818a7175c0d8fa3
                            <form  action="/plat/{{$value->id}}" method="POST">
                              @csrf
                              @method('delete')
<<<<<<< HEAD
                              <button type="submit" class=" mr-1 btn btn-small btn-danger"> Remove</button>

                            </form>
=======
                              <button type="submit" class=" mr-1 btn btn-small btn-danger"> <i class="fa-solid fa-trash-can"></i>

                              </button>

                            </form>
>>>>>>> bad154a6b6e48d0372962c21f818a7175c0d8fa3
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
