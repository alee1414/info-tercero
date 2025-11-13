<?php

namespace App\Models;

use CodeIgniter\Model;

class UbicacionesCamionesModel extends Model
{
    
    protected $table = 'UbicacionesCamiones';
    protected $primaryKey = 'camion_id';
    protected $returnType = 'array'; 
    
    protected $allowedFields = [
        'camion_id',
        'latitud',
        'longitud',
        'ultima_actualizacion',
        
    ];
}