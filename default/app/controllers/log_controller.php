<?php

class LogController extends RestLoginController
{

  public function post()
  {
    $this->data = json_decode(file_get_contents('php://input'));
  }

  public function getAll()
  {
    $this->data = 'respondiendoLogin';
  }


  public function post_login()
  {
    $this->data = json_decode(file_get_contents('php://input'));
    if ((new Usuarios)->autenticar($this->data->pass, $this->data->nombre)) {
      $this->data = 'OK';
    } else {
      $this->data = 'Error';
      http_response_code(400);
    }
  }
  public function post_cerrar()
  {
    Auth::destroy_identity();
    $this->data = 'Sesion Cerrada';
  }

 
}
