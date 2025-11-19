<?php
namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ChoferesModel; // Usando el modelo correcto

class Choferes extends ResourceController
{
    use ResponseTrait;

    // Vincula el controlador al modelo de Choferes
    protected $modelName = 'App\Models\ChoferesModel';
    protected $format    = 'json';

    public function index()
    {
        $choferes = $this->model->findAll();
        return $this->respond($choferes);
    }

    public function show($id = null)
    {
        $chofer = $this->model->find($id);
        if ($chofer) {
            return $this->respond($chofer);
        } else {
            return $this->failNotFound('Chofer no encontrado');
        }
    }

    public function create()
    {
        $data = $this->request->getPost();
        // Insertamos los datos
        $this->model->insert($data); 
        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        // Test inicia: **Esta parte es la que mantiene tu lógica de prueba**
        $response = $this->setResponseToSend(200, ["id" => 1, "nombre" => "Carlos"], null);
        //$response = $this->setResponseToSend(404, null, "Fallo al intentar hacer algo");
        return $this->respond($response);
        exit;
        // Test termina

        // Esta parte es la lógica real que está "oculta" por el test:
        $data = $this->request->getRawInput();
        $this->model->update($id, $data);
        return $this->respond($data);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted(['id' => $id]);
    }

    // Función auxiliar para estandarizar la respuesta, copiada de tu ejemplo.
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