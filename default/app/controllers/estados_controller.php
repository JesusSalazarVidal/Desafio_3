<?php
      
      class EstadosController extends RestController{	
      
            public function getAll(){
                  #$this->data = ['respuesta' => ['message'=> 'ok', 'data' => null]] ;
                  $this->data =(new Estados())->find();
      
            }
      
      

      }