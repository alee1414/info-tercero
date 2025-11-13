<?php

namespace App\Models;

use CodeIgniter\Model;

class HistorialPagosModel extends Model
{
    
    protected $table = 'HistorialPagos';
    protected $primaryKey = 'pago_id';
    protected $returnType = 'array'; 
    
    protected $allowedFields = [
        'pago_id',
        'usuario_id',
        'viaje_id',
        'ruta_id',
        'monto_cobrado',
        'fecha_hora_pago', 
    ];
}