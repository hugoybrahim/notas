<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesNotes extends Model
{
    use HasFactory;

    protected $table='categories_notes';

    public function notes()
    {
        return $this->belongsTo('App\Models\Notes','notes_id');
    }

    public function categorie()
    {
        return $this->belongsTo('App\Models\Categories','id_categories');
    }
}
