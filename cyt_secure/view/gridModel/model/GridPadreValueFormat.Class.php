<?php

/**
 * Formato para renderizar un padre en las grillas
 *
 * @author Marcos
 * @since 04-11-2013
 *
 */
class GridPadreValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {

		$_SESSION['padre_'.$value]='';
		
		
		$managerLugarTrabajo =  CYTSecureManagerFactory::getLugarTrabajoManager();
		$oLugarTrabajo = $managerLugarTrabajo->getObjectByCode($value);
		
		
		$managerLugarTrabajo->damePadre($oLugarTrabajo, 'padre_'.$value);
		
		
		
		$res = $_SESSION['padre_'.$value];
		unset($_SESSION['padre_'.$value]);
		$res = substr( $res, 0, strlen($res)-2); //quitamos el ultimo " - " 
		return $res ;
	}

}