<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
  /*  protected $attributes  = [
        'cedula' => 'string',
        'primer_nombre' => 'string',
        'segundo_nombre' => 'string',
        'primer_apellido' => 'string',
        'segundo_apellido' => 'string',
       // 'fecha_nacimiento' => 'datetime',
        'genero_id' => 'string',
        'id' => 'string', 
    ];*/
    protected $casts = [
     'fecha_nacimiento' => 'date', // O 'datetime' si tu columna en la base de datos incluye la hora
   
    ];


      protected $fillable = [
        'cedula',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'genero_id', 
    ];

    public function genero(): BelongsTo
    {
        // Un participante tiene un 'genero_id' que apunta al 'id' de la tabla 'genero'.
        // Asegúrate de que el modelo Genero exista y tenga la tabla 'genero'.
        return $this->belongsTo(Genero::class, 'genero_id', 'id');
    }

  
    public function participante (): HasMany{
       return $this->hasMany(Participante::class, 'id', 'participante_id');
    }

     public static function findAll($perPage = 10){
        return self::paginate($perPage);
    }
    
}