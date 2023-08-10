<?php

/**
 * Acción para listar estados.
 *
 * @author Marcos
 * @since 16-11-2013
 *
 */
class ListSolicitudesEstadoAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPSolicitudEstadoGrid();
	}



}
