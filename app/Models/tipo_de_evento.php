<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_de_evento extends Model
{
     use HasUuids;

    // nombre de la tabla
    protected $table = 'tipo_de_evento';

    //este una clave primaria   
    protected $primaryKey = 'id';

    //Tipo de dato dela llave primaria
    protected $keyType = 'string';

    //los artibutos del modelo 
    protected $attributes = [
        'descripcion' => 'string'
    ];
}
