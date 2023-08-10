<?php

/**
 * CambiarEstadoEvaluacion
 *
 * @author Marcos
 * @since 19-05-2014
 */

class CambiarEstadoEvaluacion extends Entity{

	//variables de instancia.
	
	

	private $evaluacion;
	
	private $estado;
	
	private $motivo;
	

	public function __construct(){
		
		$this->evaluacion = new Evaluacion();
		
		$this->estado = new Estado();
		
		$this->motivo = "";
		
	}



	public function getEvaluacion()
	{
	    return $this->evaluacion;
	}

	public function setEvaluacion($evaluacion)
	{
	    $this->evaluacion = $evaluacion;
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