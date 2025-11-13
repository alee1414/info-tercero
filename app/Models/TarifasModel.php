<?php

namespace App\Models;

use CodeIgniter\Model;

class TarifasModel extends Model
{
    
    protected $table = 'Tarifas';
    protected $primaryKey = 'tarifa_id';
    protected $returnType = 'array'; 
    
    protected $allowedFields = [
        'tarifa_id',
        'tipo_usuario',
        'monto',
        
        
    ];
}