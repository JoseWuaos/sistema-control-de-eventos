<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Institucion extends Model
{
   use HasUuids;

    // nombre de la tabla
    protected $table = 'institucion';

    //este una clave primaria   
    protected $primaryKey = 'id';

    //Tipo de dato dela llave primaria
    protected $keyType = 'string';

    protected $fillable = [
        'nombre',
        'responsable',
        'direccion',
        'telefono',
        'correo', 
    ];
}

