<?php

namespace App\Models;

use CodeIgniter\Model;

class EstacionesModel extends Model
{
    
    protected $table = 'Estaciones';
    protected $primaryKey = 'estacion_id';
    protected $returnType = 'array'; 
    
    protected $allowedFields = [
        'estacion_id',
        'nombre',
        'latitud',
        'longitud',
       
    ];
}