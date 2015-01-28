<?php

class SucursalesController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	//echo 'Hola Mundo';

    	//Manda llamar un metodo static
    	$this->view->setVar("listaSucursales", Sucursales::find(["cache"=>["key"=>"cacheSuc"]]));
    }
    public function addAction()
    	{
    		/*
    		*recupero los datos enviados por el formulario
			*/
    		if($this->request->isPost())
    		{    			
                if ($this->security->checkToken())
                    {   //The token is ok
            			//recibo la variable agregando que tipo es
            		    //$nombre =$this->request->getPost('nombre_legal','string');
            		
            		    $sucursal_id =$this->request->getPost('sucursal_id','string');

        			    $organizacion_id =$this->request->getPost('organizacion_id','string');

        			    $clave =$this->request->getPost('clave','string');

        			    $nombre =$this->request->getPost('nombre','string');

        			    $direccion =$this->request->getPost('direccion','string');

        			    $default =$this->request->getPost('default','string');

        			    $sucursalescol =$this->request->getPost('sucursalescol','string');
            			/*
            			*como voy a crear un nuevo registro tengo que crear una nueva instancia
            			*si realizo una actualizacion no es necesario crea una nueva instancia
            			*/
            			$sucursales = new Sucursales();
            			//al campo nombre_legal se le asigna el valor de $nombre
            			//$organizacion->nombre_legal= $nombre;

            			$sucursales->sucursal_id= $sucursal_id;
            			$sucursales->organizacion_id= $organizacion_id;
            			$sucursales->clave= $clave;
            			$sucursales->nombre= $nombre;
            			$sucursales->direccion= $direccion;
            			$sucursales->default= $default;
            			$sucursales->sucursalescol= $sucursalescol;
            			



            		//guardo la  datos recibidos del formulario
            			if($sucursales->save())
            			{
            				echo 'si se guardo';
            				
            				return $this->dispatcher->forward(['action'=>'index']);
            			}
            			else
        	    			{
        	    	    				echo 'No se guardo<br>';
        	    				//print_r($organizacion->getMessages());
        	    	    //Creo un arreglo para que me muestre todos los errores
        	    				foreach ($sucursales->getMessages() as $error) 
        	    				{
        	    					echo "error: ". $error.'<br>';
        	    				}
        	    			}
        	 			
                    }
            			die();
    		}
    	}

    	public function editAction($id)
    	{
    		if($infoRecord = Sucursales::findFirst($id))
    			{
    			 $this->view->setVar('viewRecord', $infoRecord);
									
							if ($this->security->checkToken())
							{    //The token is ok
								//compruebo que el token se reciba correctamente
								//print_r($this->security->checkToken());
								//die();
							
								
								$infoRecord->sucursal_id =$this->request->getPost('sucursal_id','string');
								$infoRecord->organizacion_id =$this->request->getPost('organizacion_id','string');
								$infoRecord->clave =$this->request->getPost('clave','string');
								$infoRecord->nombre =$this->request->getPost('nombre','string');
								$infoRecord->direccion =$this->request->getPost('direccion','string');
								$infoRecord->default =$this->request->getPost('default','string');
                                $infoRecord->sucursalescol =$this->request->getPost('sucursalescol','string');


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

    	public function deleteAction($id)
    	{
    		if($record = Sucursales::findFirst($id))
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

}

