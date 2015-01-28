<?php

class UsuariosController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	echo 'Hola Mundo';

    	//Manda llamar un metodo static
    	$this->view->setVar("listaUsuarios", Usuarios::find(["cache"=>["key"=>"cacheUs"]]));
    }
        public function addAction()
    	{
    		
    		//if(count($_POST)>=1)
    		//print_r($_POST); die();

    		/*
    		*recupero los datos enviados por el formulario
			*/
    		if($this->request->isPost())
    		{    			
    			//recibo la variable agregando que tipo es
    		//	$nombre =$this->request->getPost('nombre_legal','string');
    		
    		    $usuario_id =$this->request->getPost('usuario_id','string');

			    $email =$this->request->getPost('email','string');

			    $nombre =$this->request->getPost('nombre','string');

			    $password =$this->request->getPost('password','string');

			    $activo =$this->request->getPost('activo','string');

			    $fecha_registro =$this->request->getPost('fecha_registro','string');

			    $fecha_login =$this->request->getPost('fecha_login','string');

			    $intento_de_session =$this->request->getPost('intento_de_session','string');

			    $ultimo_intento_session =$this->request->getPost('ultimo_intento_session','string');

			    $tiempo_session =$this->request->getPost('tiempo_session','string');

			    $usuario_activacion_key =$this->request->getPost('usuario_activacion_key','string');

			    $usuario_activacoin_email =$this->request->getPost('usuario_activacoin_email','string');

			    $usuario_activacoin_contrasena =$this->request->getPost('usuario_activacoin_contrasena','string');

			   

    		//	echo $nombre;die();
    			/*
    			*como voy a crear un nuevo registro tengo que crear una nueva instancia
    			*si realizo una actualizacion no es necesario crea una nueva instancia
    			*/
    			$usuarios = new Usuarios();
    			//al campo nombre_legal se le asigna el valor de $nombre
    			//$organizacion->nombre_legal= $nombre;

    			$usuarios->usuario_id= $usuario_id;
    			$usuarios->email= $email;
    			$usuarios->nombre= $nombre;
    			$usuarios->password= $password;
    			$usuarios->activo= $activo;
    			$usuarios->fecha_registro= $fecha_registro;
    			$usuarios->fecha_login= $fecha_login;
    			$usuarios->intento_de_session= $intento_de_session;
    			$usuarios->ultimo_intento_session= $ultimo_intento_session;
    			$usuarios->tiempo_session= $tiempo_session;
    			$usuarios->usuario_activacion_key= $usuario_activacion_key;
    			$usuarios->usuario_activacoin_email= $usuario_activacoin_email;
    			$usuarios->usuario_activacoin_contrasena= $usuario_activacoin_contrasena;




    		//guardo la  datos recibidos del formulario
    			if($usuarios->save())
    			{
    				echo 'si se guardo';
    				
    				return $this->dispatcher->forward(['action'=>'index']);
    			}
    			else
	    			{
	    	    				echo 'No se guardo<br>';
	    				//print_r($organizacion->getMessages());
	    	    //Creo un arreglo para que me muestre todos los errores
	    				foreach ($usuarios->getMessages() as $error) 
	    				{
	    					echo "error: ". $error.'<br>';
	    				}
	    			}
	 			

    			die();
    		}
    	}

    	public function editAction($id)
    	{
    		if($infoRecord = Usuarios::findFirst($id))
    			{
					 $this->view->setVar('viewRecord', $infoRecord);
					 
					 if($this->request->isPost())
						{
											
							if ($this->security->checkToken())
							{
								//compruebo que el token se reciba correctamente
								//print_r($this->security->checkToken());
								//die();
								//The token is ok
            
        
								$infoRecord->usuario_id =$this->request->getPost('usuario_id','string');
								$infoRecord->email =$this->request->getPost('email','string');
								$infoRecord->nombre =$this->request->getPost('nombre','string');
								$infoRecord->password =$this->request->getPost('password','string');
								$infoRecord->activo =$this->request->getPost('activo','string');
								$infoRecord->fecha_registro =$this->request->getPost('fecha_registro','string');
								$infoRecord->fecha_login =$this->request->getPost('fecha_login','string');
								$infoRecord->intento_de_session =$this->request->getPost('intento_de_session','string');
								$infoRecord->ultimo_intento_session =$this->request->getPost('ultimo_intento_session','string');
								$infoRecord->tiempo_session =$this->request->getPost('tiempo_session','string');
								$infoRecord->usuario_activacion_key =$this->request->getPost('usuario_activacion_key','string');
								$infoRecord->usuario_activacoin_email =$this->request->getPost('usuario_activacoin_email','string');
								$infoRecord->usuario_activacoin_contrasena =$this->request->getPost('usuario_activacoin_contrasena','string');
								
								   if($infoRecord->save())
								{
									return $this->dispatcher->forward(['action'=>'index']);
								}
								else
								{
									print_r($infoRecord->getMessages()); die();
								}
							}
					}
				 
				 
    			}



    	}


    	public function deleteAction($id)
    	{
    		if($record = Usuarios::findFirst($id))
    			{
    				$this->view->setVar('mensaje', 'Eliminado');
    				if($record->delete())
    				{
    					return $this->dispatcher->forward(['action'=>'index']);
    				}
    				else {
    					print_r($record->getMessages()); die();
    				}
    			}
    	}



       
        public function emailAction($id)
    {

            if($usuario = Usuarios::findFirst($id))
                {
                 $this->view->setVar('mostrar', $usuario);
                }

            if($this->request->isPost())
            {               
                //recibo la variable agregando que tipo es
                $email =$this->request->getPost('email','string');
                $username =$this->request->getPost('username','string');
                $mensaje =$this->request->getPost('mensaje','string');
    
             
               if( $this->getDI()->getMail()->send
                    (
                    array($email => $email),
                    'Correo',
                    'confirmation',
                   array( 'confirmUrl' => '/confirm/' . $email.'/'. $email)
                    )
                )
               {
                return $this->dispatcher->forward(['action'=>'index']);
               }






         }
          
        }

}

?>