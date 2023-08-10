<?php

/**
 * Acción para listar evaluaciones.
 *
 * @author Marcos
 * @since 03-12-2013
 *
 */
class ListEvaluacionesEstadoAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPEvaluacionEstadoGrid();
	}



}
