<?php

/**
 * Docente
 *
 * @author Marcos
 * @since 29-10-2013
 */

class Docente extends Entity{

	//variables de instancia.

	private $ds_nombre;
	
	private $ds_apellido;
	
	private $nu_precuil;
	
	private $nu_documento;
	
	private $nu_postcuil;
	
	private $categoria;
	  
	private $carreraInv;  
	
	private $organismo;
	  
	private $cargo;  
	
	private $dt_cargo;  
	
	private $deddoc;
	
	private $facultad;
	  
	private $lugarTrabajo;  
	
	private $bl_becario;
	  
	private $ds_tipobeca; 
	
	private $ds_orgbeca;
	
	private $dt_beca;
	
	private $dt_becaHasta;
	
	private $ds_calle;
	
	private $nu_nro;
	
	private $nu_piso;
	
	private $ds_depto;
	
	private $nu_cp;
	
	private $nu_telefono;
	
	private $ds_mail;
	
	private $titulo;
	
	private $titulopost;
	 
	private $universidad;
	
	private $bl_becaEstimulo;
	
	private $dt_becaEstimulo;
	
	private $dt_becaEstimuloHasta;
	public function __construct(){
		 
		$this->ds_nombre = "";
	
		$this->ds_apellido = "";
		
		$this->nu_precuil = "";
		
		$this->nu_documento = "";
		
		$this->nu_postcuil = "";
		
		$this->categoria = new Categoria();
		  
		$this->carreraInv = new CarreraInv();  
		
		$this->organismo = new Organismo();
		  
		$this->cargo = new Cargo();  
		
		$this->deddoc = new DedDoc();
		
		$this->facultad = new Facultad();
		  
		$this->lugarTrabajo = new LugarTrabajo();  
		
		$this->bl_becario = "";
		  
		$this->ds_tipobeca = ""; 
		
		$this->ds_orgbeca = "";
		
		$this->ds_calle = "";
	
		$this->nu_nro = "";
		
		$this->nu_piso = "";
		
		$this->ds_depto = "";
		
		$this->nu_cp = "";
		
		$this->nu_telefono = "";
		
		$this->ds_mail = "";
		
		$this->titulo = new Titulo();  
		
		$this->titulopost = new Titulo();  
		
		$this->universidad = new Universidad(); 
		
	}




	

	

	public function getDs_nombre()
	{
	    return $this->ds_nombre;
	}

	public function setDs_nombre($ds_nombre)
	{
	    $this->ds_nombre = $ds_nombre;
	}

	public function getDs_apellido()
	{
	    return $this->ds_apellido;
	}

	public function setDs_apellido($ds_apellido)
	{
	    $this->ds_apellido = $ds_apellido;
	}

	public function getNu_precuil()
	{
	    return $this->nu_precuil;
	}

	public function setNu_precuil($nu_precuil)
	{
	    $this->nu_precuil = $nu_precuil;
	}

	public function getNu_documento()
	{
	    return $this->nu_documento;
	}

	public function setNu_documento($nu_documento)
	{
	    $this->nu_documento = $nu_documento;
	}

	public function getNu_postcuil()
	{
	    return $this->nu_postcuil;
	}

	public function setNu_postcuil($nu_postcuil)
	{
	    $this->nu_postcuil = $nu_postcuil;
	}

	public function getCategoria()
	{
	    return $this->categoria;
	}

	public function setCategoria($categoria)
	{
	    $this->categoria = $categoria;
	}

	public function getCarreraInv()
	{
	    return $this->carreraInv;
	}

	public function setCarreraInv($carreraInv)
	{
	    $this->carreraInv = $carreraInv;
	}

	public function getOrganismo()
	{
	    return $this->organismo;
	}

	public function setOrganismo($organismo)
	{
	    $this->organismo = $organismo;
	}

	public function getCargo()
	{
	    return $this->cargo;
	}

	public function setCargo($cargo)
	{
	    $this->cargo = $cargo;
	}

	public function getDeddoc()
	{
	    return $this->deddoc;
	}

	public function setDeddoc($deddoc)
	{
	    $this->deddoc = $deddoc;
	}

	public function getFacultad()
	{
	    return $this->facultad;
	}

	public function setFacultad($facultad)
	{
	    $this->facultad = $facultad;
	}

	public function getLugarTrabajo()
	{
	    return $this->lugarTrabajo;
	}

	public function setLugarTrabajo($lugarTrabajo)
	{
	    $this->lugarTrabajo = $lugarTrabajo;
	}

	public function getBl_becario()
	{
	    return $this->bl_becario;
	}

	public function setBl_becario($bl_becario)
	{
	    $this->bl_becario = $bl_becario;
	}

	public function getDs_tipobeca()
	{
	    return $this->ds_tipobeca;
	}

	public function setDs_tipobeca($ds_tipobeca)
	{
	    $this->ds_tipobeca = $ds_tipobeca;
	}

	public function getDs_orgbeca()
	{
	    return $this->ds_orgbeca;
	}

	public function setDs_orgbeca($ds_orgbeca)
	{
	    $this->ds_orgbeca = $ds_orgbeca;
	}

	public function getDs_calle()
	{
	    return $this->ds_calle;
	}

	public function setDs_calle($ds_calle)
	{
	    $this->ds_calle = $ds_calle;
	}

	public function getNu_nro()
	{
	    return $this->nu_nro;
	}

	public function setNu_nro($nu_nro)
	{
	    $this->nu_nro = $nu_nro;
	}

	public function getNu_piso()
	{
	    return $this->nu_piso;
	}

	public function setNu_piso($nu_piso)
	{
	    $this->nu_piso = $nu_piso;
	}

	public function getDs_depto()
	{
	    return $this->ds_depto;
	}

	public function setDs_depto($ds_depto)
	{
	    $this->ds_depto = $ds_depto;
	}

	public function getNu_cp()
	{
	    return $this->nu_cp;
	}

	public function setNu_cp($nu_cp)
	{
	    $this->nu_cp = $nu_cp;
	}

	public function getNu_telefono()
	{
	    return $this->nu_telefono;
	}

	public function setNu_telefono($nu_telefono)
	{
	    $this->nu_telefono = $nu_telefono;
	}

	public function getDs_mail()
	{
	    return $this->ds_mail;
	}

	public function setDs_mail($ds_mail)
	{
	    $this->ds_mail = $ds_mail;
	}

	public function getTitulo()
	{
	    return $this->titulo;
	}

	public function setTitulo($titulo)
	{
	    $this->titulo = $titulo;
	}

	public function getTitulopost()
	{
	    return $this->titulopost;
	}

	public function setTitulopost($titulopost)
	{
	    $this->titulopost = $titulopost;
	}
	
	public function getCuil()
	{
	    return $this->getNu_precuil().'-'.$this->getNu_documento().'-'.$this->getNu_postcuil();
	}

	public function getDt_cargo()
	{
	    return $this->dt_cargo;
	}

	public function setDt_cargo($dt_cargo)
	{
	    $this->dt_cargo = $dt_cargo;
	}

	public function getDt_beca()
	{
	    return $this->dt_beca;
	}

	public function setDt_beca($dt_beca)
	{
	    $this->dt_beca = $dt_beca;
	}

	public function getUniversidad()
	{
	    return $this->universidad;
	}

	public function setUniversidad($universidad)
	{
	    $this->universidad = $universidad;
	}

	public function getBl_becaEstimulo()
	{
	    return $this->bl_becaEstimulo;
	}

	public function setBl_becaEstimulo($bl_becaEstimulo)
	{
	    $this->bl_becaEstimulo = $bl_becaEstimulo;
	}

	public function getDt_becaEstimulo()
	{
	    return $this->dt_becaEstimulo;
	}

	public function setDt_becaEstimulo($dt_becaEstimulo)
	{
	    $this->dt_becaEstimulo = $dt_becaEstimulo;
	}

	public function getDt_becaHasta()
	{
	    return $this->dt_becaHasta;
	}

	public function setDt_becaHasta($dt_becaHasta)
	{
	    $this->dt_becaHasta = $dt_becaHasta;
	}

	public function getDt_becaEstimuloHasta()
	{
	    return $this->dt_becaEstimuloHasta;
	}

	public function setDt_becaEstimuloHasta($dt_becaEstimuloHasta)
	{
	    $this->dt_becaEstimuloHasta = $dt_becaEstimuloHasta;
	}
}
?>