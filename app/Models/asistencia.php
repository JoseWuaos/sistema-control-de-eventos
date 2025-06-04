<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class asistencia extends Model
{
    use HasUuids;

    // nombre de la tabla
    protected $table = 'asistencia';

    //este una clave primaria   
    protected $primaryKey = 'id';

    //Tipo de dato dela llave primaria
    protected $keyType = 'string';

    //los artibutos del modelo 
    protected $attributes = [
        'asistencia' => 'string',
        'evento_id' => 'string',
        'participante_id' => 'string',
        
    ];

    public function participante (): HasMany{
       return $this->hasMany(participante::class, 'id', 'participante_id');
    }

}
