<?php

/**
 * LugarTrabajo
 *  
 * @author Marcos
 * @since 29-10-2013
 */


class LugarTrabajo  extends Entity{

    //variables de instancia.

    private $ds_unidad;
    
    private $padre;
    
    private $bl_hijos;
    
    private $ds_sigla;
    
    private $ds_codigo;	
	
	private $ds_direccion;	
	private $ds_mail;	
	private $ds_telefono;	
    

    public function __construct(){
    	
    	$this->ds_unidad = "";
    	
    	$this->padre = "";//new LugarTrabajo();
    	
    	$this->bl_hijos = "";
    	
    	$this->ds_sigla = "";
    	
    	$this->ds_codigo = "";
    	
    	$this->ds_direccion = "";
    	
    	$this->ds_mail = "";
    	
    	$this->ds_telefono = "";
    }
    
    
    public function getDs_unidad()
    {
        return $this->ds_unidad;
    }

    public function setDs_unidad($ds_unidad)
    {
        $this->ds_unidad = $ds_unidad;
    }


	public function getPadre()
	{
	    return $this->padre;
	}

	public function setPadre($padre)
	{
	    $this->padre = $padre;
	}

	public function getBl_hijos()
	{
	    return $this->bl_hijos;
	}

	public function setBl_hijos($bl_hijos)
	{
	    $this->bl_hijos = $bl_hijos;
	}

	public function getDs_sigla()
	{
	    return $this->ds_sigla;
	}

	public function setDs_sigla($ds_sigla)
	{
	    $this->ds_sigla = $ds_sigla;
	}
	
	public function __toString(){
		$sigla = $this->getDs_sigla()?" (".$this->getDs_sigla().")":"";
		return $this->getDs_unidad().$sigla;
	}

	public function getDs_codigo()
	{
	    return $this->ds_codigo;
	}

	public function setDs_codigo($ds_codigo)
	{
	    $this->ds_codigo = $ds_codigo;
	}

	public function getDs_direccion()
	{
	    return $this->ds_direccion;
	}

	public function setDs_direccion($ds_direccion)
	{
	    $this->ds_direccion = $ds_direccion;
	}

	public function getDs_mail()
	{
	    return $this->ds_mail;
	}

	public function setDs_mail($ds_mail)
	{
	    $this->ds_mail = $ds_mail;
	}

	public function getDs_telefono()
	{
	    return $this->ds_telefono;
	}

	public function setDs_telefono($ds_telefono)
	{
	    $this->ds_telefono = $ds_telefono;
	}
}
?>