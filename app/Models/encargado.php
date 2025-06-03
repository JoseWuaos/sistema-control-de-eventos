<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class encargado extends Model
{
    use HasUuids;

    // nombre de la tabla
    protected $table = 'encargado';

    //este una clave primaria   
    protected $primaryKey = 'id';

    //Tipo de dato dela llave primaria
    protected $keyType = 'string';

    //los artibutos del modelo 
    protected $attributes = [
        'primer_nombre' => 'string',
        'segundo_nombre' => 'string',
        'primer_apellido' => 'string',
        'segundo_apellido' => 'string',
        'genero_id' => 'string',
        
    ];

    public function genero (): HasMany{
       return $this->hasMany(genero::class, 'id', 'genero_id');
    }

}
