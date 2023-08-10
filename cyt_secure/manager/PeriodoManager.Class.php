<?php

/**
 * Manager para Periodo
 *  
 * @author Marcos
 * @since 13-11-2013
 */
class PeriodoManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getPeriodoDAO();
	}

	public function getPeriodoActual($year_actual){
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter("ds_periodo", $year_actual, "=", new CdtCriteriaFormatStringValue());
		$oPeriodo = $this->getEntity($oCriteria);
		if (empty($oPeriodo)) {
			$oPeriodo = new Periodo();
			$oPeriodo->setDs_periodo($year_actual);
			$this->add($oPeriodo);
		}
		return $oPeriodo;
	}
}
?>
