<?php

/**
 * Formato para renderizar una observacion en las grillas
 *
 * @author Marcos
 * @since 08-06-2016
 *
 */
class GridRendicionObservacionesValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('rendicion_oid', $value, '=');
		$oCriteria->addNull('fechaHasta');
		$managerRendicionEstado =  ManagerFactory::getRendicionEstadoManager();
		$oRendicionEstado = $managerRendicionEstado->getEntity($oCriteria);
		if (!empty($oRendicionEstado)) {
			$res = $oRendicionEstado->getMotivo();
		}
		
		
		return $res ;
	}

}