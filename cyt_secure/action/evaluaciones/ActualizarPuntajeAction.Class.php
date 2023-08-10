<?php

/**
 * Acción para actualizar puntaje.
 *
 * @author Marcos
 * @since 10-04-2018
 *
 */
class ActualizarPuntajeAction extends CdtEditAsyncAction {

	
    protected function getEntity() {
        $oEvaluacion = new Evaluacion();
		$filter = new CMPEvaluacionFilter();
		$filter->fillSavedProperties();
		$oEvaluacion->setSolicitud($filter->getSolicitud());
		
		return $oEvaluacion;
    }

    /**
     * (non-PHPdoc)
     * @see CdtEditAsyncAction::edit();
     */
    protected function edit($entity) {
        $this->getEntityManager()->actualizarPuntaje($entity);
    }
    
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return ManagerFactory::getEvaluacionManager();
	}
	
	


}