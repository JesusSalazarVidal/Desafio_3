<?php
    
    class LoginController extends AppController{
        public function index()
        {
            View::template('blank');
        }

        public function loguear()
        {
            View::select(null);
            View::template(null);
            if (Input::hasPost('pass') && Input::hasPost('nombre')){
                $usuarioAutenticado = (new Usuarios());
                if($usuarioAutenticado->autenticar(Input::post('pass'), Input::post('nombre'))){
                    Redirect::to('inicio');
                } else{
                    
                    Flash::error('crednecial invalida');
                }
            }
        }


        public function cerrar()
        {
            Auth::destroy_identity();
            Redirect::toAction('');

        }
    
    }