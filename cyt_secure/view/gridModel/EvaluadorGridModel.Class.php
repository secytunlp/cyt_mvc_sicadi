<?php

/**
 * GridModel para Evaluador
 *
 * @author Marcos
 * @since 16-05-2014
 */
class EvaluadorGridModel extends GridModel {

	public function EvaluadorGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CYT_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		
		
		$column = GridModelBuilder::buildColumn( "ds_username", CDT_SECURE_LBL_CDTUSER_DS_USERNAME, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "ds_username" );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "ds_name", CYT_LBL_EVALUADOR, 80, CDT_CMP_GRID_TEXTALIGN_LEFT, "ds_name" );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "Facultad.ds_facultad", CYT_LBL_FACULTAD, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "Facultad.ds_facultad" );
		$this->addColumn( $column );
		
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CYT_MSG_EVALUADOR_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return CYTSecureManagerFactory::getEvaluadorManager();
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