<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasOne; 
use Illuminate\Database\Eloquent\SoftDeletes;


class evento extends Model
{
    use HasUuids;
    use SoftDeletes;


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
        'encargado_id' => 'uuid',
        'tipo_de_evento_id' => 'uuid',
        'institucion_id' => 'uuid',
    ];

      protected $fillable = [
        'nombre',
        'direccion', 
        'fecha_inicio', 
        'fecha_fin',  
        'encargado_id', 
        'tipo_de_evento_id',
        'institucion_id',
    ];

       

    public function encargado (): HasOne{
       return $this->hasOne(Encargado::class, 'id', 'encargado_id');
    }

    public function tipo_de_evento (): HasOne{
       return $this->hasOne(TipoDeEvento::class, 'id', 'tipo_de_evento_id');
    }
    public function institucion (): HasOne{
       return $this->hasOne(institucion::class, 'id', 'institucion_id');
    }


    
    public static function findAll($perPage = 100){
        return self::paginate($perPage);
    }
}
