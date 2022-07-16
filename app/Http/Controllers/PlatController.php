<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use App\Models\Plat;
use App\Models\Type;
use Illuminate\Support\Facades\Session;
use View;
use Yajra\DataTables\DataTables;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plats = Plat::all();
        $menus = Menu::all();

        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
     return View::make('plats.index')
     ->with([
         'plats'=> $plats,
         'menus'=>$menus
     ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $types = Type::all();
        $menus = Menu::all();

        return View::make('plats.create')->with([
            'types'=>$types,
            'menus'=>$menus
        ]);
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
            'description' => 'required|max:500',
            'prix' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png|required|max:30000',
            'menu_id' => 'required',
        ]);

        $plat = new Plat;
        $plat->name = $request->input('name');
        $plat->description = $request->input('description');
        $plat->price = $request->input('prix');
        $plat->menu_id = $request->input('menu_id');

        $imagename =time().'-'.$request->name.'.'.$request->image->extension();

        $request->image->move(public_path('images'),$imagename);
        $plat->imagePath =$imagename;
        $plat->type_id = $request->input('type_id');
        $plat->save();

        // redirect
        Session::flash('message', 'Plat Successfully created!');
        return Redirect::to('/plat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plat= Plat::find($id);

        // show the view and pass the shark to it
        return View::make('plats.show')
            ->with('plat', $plat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all();
        $plat= Plat::find($id);

        // show the edit form and pass the shark
        return View::make('plats.edit')
            ->with('plat', $plat)->with('types',$types);
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

        $plat= Plat::find($id);


        $plat->name = $request->input('name');
        $plat->description = $request->input('description');
        $plat->price = $request->input('prix');
        $plat->type_id = $request->input('type_id');


        if($request->image){
            $imagename =time().'-'.$request->name.'.'.$request->image->extension();

            $request->image->move(public_path('images'),$imagename);
            $plat->image =$imagename;
        }



        $plat->save();
        return Redirect::to('plat/')->with('message', 'Plat Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plat = Plat::find($id);

        if( File::exists(public_path('images'),$plat->imagePath) ) {

            File::delete(public_path('images'),$plat->imagePath);
        }

        $plat->delete();
            Session::flash('message', 'Plat Successfully deleted!');
            return Redirect::to('plat/');
    }

    public function trash(){
        
        $trash = Plat::onlyTrashed()->get();
        return View::make('plats.trash')
        ->with('trash', $trash);
       
    }

    public function restore($id){
        
        Plat::withTrashed()->where('id',$id)->restore();
       
        return back()->with('message', 'Plat Successfully restored!');
      
       
    }

    public function forcedelete($id){
        
        Plat::withTrashed()->where('id',$id)->forceDelete();
       
        return back()->with('message', 'Plat Successfully deleted!');
      
       
    }
}
