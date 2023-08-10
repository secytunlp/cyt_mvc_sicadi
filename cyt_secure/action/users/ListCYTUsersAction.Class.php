<?php

/**
 * Acción para listar CYTUsers.
 * 
 * @author Marcos
 * @since 10-11-2013
 * 
 */
class ListCYTUsersAction extends CMPGridAction {

	protected function getGridModel( CMPGrid $oGrid ){
		
		return new  CYTUserGridModel();
	}

}
