<?php

namespace App\Models;

use CodeIgniter\Model;

class ViajesModel extends Model
{
    
    protected $table = 'Viajes';
    protected $primaryKey = 'Viaje_id';
    protected $returnType = 'array'; 
    
    protected $allowedFields = [
        'viaje_id',
        'ruta',
        'camion_id',
        'chofer_id',
        'fecha_hora_inicio',
        'fecha_hora_fin',
    ];
}