<?php

class PaisesController extends RestController
{
      public function getAll()
      {
            $data = (new Paises())->find();
            if($data){
                  $this->data = $data;
            }else{
                  $this->data = ['respuesta' => ['message'=> 'No hay registros', 'data' => null]] ;
            }
           
      }
      public function get($id)
      {
            if ((new Paises())->find($id)) {
                  $this->data = (new Paises())->find($id);
            } else {
                  http_response_code(400);
                  $this->data = ['message' => 'error, registro no existe', 'data' => null];
            }
      }

      public function put()
      {
            $data = json_decode(file_get_contents('php://input'));
            if ($data) {
                  $nuevoRegistro = new Paises();
                  foreach ($data as $key => $dato) {
                        $nuevoRegistro->$key = $dato;
                  }

                  $nuevoRegistro->save();
                  $this->data = ['message' => 'Registro Exitoso', 'data' => $nuevoRegistro];
            }else{
                  http_response_code(400);
                  $this->data = ['message' => 'No se puede registra porque no hay datos', 'data' => null];
            }
      }

      public function patch($id)
      {
            $data = json_decode(file_get_contents('php://input'));
            if ((new Paises())->find($id)) {
                  $registro = (new Paises())->find($id);
                  $registroActualizado = (new Paises())->find($id);
                  foreach ($data as $key => $dato) {
                        $registroActualizado->$key = $dato;
                  }
                  $registroActualizado->update();
                  $this->data = ['message' => 'Registro actualizado', 'Resitro a actualizar' => $registro, 'Nuevos datos'=> $registroActualizado];

            } else {
                  http_response_code(400);
                  $this->data = ['message' => 'No existe un registro con ese Id', 'data' => null];
            }
      }
      

      public function delete($id)
      {
            if((new Paises())->find($id)){
                  $registro = (new Paises())->find($id);
                  $registro->delete();
                  $this->data = ['message' => 'Registro Eliminado'];
            }else{
                  http_response_code(400);
                  $this->data = ['message' => 'No existe un registro con ese Id'];
            }
      }

      public function get_paginar($page, $ppage)
      {
            $this->data = (new Paises())->paginate("page: $page", "per_page: $ppage", 'order: id asc');
      }

      public function get_paginarD()
      {
            $page = 1;
            $ppage = 5;
            $this->data = (new Paises())->paginate("page: $page ", "per_page: $ppage", 'order: id asc');
      }

      public function post_info()
      {
            
            $data = (new Paises())->fields;
            #$this-> fields = (new $this->model())->fields;
            $this->data = $data;

      }
}
