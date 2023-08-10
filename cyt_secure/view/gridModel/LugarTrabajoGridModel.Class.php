<?php

/**
 * GridModel para LugarTrabajo
 *
 * @author Marcos
 * @since 02-11-2013
 */
class LugarTrabajoGridModel extends GridModel {

	public function LugarTrabajoGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CYT_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		
		
		$column = GridModelBuilder::buildColumn( "ds_unidad,ds_sigla", CYT_LBL_LUGAR_TRABAJO_NOMBRE.' '.CYT_LBL_LUGAR_TRABAJO_SIGLA, 80, CDT_CMP_GRID_TEXTALIGN_LEFT, "ds_unidad,ds_sigla" );
		$this->addColumn( $column );
		
		
		//$tPadre = DAOFactory::getLugarTrabajoDAO()->getTableName();
       /* $column = GridModelBuilder::buildColumn( "PADRE.ds_unidad", CYT_LBL_LUGAR_TRABAJO_PADRE, 60, CDT_CMP_GRID_TEXTALIGN_LEFT, "PADRE.ds_unidad" );
		$this->addColumn( $column );*/
		
		$column = GridModelBuilder::buildColumn( "oid", CYT_LBL_LUGAR_TRABAJO_PADRE, 60, CDT_CMP_GRID_TEXTALIGN_LEFT, "",new GridPadreValueFormat());
		$this->addColumn( $column );
		
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CYT_MSG_LUGAR_TRABAJO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return CYTSecureManagerFactory::getLugarTrabajoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {
		return new ItemCollection();
	}


}
?>