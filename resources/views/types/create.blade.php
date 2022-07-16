@extends('layouts.app')

@include('layouts.navbars.homenavbar')
@include('layouts.sidebar')
<title>Type</title>
@section('content')


    <div class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <div class="content-wrapper p-5">

                <h1>Ajouter Un Type</h1>



                <form method="POST" action="{{route("type.store")}}" >
                    @csrf
                    <div class="card-body">
                        <div class="form-group">

                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="text" class="form-control" name="name" placeholder="Ajouter un type">

                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="iputnom">Menu</label>
                            <select name="menu_id" class="form-control select2"  style="width: 100%;">
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}" >
                                        {{  $menu->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group-append">
                            <input type="submit" class="btn btn-success" value="Ajouter">
                        </div>
                    </div>



            </div>
        </div>





