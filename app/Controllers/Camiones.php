<?php
namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CamionesModel;

class Camiones extends ResourceController
{
    use ResponseTrait;

    protected $modelName = 'App\Models\CamionesModel';
    protected $format    = 'json';

    public function index()
    {
        $camiones = $this->model->findAll();
        return $this->respond($camiones);
    }

    public function show($id = null)
    {
        $camion = $this->model->find($id);
        if ($camion) {
            return $this->respond($camion);
        } else {
            return $this->failNotFound('Camion no encontrado');
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
        // Test inicia
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