<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    
    protected $table = 'Usuarios';
    protected $primaryKey = 'usuario_id';
    protected $returnType = 'array'; 
    
    protected $allowedFields = [
        'usuario_id',
        'nombre',
        'apellido',
        'email',
        'password_hash',
        'tipo_usuario',
        'fecha_registro', 
        'documento_validacion',
        'estado_validacion',
    ];


    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    
    /**
     * Hashea la contraseña antes de guardarla en la base de datos.
     * @param array $data Datos a insertar/actualizar
     * @return array
     */
    protected function hashPassword(array $data)
    {
        // Revisar si se está proporcionando la contraseña
        if (isset($data['data']['    password_hash'])) {
            // Reemplaza el valor plano con el hash de la contraseña
            $data['data']['    password_hash'] = password_hash($data['data']['    password_hash'], PASSWORD_DEFAULT);
        }

        return $data;
    }


   
    // --- Métodos Personalizados ---

    /**
     * Busca un usuario por email.
     * @param string $email
     * @return array|null
     */
    public function findByEmail(string $email)
    {
        return $this->where('    email', $email)->first();
    }
}