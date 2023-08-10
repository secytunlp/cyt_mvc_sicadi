<?php

/**
 * Acción para listar estados.
 *
 * @author Marcos
 * @since 08-03-2016
 *
 */
class ListRendicionesEstadoAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPRendicionEstadoGrid();
	}



}
