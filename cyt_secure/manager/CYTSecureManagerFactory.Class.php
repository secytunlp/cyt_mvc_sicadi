<?php

/**
 * Factory para Managers
 *  
 * @author Marcos
 * @since 09-11-2013
 */
class CYTSecureManagerFactory{

	public static function getUserUserGroupManager(){
		return new UserUserGroupManager();
	}
	
	public static function getUserManager(){
		return new UserManager();
	}
	
	public static function getUserGroupFunctionManager(){
		return new UserGroupFunctionManager();
	}
	
	public static function getDocenteManager(){
		return new DocenteManager();
	}
	
	public static function getRegistrationManager(){
		return new RegistrationManager();
	}
	
	public static function getPeriodoManager(){
		return new PeriodoManager();
	}
	
	public static function getFacultadManager(){
		return new FacultadManager();
	}
	
	public static function getCategoriaManager(){
		return new CategoriaManager();
	}
	
	public static function getCarrerainvManager(){
		return new CarrerainvManager();
	}
	
	public static function getCargoManager(){
		return new CargoManager();
	}
	
	public static function getDeddocManager(){
		return new DeddocManager();
	}
	
	public static function getOrganismoManager(){
		return new OrganismoManager();
	}
	
	public static function getLugarTrabajoManager(){
		return new LugarTrabajoManager();
	}
	
	public static function getProyectoManager(){
		return new ProyectoManager();
	}
	
	public static function getCatManager(){
		return new CatManager();
	}
	
	public static function getEstadoManager(){
		return new EstadoManager();
	}
	
	public static function getPredefinidoEvaluacionManager(){
		return new PredefinidoEvaluacionManager();
	}
	
	public static function getEstadoEvaluacionManager(){
		return new EstadoEvaluacionManager();
	}
	
	public static function getTituloManager(){
		return new TituloManager();
	}
	
	public static function getUniversidadManager(){
		return new UniversidadManager();
	}
	
	public static function getBecaManager(){
		return new BecaManager();
	}
	
	public static function getTipoinvestigadorManager(){
		return new TipoinvestigadorManager();
	}
	
	public static function getSolicitudEstadoManager(){
		return new SolicitudEstadoManager();
	}
	
	public static function getIntegranteManager(){
		return new IntegranteManager();
	}
	
	public static function getEvaluadorManager(){
		return new EvaluadorManager();
	}
	
	public static function getEvaluadoresManager(){
		return new EvaluadoresManager();
	}
	
	public static function getEvaluacionEstadoManager(){
		return new EvaluacionEstadoManager();
	}
	
	public static function getUnidadAprobadaManager(){
		return new UnidadAprobadaManager();
	}
	
	public static function getNoRendidasManager(){
		return new NoRendidasManager();
	}
	
	public static function getDisciplinaManager(){
		return new DisciplinaManager();
	}
	
	public static function getEspecialidadManager(){
		return new EspecialidadManager();
	}
	
	public static function getCampoManager(){
		return new CampoManager();
	}
	
	public static function getRendicionManager(){
		return new RendicionManager();
	}
	
	public static function getRendicionEstadoManager(){
		return new RendicionEstadoManager();
	}
	
}

?>