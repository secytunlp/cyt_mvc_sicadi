<?php

/**
 * GridModel para Titulo de posgrado
 *
 * @author Marcos
 * @since 27-06-2014
 */
class TituloPosgradoGridModel extends GridModel {

	public function TituloPosgradoGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CYT_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		
		
		$column = GridModelBuilder::buildColumn( "ds_titulo", CYT_LBL_TITULO_NOMBRE, 80, CDT_CMP_GRID_TEXTALIGN_LEFT, "ds_titulo" );
		$this->addColumn( $column );
		
		$tUniversidad = CYTSecureDAOFactory::getUniversidadDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "universidad.ds_universidad", CYT_LBL_TITULO_UNIVERSIDAD, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tUniversidad.ds_universidad" );
		$this->addColumn( $column );
		
		
		/*$column = GridModelBuilder::buildColumn( "nu_nivel", CYT_LBL_TITULO_NIVEL, 20, "","",new GridNivelValueFormat() ) ;
		$this->addColumn( $column );*/
		
		
		
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CYT_MSG_TITULOPOSGRADO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return CYTSecureManagerFactory::getTituloManager();
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