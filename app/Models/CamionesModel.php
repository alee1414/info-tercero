<?php

namespace App\Models;

use CodeIgniter\Model;

class CamionesModel extends Model
{
    
    protected $table = 'Camiones';
    protected $primaryKey = 'camion_id';
    protected $returnType = 'array'; 
    
    protected $allowedFields = [
        'camion_id',
        'placa',
        'modelo',
        'capacidad',
        'operativo',
           ];

        }