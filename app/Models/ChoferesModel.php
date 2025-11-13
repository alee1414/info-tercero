<?php

namespace App\Models;

use CodeIgniter\Model;

class ChoferesModel extends Model
{
    
    protected $table = 'Choferes';
    protected $primaryKey = 'chofer_id';
    protected $returnType = 'array'; 
    
    protected $allowedFields = [
        'chofer_id',
        'nombre',
        'apellido',
        'numero_licencia',
        'telefono',
        'activo'
    ];
}