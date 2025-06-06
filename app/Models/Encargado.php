<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Encargado extends Model 
{
    use HasUuids;

    // Nombre de la tabla
    protected $table = 'encargado';

    // Clave primaria
    protected $primaryKey = 'id';

    // Tipo de dato de la llave primaria
    protected $keyType = 'string';

    // Deshabilita los timestamps si no los usas (created_at, updated_at)
    // public $timestamps = false; // Descomenta si no tienes estas columnas

    // Atributos que pueden ser asignados masivamente
   protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
       // 'fecha_nacimiento' => 'datetime',
       'genero_id', 
    ];

    // Castea atributos a tipos de datos específicos
    protected $casts = [
        'fecha_nacimiento' => 'date', // Laravel convertirá automáticamente a objeto Carbon
    ];

    // Relación con el modelo Genero
    public function genero(): BelongsTo
    {
        return $this->belongsTo(Genero::class, 'genero_id', 'id'); // ¡Cambiar a Genero::class!
    }

      
    // Método para obtener encargados paginados
    public static function findAll($perPage = 10)
    {
        return self::paginate($perPage);
    }
}
