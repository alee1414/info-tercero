<?php

namespace App\Controllers;



class Home extends BaseController
{
    public function index(): string
    {
      

        $usuarios = new \App\Models\ViajesModel();
        $data['usuario'] = $usuarios->find(4);   

        
        
        return view('welcome_message', $data);
    }
}
