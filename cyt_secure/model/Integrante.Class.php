<?php

/**
 * Integrante
 *
 * @author Marcos
 * @since 20-11-2013
 */

class Integrante extends Entity{

	//variables de instancia.

	private $proyecto;
	private $dt_alta;
	private $dt_baja;
	private $cd_estado;
	private $tipoinvestigador;
	
	private $docente;
		
	public function __construct(){
		$this->proyecto = new Proyecto();
		$this->dt_baja = '';
		$this->tipoinvestigador = new Tipoinvestigador();
		
		$this->dt_alta = '';
		$this->docente = new Docente();
		
		
		
	}




	

	

	

	public function getProyecto()
	{
	    return $this->proyecto;
	}

	public function setProyecto($proyecto)
	{
	    $this->proyecto = $proyecto;
	}

	public function getDt_alta()
	{
	    return $this->dt_alta;
	}

	public function setDt_alta($dt_alta)
	{
	    $this->dt_alta = $dt_alta;
	}

	public function getDt_baja()
	{
	    return $this->dt_baja;
	}

	public function setDt_baja($dt_baja)
	{
	    $this->dt_baja = $dt_baja;
	}

	public function getTipoinvestigador()
	{
	    return $this->tipoinvestigador;
	}

	public function setTipoinvestigador($tipoinvestigador)
	{
	    $this->tipoinvestigador = $tipoinvestigador;
	}

	public function getDocente()
	{
	    return $this->docente;
	}

	public function setDocente($docente)
	{
	    $this->docente = $docente;
	}

	public function getCd_estado()
	{
	    return $this->cd_estado;
	}

	public function setCd_estado($cd_estado)
	{
	    $this->cd_estado = $cd_estado;
	}
}
?>