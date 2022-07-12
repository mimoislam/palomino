<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use View;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $menus = Menu::all();
        
     return View::make('menu.index')
     ->with('menus', $menus);

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('menu.create');
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
            'name' => 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png|required|max:30000',
        ]);
        $menu = new Menu;
        $menu->name = $request->input('name');
        $imagename =time().'-'.$request->name.'.'.$request->image->extension();
        
        $request->image->move(public_path('images'),$imagename);
        $menu->image =$imagename;  
        $menu->save();

        // redirect
        Session::flash('message', 'menu Successfully created!');
        return Redirect::to('/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu= Menu::find($id);

        // show the view and pass the shark to it
        return View::make('menu.show')
            ->with('menu', $menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu= Menu::find($id);
        
        // show the edit form and pass the shark
        return View::make('menu.edit')
            ->with('menu', $menu);
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
    
        $menu= Menu::find($id);


        $menu->name = $request->input('name');
        
        if($request->image){
           
            $imagename =time().'-'.$request->name.'.'.$request->image->extension();
        
            $request->image->move(public_path('images'),$imagename);
            $menu->image =$imagename;  
    
        }
        
        $menu->save();
        return Redirect::to('menu/')->with('message', 'Menu Successfully Updated!');
     
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $menu = Menu::find($id);

        if( File::exists(public_path('images'),$menu->image) ) {
            
            File::delete(public_path('images'),$menu->image);
        }
        
        $menu->delete();            
            Session::flash('message', 'Menu Successfully deleted!');
            return Redirect::to('menu/');
    
    }
}
