<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='notes';

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function categoriasnotas()
    {
        return $this->hasMany('App\Models\CategoriesNotes','id_notes','id');
    }

}
