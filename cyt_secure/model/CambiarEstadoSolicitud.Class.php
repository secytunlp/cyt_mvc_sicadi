<?php

/**
 * CambiarEstadoSolicitud
 *
 * @author Marcos
 * @since 19-03-2014
 */

class CambiarEstadoSolicitud extends Entity{

	//variables de instancia.
	
	

	private $solicitud;
	
	private $estado;
	
	private $motivo;
	

	public function __construct(){
		
		$this->solicitud = new Solicitud();
		
		$this->estado = new Estado();
		
		$this->motivo = "";
		
	}



	public function getSolicitud()
	{
	    return $this->solicitud;
	}

	public function setSolicitud($solicitud)
	{
	    $this->solicitud = $solicitud;
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