<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table='categories';
    
    public function notes()
    {
        return $this->hasMany('App\Models\Notes','notes_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
