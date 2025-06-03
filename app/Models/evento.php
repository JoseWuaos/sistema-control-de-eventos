<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
     use HasUuids;

    // nombre de la tabla
    protected $table = 'evento';

    //este una clave primaria   
    protected $primaryKey = 'id';

    //Tipo de dato dela llave primaria
    protected $keyType = 'string';

    //los artibutos del modelo 
    protected $attributes = [
        'nombre' => 'string',
        'direccion' => 'string',
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
        'encargado_id' => 'string',
        'tipo_de_evento' => 'string',
        
    ];

    public function encargado (): HasMany{
       return $this->hasMany(encargado::class, 'id', 'encargado_id');
    }
}
