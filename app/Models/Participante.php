<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
       // 'fecha_nacimiento' => 'datetime',
        'genero_id' => 'string',
    ];
    protected $casts = [
    'fecha_nacimiento' => 'date', // O 'datetime' si tu columna en la base de datos incluye la hora
    // ... otros casts para id, genero_id, etc.
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

    public function genero (): BelongsTo {
       return $this->belongsTo(Genero::class, 'genero_id', 'id');
    }

     public static function findAll($perPage = 10){
        return self::paginate($perPage);
    }
    
}