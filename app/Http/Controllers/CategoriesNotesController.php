<?php

namespace App\Http\Controllers;

use App\Models\CategoriesNotes;
use Illuminate\Http\Request;

class CategoriesNotesController extends Controller
{
   public function delete($id)
   {
        $record = CategoriesNotes::findOrFail($id);
        $record->delete();
        return redirect()->back();
   }
}
