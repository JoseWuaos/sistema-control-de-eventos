<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasOne; 

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
        'evento_id' => 'uuid',
        'personas_id' => 'uuid',
        
    ];

    protected $fillable = [
        'asistencia' ,
        'evento_id' ,
        'personas_id'
        
    ];

    public function personas (): HasOne{
       return $this->hasOne(Personas::class, 'id', 'personas_id');
    }

}
