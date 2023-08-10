<?php

/**
 * Formato para renderizar un evaluacion en las grillas
 *
 * @author Marcos
 * @since 17-11-2013
 *
 */
class GridEvaluacionValueFormat extends GridValueFormat {
	private $orden;
	public function __construct($orden) {

		parent::__construct();
		$this->setOrden($orden);
	}

	public function format($value, $item=null) {
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('cd_solicitud', $value, '=');
		$tEvaluacionEstado = CYTSecureDAOFactory::getEvaluacionEstadoDAO()->getTableName();
		//$oCriteria->addFilter($tEvaluacionEstado.'.estado_oid', CYT_ESTADO_SOLICITUD_EVALUADA, '=');
		$oCriteria->addNull("$tEvaluacionEstado.fechaHasta");
		
		$res = '';
		$managerEvaluacion =  ManagerFactory::getEvaluacionManager();
		/*if ($this->getOrden()==1) {
			$oCriteria->addFilter('bl_interno', 1, '=');
			$oEvaluacion = $managerEvaluacion->getEntity($oCriteria);
		}
		else{
			$oCriteria->addFilter('bl_interno', 0, '=');
			$oEvaluaciones = $managerEvaluacion->getEntities($oCriteria);
			$count=2;
			foreach ($oEvaluaciones as $oEval) {
				if ($count == $this->getOrden()) {
					$oEvaluacion=$oEval;
				}
				$count++;
			}
		}*/
		$oEvaluaciones = $managerEvaluacion->getEntities($oCriteria);
		$res='';
		foreach ($oEvaluaciones as $oEvaluacion) {
			$strInterno = ($oEvaluacion->getBl_interno())?'Interno':'Externo';
			$res .= $oEvaluacion->getUser()->getDs_username().' / '.$strInterno.' / '.$oEvaluacion->getEstado()->getDs_estado().' / P. '.number_format ( $oEvaluacion->getNu_puntaje() , CYT_DECIMALES , CYT_SEPARADOR_DECIMAL, CYT_SEPARADOR_MILES ).'<br>';
		}
		
		
		
		return $res ;
	}


	public function getOrden()
	{
	    return $this->orden;
	}

	public function setOrden($orden)
	{
	    $this->orden = $orden;
	}
}