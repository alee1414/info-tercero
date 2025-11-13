<?php

namespace App\Models;

use CodeIgniter\Model;

class RutaEstacionesModel extends Model
{
    
    protected $table = 'RutaEstaciones';
    protected $primaryKey = 'ruta_estacion_id';
    protected $returnType = 'array'; 
    
    protected $allowedFields = [
        'ruta_estacion_id',
        'ruta_id',
        'estaciones_id',
        'orden',
        
    ];
}