<?php

/**
 * Factory para DAOs
 *
 * @author Marcos
 * @since 09-11-2013
 */
class CYTSecureDAOFactory{

	public static function getUserUserGroupDAO(){
		return new UserUserGroupDAO();
	}
	
	public static function getRegistrationDAO(){
		return new RegistrationDAO();
	}
	
	public static function getUserDAO(){
		return new UserDAO();
	}
	
	public static function getUserGroupFunctionDAO(){
		return new UserGroupFunctionDAO();
	}
	
	public static function getDocenteDAO(){
		return new DocenteDAO();
	}
	
	public static function getCategoriaDAO(){
		return new CategoriaDAO();
	}
	
	public static function getCarrerainvDAO(){
		return new CarrerainvDAO();
	}
	
	public static function getOrganismoDAO(){
		return new OrganismoDAO();
	}
	
	public static function getCargoDAO(){
		return new CargoDAO();
	}
	
	public static function getDeddocDAO(){
		return new DeddocDAO();
	}
	
	public static function getLugarTrabajoDAO(){
		return new LugarTrabajoDAO();
	}
	
	public static function getFacultadDAO(){
		return new FacultadDAO();
	}
	
	public static function getPeriodoDAO(){
		return new PeriodoDAO();
	}
	
	public static function getCatDAO(){
		return new CatDAO();
	}
	
	public static function getEstadoDAO(){
		return new EstadoDAO();
	}
	
	public static function getPredefinidoEvaluacionDAO(){
		return new PredefinidoEvaluacionDAO();
	}
	
	public static function getEstadoEvaluacionDAO(){
		return new EstadoEvaluacionDAO();
	}
	
	public static function getTipoEstadoProyectoDAO(){
		return new TipoEstadoProyectoDAO();
	}

	
	public static function getTipoinvestigadorDAO(){
		return new TipoinvestigadorDAO();
	}
	
	public static function getProyectoDAO(){
		return new ProyectoDAO();
	}
	
	public static function getIntegranteDAO(){
		return new IntegranteDAO();
	}
	
	public static function getTituloDAO(){
		return new TituloDAO();
	}
	
	public static function getUniversidadDAO(){
		return new UniversidadDAO();
	}
	
	public static function getBecaDAO(){
		return new BecaDAO();
	}
	
	public static function getSolicitudEstadoDAO(){
		return new SolicitudEstadoDAO();
	}
	
	public static function getEvaluadorDAO(){
		return new EvaluadorDAO();
	}
	
	public static function getEvaluacionDAO(){
		return new EvaluacionDAO();
	}
	
	
	public static function getEvaluacionEstadoDAO(){
		return new EvaluacionEstadoDAO();
	}
	
	public static function getUnidadAprobadaDAO(){
		return new UnidadAprobadaDAO();
	}
	
	public static function getNoRendidasDAO(){
		return new NoRendidasDAO();
	}
	
	public static function getDisciplinaDAO(){
		return new DisciplinaDAO();
	}
	
	public static function getEspecialidadDAO(){
		return new EspecialidadDAO();
	}
	
	public static function getCampoDAO(){
		return new CampoDAO();
	}
	
	public static function getRendicionDAO(){
		return new RendicionDAO();
	}
	
	public static function getRendicionEstadoDAO(){
		return new RendicionEstadoDAO();
	}
	
	
}
?>
