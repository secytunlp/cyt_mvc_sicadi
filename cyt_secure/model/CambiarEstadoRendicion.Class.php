<?php

/**
 * CambiarEstadoRendicion
 *
 * @author Marcos
 * @since 08/03/2016
 */

class CambiarEstadoRendicion extends Entity{

	//variables de instancia.
	
	

	private $rendicion;
	
	private $estado;
	
	private $motivo;
	

	public function __construct(){
		
		$this->rendicion = new Rendicion();
		
		$this->estado = new Estado();
		
		$this->motivo = "";
		
	}



	public function getRendicion()
	{
	    return $this->rendicion;
	}

	public function setRendicion($rendicion)
	{
	    $this->rendicion = $rendicion;
	}

	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}

	public function getMotivo()
	{
	    return $this->motivo;
	}

	public function setMotivo($motivo)
	{
	    $this->motivo = $motivo;
	}
}
?>