<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\User;
use App\Models\Notes;
use Illuminate\Http\Request;
use App\Models\CategoriesNotes;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class NotasController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('notas.show',
        [
            'notes'=> 
                Notes::with('user','categoriasnotas.categorie')->where('user_id' , Auth::id())->get()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'         => 'required|min:3|max:30',
            'body'          => 'required|min:5'
        ]);
        //dd($request);
        $record = new Notes; 
        $record->title=$request->title;
        $record->body=$request->body;
        $record->user_id= auth()->user()->id;
        $record->save();
        if(!is_null($request->categorie_id)){
            foreach($request->categorie_id as $categ){
                $cat=new CategoriesNotes;
                $cat->id_notes=$record->id;
                $cat->id_categories=$categ;
                $cat->save();
            }
            return redirect()->route('notes');
        }else{
            return redirect()->route('notes');
        }
    }
    
    public function edit($id)
    {
        return view('notas.edit',[
            'note' => Notes::findOrFail($id)
        ]);
    }

       public function create()
    {
        $categories=Categories::all();

        return view('notas.create')->with(compact('categories'));
    }

    
    public function update(Request $request, $id)
    {
        $record = Notes::findOrFail($id); 
        $record->title=$request->title; 
        $record->body=$request->body; 
        $record->save();
      /*   if(!is_null($request->categorie_id)){
            foreach($request->categorie_id as $categ){
                $cat=CategoriesNotes::findOrFail($record->id);
                $cat->id_categories=$categ;
                $cat->save();
            }
            return redirect()->route('notes');
        }else{
            return redirect()->route('notes');
        } */
        return redirect()->route('notes');
    }
    
    public function destroy($id)
    {
        $record = Notes::findOrFail($id);
        if(CategoriesNotes::where('id_notes', '=', $id)->first() != null){
            return redirect()->back()->withErrors(['mensaje' => 'La nota titulada: '.$record->title.', no puede ser eliminada']);
        }
        else{
            $record->delete();
            return redirect()->back();
        }
    }

    public function trash()
    {
        return view('notas.trash',[
            'notes'=> Notes::onlyTrashed()->with('user','categoriasnotas.categorie')->where('user_id' , Auth::id())
            ->get()->all()
        ]);
    }

    public function delete($id)
    {
        $record= Notes::onlyTrashed()->find($id)->forceDelete();
        return  redirect()->back();
    }

    public function addCategorieNote(Request $request,$id_note)
    {
        if(count($request->categoriesm)){
            foreach ($request->categoriesm as $key => $categorie) {
                $new_categorie = new CategoriesNotes;
                $new_categorie->id_notes = $id_note;
                $new_categorie->id_categories = $categorie;
                $new_categorie->save();
            }
    
            return view('notas.edit',[
                'note' => Notes::findOrFail($id_note)
            ]);
        }else{
           
            return redirect()->back()->withErrors(['mensaje' => 'Debe seleccionar la categoria']);

        }


    }
}
