<?php

/**
 * GridModel para Universidad
 *
 * @author Marcos
 * @since 03-01-2014
 */
class UniversidadGridModel extends GridModel {

	public function UniversidadGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CYT_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		
		
		$column = GridModelBuilder::buildColumn( "ds_universidad", CYT_LBL_UNIVERSIDAD_NOMBRE, 80, CDT_CMP_GRID_TEXTALIGN_LEFT, "ds_universidad" );
		$this->addColumn( $column );
		
		
		
		
		
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CYT_MSG_UNIVERSIDAD_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return CYTSecureManagerFactory::getUniversidadManager();
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