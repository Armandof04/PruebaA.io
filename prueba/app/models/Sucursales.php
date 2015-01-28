<?php

class Sucursales extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $sucursal_id;

    /**
     *
     * @var integer
     */
    public $organizacion_id;

    /**
     *
     * @var string
     */
    public $clave;

    /**
     *
     * @var string
     */
    public $nombre;

    /**
     *
     * @var string
     */
    public $direccion;

    /**
     *
     * @var string
     */
    public $default;

    /**
     *
     * @var string
     */
    public $sucursalescol;

     public function initialize()
    {
        $this->belongsTo('organizacion_id', 'Organizaciones', 'organizacion_id');
    }

}

