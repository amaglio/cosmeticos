<?php

class Administrador_model  extends CI_Model  
{
    function __construct()
    {
        parent::__construct();
    }

    function get_ventas()
    {
        $query = $this->db->query('SELECT * , venta(v.id)  as venta_final
                                    FROM venta AS v  ');
        return $query->result_array();
    }

    function get_venta_productos($id_venta)
    {
        $query = $this->db->query(' SELECT vp.id_producto , vp.cantidad,
                                           p.nombre, 
                                           (p.precio_costo * cantidad) as precio_costo, 
                                           (p.precio_venta * cantidad) as precio_venta,
                                           (p.precio_venta - p.precio_costo) * cantidad  as ganancia,
                                           100 * (  p.precio_venta - p.precio_costo) /  p.precio_costo as ganancia_porcentual

                                    FROM  venta_producto vp
                                         INNER JOIN producto p ON vp.id_producto = p.id 
                                    WHERE vp.id_venta = ? ',  

                                    array( $id_venta ) );

        return $query->result_array();
    }







}