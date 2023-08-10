<?php

/**
 * GridModel para Evaluación
 *
 * @author Marcos
 * @since 02-12-2013
 */
class EvaluacionGridModel extends GridModel {

	public function EvaluacionGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CYT_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		
		$tPeriodo = CYTSecureDAOFactory::getPeriodoDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "periodo.ds_periodo", CYT_LBL_PERIODO, 20, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tPeriodo.ds_periodo" );
		$this->addColumn( $column );
		
		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "docente.ds_apellido,docente.ds_nombre", CYT_LBL_EVALUACION_SOLICITANTE, 50, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tDocente.ds_apellido,$tDocente.ds_nombre" ) ;
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "dt_fecha", CYT_LBL_SOLICITUD_FECHA, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CYT_DATETIME_FORMAT) ); 
		$this->addColumn( $column );
		
		$tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "user.ds_username", CYT_LBL_EVALUACION_EVALUADOR, 20, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tUser.ds_username" );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "bl_interno", CYT_LBL_INTERNO, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridBoolValueFormat() ); 
		$this->addColumn( $column );
		
		$tEstado = CYTSecureDAOFactory::getEstadoEvaluacionDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "estado.ds_estado", CYT_LBL_ESTADO, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tEstado.ds_estado" );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "nu_puntaje", CYT_LBL_EVALUACION_PUNTAJE, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT, "nu_puntaje",new GridNumeroValueFormat()  );
		$this->addColumn( $column );
		//acciones sobre la lista
		$this->buildAction("assign_evaluadores_init", "assign_evaluadores_init", CYT_MSG_EVALUACION_TITLE_ADD, "image", "add");
		$this->buildAction("add_evaluador_init", "add_evaluador_init", CYT_MSG_EVALUACION_TITLE_AGREGAR, "image", "add");
		$this->buildAction("send_evaluadores", "send_evaluadores", CYT_MSG_EVALUACION_TITLE_SEND, "image", "select", false,"confirm_action( '".CYT_MSG_EVALUADORES_SEND_CONFIRMATION."?' , '".CDT_CMP_GRID_MSG_CONFIRM_DELETE_TITLE."',  function(){ delete_items('send_evaluadores') } );  return false");
		$this->buildAction("actualizar_puntaje", "actualizar_puntaje", CYT_MSG_EVALUACION_ACTUALIZAR_PUNTAJE, "image", "edit", false,"confirm_action( '".CYT_MSG_EVALUADORES_ACTUALIZAR_PUNTAJES."?' , '".CDT_CMP_GRID_MSG_CONFIRM_DELETE_TITLE."',  function(){ delete_items('actualizar_puntaje') } );  return false");
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CYT_MSG_EVALUACION_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getEvaluacionManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {
		//return $this->getDefaultRowActions($item, "evaluacion", CYT_LBL_EVALUACION, true, true, true, false, 500, 750);
		$actions = new ItemCollection();
	
		$action = $this->buildRowAction( "view_evaluacion_pdf", "view_evaluacion_pdf", CDT_UI_LBL_EXPORT_PDF, CDT_UI_IMG_SEARCH, "view") ;
		$action->setBl_targetblank(true);
		$actions->addItem( $action );
		
		
		
		$oUser = CdtSecureUtils::getUserLogged();
		if (CdtSecureUtils::hasPermission ( $oUser, CYT_FUNCTION_LISTAR_ESTADO )) {
			
			$action = $this->buildRowAction("list_evaluacionesEstado", "list_evaluacionesEstado", CYT_MSG_SOLICITUD_ESTADO_TITLE_LIST, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "attach" ) ;
			$actions->addItem( $action );
			
		}
		
		
		return $actions;
	}


}
?>