<?php

namespace App\Models;

use CodeIgniter\Model;

class RutasModel extends Model
{
    
    protected $table = 'Rutas';
    protected $primaryKey = 'ruta_id';
    protected $returnType = 'array'; 
    
    protected $allowedFields = [
        'ruta_id',
        'nombre_ruta',
        'descripcion',
        'frecuencia_estimada_min'
        
    ];
}