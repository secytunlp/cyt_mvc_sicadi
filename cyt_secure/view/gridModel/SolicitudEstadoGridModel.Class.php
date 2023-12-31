<?php

/**
 * GridModel para Solicitud Estado
 *
 * @author Marcos
 * @since 16-11-2013
 */
class SolicitudEstadoGridModel extends GridModel {

	public function __construct() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CYT_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );

		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "docente.ds_apellido,docente.ds_nombre", CYT_LBL_SOLICITUD_SOLICITANTE, 50, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tDocente.ds_apellido,$tDocente.ds_nombre" ) ;
		$this->addColumn( $column );

		$tEstado = CYTSecureDAOFactory::getEstadoDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "estado.ds_estado", CYT_LBL_ESTADO, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tEstado.ds_estado" );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "fechaDesde", CYT_LBL_SOLICITUD_ESTADO_FECHA_DESDE, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CYT_DATETIME_FORMAT) ); 
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "fechaHasta", CYT_LBL_SOLICITUD_ESTADO_FECHA_HASTA, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CYT_DATETIME_FORMAT) ); 
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "motivo", CYT_LBL_SOLICITUD_ESTADO_MOTIVO, 40 );
		$this->addColumn( $column );
		
		$tUser = CYT_TABLE_CDT_USER;
        $column = GridModelBuilder::buildColumn( "user.ds_username", CYT_LBL_SOLICITUD_ESTADO_USUARIO_ULTIMA_MODIFICACION, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tUser.ds_username" );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "fechaUltModificacion", CYT_LBL_SOLICITUD_ESTADO_FECHA_ULTIMA_MODIFICACION, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CYT_DATETIME_FORMAT) ); 
		$this->addColumn( $column );
		
		//acciones sobre la lista
		$this->buildAction("cambiarEstadoSolicitud_init", "cambiarEstadoSolicitud_init", CYT_MSG_SOLICITUD_ESTADO_CAMBIAR, "image", "edit");
		
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
		return CYTSecureManagerFactory::getSolicitudEstadoManager();
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