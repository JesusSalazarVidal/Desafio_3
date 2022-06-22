<?php
      
      class AbogadosController extends RestController{	
            public function getAll(){
                  #$this->data = ['respuesta' => ['message'=> 'ok', 'data' => null]] ;
                  $this->data =(new Abogados())->find();
      
            }
      }