<?php

class UsuarioPermisos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $usuario_id;

    /**
     *
     * @var integer
     */
    public $organizacion_id;

    /**
     *
     * @var string
     */
    public $permiso_id;



    public function initialize()
    {
        $this->belongsTo('organizacion_id', 'Organizaciones', 'organizacion_id');
        $this->belongsTo('usuario_id', 'Usuarios', 'usuario_id');
    }

}
