<?php

/**
 * Proyecto
 *
 * @author Marcos
 * @since 20-11-2013
 */

class Proyecto extends Entity{

	//variables de instancia.

	
		private $ds_titulo;
		private $ds_codigo;
		private $dt_ini;
		private $dt_fin;
		
		private $facultad;
		
		private $director;
		
		private $tipoAcreditacion;
		
		private $tipoEstadoProyecto;
		
		private $ds_abstract1;
		
		private $disciplina;
		
		private $especialidad;
	public function __construct(){
		 
			$this->ds_titulo = '';
			$this->ds_codigo = '';
			$this->dt_fin = '';
			$this->dt_inc = '';
			$this->dt_ini = '';
			$this->facultad = new Facultad();
			$this->director = new Docente();
			$this->tipoAcreditacion = new TipoAcreditacion();
			$this->tipoEstadoProyecto = new TipoEstadoProyecto();
			$this->ds_abstract1 = '';
			
			$this->disciplina = new Disciplina();
			
			$this->especialidad = new Especialidad();
	}




	

	


		public function getDs_titulo()
		{
		    return $this->ds_titulo;
		}

		public function setDs_titulo($ds_titulo)
		{
		    $this->ds_titulo = $ds_titulo;
		}

		public function getDs_codigo()
		{
		    return $this->ds_codigo;
		}

		public function setDs_codigo($ds_codigo)
		{
		    $this->ds_codigo = $ds_codigo;
		}

		public function getDt_ini()
		{
		    return $this->dt_ini;
		}

		public function setDt_ini($dt_ini)
		{
		    $this->dt_ini = $dt_ini;
		}

		public function getDt_fin()
		{
		    return $this->dt_fin;
		}

		public function setDt_fin($dt_fin)
		{
		    $this->dt_fin = $dt_fin;
		}

		public function getFacultad()
		{
		    return $this->facultad;
		}

		public function setFacultad($facultad)
		{
		    $this->facultad = $facultad;
		}

		public function getDirector()
		{
		    return $this->director;
		}

		public function setDirector($director)
		{
		    $this->director = $director;
		}

		public function getTipoAcreditacion()
		{
		    return $this->tipoAcreditacion;
		}

		public function setTipoAcreditacion($tipoAcreditacion)
		{
		    $this->tipoAcreditacion = $tipoAcreditacion;
		}

		public function getTipoEstadoProyecto()
		{
		    return $this->tipoEstadoProyecto;
		}

		public function setTipoEstadoProyecto($tipoEstadoProyecto)
		{
		    $this->tipoEstadoProyecto = $tipoEstadoProyecto;
		}

	public function getDs_abstract1()
	{
	    return $this->ds_abstract1;
	}

	public function setDs_abstract1($ds_abstract1)
	{
	    $this->ds_abstract1 = $ds_abstract1;
	}

	public function getDisciplina()
	{
	    return $this->disciplina;
	}

	public function setDisciplina($disciplina)
	{
	    $this->disciplina = $disciplina;
	}

	public function getEspecialidad()
	{
	    return $this->especialidad;
	}

	public function setEspecialidad($especialidad)
	{
	    $this->especialidad = $especialidad;
	}
}
?>