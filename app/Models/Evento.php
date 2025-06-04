<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasOne; 


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
        'tipo_de_evento_id' => 'string',
    ];

    public function encargado (): HasOne{
       return $this->hasOne(encargado::class, 'id', 'encargado_id');
    }

    public function tipo_de_evento (): HasOne{
       return $this->hasOne(tipo_de_evento::class, 'id', 'tipo_de_evento_id');
    }

    
    public static function findAll($perPage = 10){
        return self::paginate($perPage);
    }
}
