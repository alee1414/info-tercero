<?php
namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RutaEstacionesModel; // Usamos el nuevo modelo RutaEstacionesModel

class RutaEstaciones extends ResourceController
{
    use ResponseTrait;

    protected $modelName = 'App\Models\RutaEstacionesModel'; // Cambiado a RutaEstacionesModel
    protected $format    = 'json';

    public function index()
    {
        $rutaEstaciones = $this->model->findAll();
        return $this->respond($rutaEstaciones);
    }

    public function show($id = null)
    {
        $rutaEstacion = $this->model->find($id);
        if ($rutaEstacion) {
            return $this->respond($rutaEstacion);
        } else {
            return $this->failNotFound('Registro Ruta-Estación no encontrado'); // Mensaje adaptado
        }
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->model->insert($data);
        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        // Test inicia: **Lógica de prueba replicada exactamente**
        $response = $this->setResponseToSend(200, ["id" => 1, "nombre" => "Carlos"], null);
        //$response = $this->setResponseToSend(404, null, "Fallo al intentar hacer algo");
        return $this->respond($response);
        exit;
        // Test termina

        // Lógica real de update (inactiva debido al 'exit;')
        $data = $this->request->getRawInput();
        $this->model->update($id, $data);
        return $this->respond($data);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted(['id' => $id]);
    }

    private function setResponseToSend($code, $data, $message)
    {
        if($code == 200){

            $response = [
            "success" => true,
            "data" => $data
            ];   
        }
        if($code == 404){
            $response = [
            "success" => false,
            "message" => $message
            ]; 
        }
        return $response;
    }
}