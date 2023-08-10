<?php

/**
 * Acción para listar evaluaciones.
 *
 * @author Marcos
 * @since 02-12-2013
 *
 */
class ListEvaluacionesAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPEvaluacionGrid();
	}



}
