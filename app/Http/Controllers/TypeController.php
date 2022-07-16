<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Type;
use Illuminate\Support\Facades\Session;
use View;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        
        return View::make('types.index')
        ->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|max:50',
            
        ]);

        
        $type = new Type;
        $type->name = $request->input('name');
        $type->save();

        // redirect
        Session::flash('message', 'Type Successfully created!');
        return Redirect::to('/type');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type= Type::find($id);
        
        // show the edit form and pass the shark
        return View::make('types.edit')
            ->with('type', $type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type= Type::find($id);

        $type->name = $request->input('name');
        $type->save();
        return Redirect::to('type/')->with('message', 'Type Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::find($id);

        $type->delete();            
            Session::flash('message', 'Type Successfully deleted!');
            return Redirect::to('type/');
    }


    public function trash(){
        
        $trash = Type::onlyTrashed()->get();
        return View::make('types.trash')
        ->with('trash', $trash);
       
    }

    public function restore($id){
        
        Type::withTrashed()->where('id',$id)->restore();
       
        return back()->with('message', 'Type Successfully restored!');
      
       
    }

    public function forcedelete($id){
        
        Type::withTrashed()->where('id',$id)->forceDelete();
       
        return back()->with('message', 'Type Successfully deleted!');
      
       
    }
}
