<?php

/**
 * GridModel para Evaluacion Estado
 *
 * @author Marcos
 * @since 03-12-2013
 */
class EvaluacionEstadoGridModel extends GridModel {

	public function EvaluacionEstadoGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CYT_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );

		$tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "user.ds_username", CYT_LBL_EVALUACION_EVALUADOR, 20, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tUser.ds_username" );
		$this->addColumn( $column );

		$tEstado = CYTSecureDAOFactory::getEstadoEvaluacionDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "estado.ds_estado", CYT_LBL_ESTADO, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tEstado.ds_estado" );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "fechaDesde", CYT_LBL_SOLICITUD_ESTADO_FECHA_DESDE, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CYT_DATETIME_FORMAT) ); 
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "fechaHasta", CYT_LBL_SOLICITUD_ESTADO_FECHA_HASTA, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CYT_DATETIME_FORMAT) ); 
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "motivo", CYT_LBL_SOLICITUD_ESTADO_MOTIVO, 40 );
		$this->addColumn( $column );
		
		$tUser = CYT_TABLE_CDT_USER;
        $column = GridModelBuilder::buildColumn( "userMod.ds_username", CYT_LBL_SOLICITUD_ESTADO_USUARIO_ULTIMA_MODIFICACION, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tUser.ds_username" );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "fechaUltModificacion", CYT_LBL_SOLICITUD_ESTADO_FECHA_ULTIMA_MODIFICACION, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CYT_DATETIME_FORMAT) ); 
		$this->addColumn( $column );
		
		//acciones sobre la lista
		$this->buildAction("cambiarEstadoEvaluacion_init", "cambiarEstadoEvaluacion_init", CYT_MSG_SOLICITUD_ESTADO_CAMBIAR, "image", "edit");
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CYT_MSG_SOLICITUD_ESTADO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return CYTSecureManagerFactory::getEvaluacionEstadoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		
		
		//$actions = $this->getDefaultRowActions($item, "matriculado", CPIQ_LBL_MATRICULADO, false, true, true, false, 500, 750);
		
		$actions = new ItemCollection();
		
		
		
		return $actions;
	}


}
?>