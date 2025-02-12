<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model {
 
    public function nivel(){
        Return $this->belongsTo(Nivel::class, 'nivel_id','id');
    }

}