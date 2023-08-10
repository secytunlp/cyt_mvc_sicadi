<?php

/**
 * Especialidad
 *
 * @author Marcos
 * @since 09-02-2015
 */

class Especialidad extends Entity{

	//variables de instancia.
	
	

	private $ds_especialidad;
	
	private $ds_codigo;
	
	private $disciplina;
	

	public function __construct(){
		
		$this->ds_especialidad = '';
		
		$this->ds_codigo = "";
		
		$this->disciplina = new Disciplina();
		
	}



	

	public function getDs_especialidad()
	{
	    return $this->ds_especialidad;
	}

	public function setDs_especialidad($ds_especialidad)
	{
	    $this->ds_especialidad = $ds_especialidad;
	}

	public function getDs_codigo()
	{
	    return $this->ds_codigo;
	}

	public function setDs_codigo($ds_codigo)
	{
	    $this->ds_codigo = $ds_codigo;
	}

	public function getDisciplina()
	{
	    return $this->disciplina;
	}

	public function setDisciplina($disciplina)
	{
	    $this->disciplina = $disciplina;
	}
}
?>