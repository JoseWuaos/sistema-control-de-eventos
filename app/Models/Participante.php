<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class participante extends Model
{
    use HasUuids;

    // nombre de la tabla
    protected $table = 'participante';

    //este una clave primaria   
    protected $primaryKey = 'id';

    //Tipo de dato dela llave primaria
    protected $keyType = 'string';

    //los artibutos del modelo 
    protected $attributes = [
        'cedula' => 'string',
        'primer_nombre' => 'string',
        'segundo_nombre' => 'string',
        'primer_apellido' => 'string',
        'segundo_apellido' => 'string',
        'fecha_nacimiento' => 'datetime',
        'genero_id' => 'string',
    ];

     protected $fillable = [
        'cedula',
        'primer_nombre',
        'segundo_nombre' ,
        'primer_apellido' ,
        'segundo_apellido' ,
        'fecha_nacimiento' ,
        'genero_id',
    ];

    public function genero (): HasMany{
       return $this->hasMany(genero::class, 'id', 'genero_id');
    }

    
}
