<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\CategoriesNotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       return view('categories.show',[
        'categories' => Categories::where('user_id',Auth::id())->get()
       ]);
    }

    public function edit($id)
    {
        return view('categories.edit',[
            'categorie' => Categories::findOrFail($id)
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function update(Request $request,$id)
    {
        $record = Categories::findOrFail($id); // new para store y sin busqueda
        $record->nombre=$request->nombre; // destroy no lleva linea si lleva consulta
        $record->save();// para el destroy seria delete
        return redirect()->route('categories');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre'      => 'required|min:3|max:30'
        ]);
        $record = new Categories; 
        $record->nombre=$request->nombre;
        $record->user_id= auth()->user()->id;
        $record->save();
        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        if(CategoriesNotes::where('id_categories', '=', $id)->first() != null){
            return redirect()->back()->withErrors(['mensaje' => 'La Categoria Nro. '.$id.' no puede ser eliminada']);
        }
        else{
            $record = Categories::findOrFail($id);
            $record->delete();
            return redirect()->route('categories',auth()->user()->name);;
        }
    }
}
