<?php

/**
 * Acción para listar rendiciones.
 *
 * @author Marcos
 * @since 04-03-2016
 *
 */
class ListRendicionesAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPRendicionGrid();
	}



}
