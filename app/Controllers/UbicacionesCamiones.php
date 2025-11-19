<?php
namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UbicacionesCamionesModel; // Asegúrate de que este es el nombre de tu modelo

class UbicacionesCamiones extends ResourceController
{
    use ResponseTrait;

    protected $modelName = 'App\Models\UbicacionesCamionesModel';
    protected $format    = 'json';

    public function index()
    {
        $ubicaciones = $this->model->findAll();
        return $this->respond($ubicaciones);
    }

    public function show($id = null)
    {
        $ubicacion = $this->model->find($id);
        if ($ubicacion) {
            return $this->respond($ubicacion);
        } else {
            return $this->failNotFound('Ubicación de camión no encontrada');
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