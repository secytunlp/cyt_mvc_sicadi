<?php

/**
 * GridModel para Rendicion
 *
 * @author Marcos
 * @since 04-03-2016
 */
class RendicionGridModel extends GridModel {

    public function __construct() {

        parent::__construct();
        $this->initModel();
    }

    protected function initModel() {



        $column = GridModelBuilder::buildColumn( "oid", CYT_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
        $this->addColumn( $column );

        $tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "solicitud.docente.ds_apellido,solicitud.docente.ds_nombre", CYT_LBL_SOLICITUD_SOLICITANTE, 50, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tDocente.ds_apellido,$tDocente.ds_nombre" ) ;
        $this->addColumn( $column );

        $tPeriodo = CYTSecureDAOFactory::getPeriodoDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "solicitud.periodo.ds_periodo", CYT_LBL_SOLICITUD_PERIODO, 20, CDT_CMP_GRID_TEXTALIGN_CENTER, "$tPeriodo.ds_periodo" ) ;
        $this->addColumn( $column );

        $column = GridModelBuilder::buildColumn( "dt_fecha", CYT_LBL_SOLICITUD_FECHA, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CYT_DATETIME_FORMAT) );
        $this->addColumn( $column );

        $tEstado = CYTSecureDAOFactory::getEstadoDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "estado.ds_estado", CYT_LBL_ESTADO, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tEstado.ds_estado" );
        $this->addColumn( $column );

        $column = GridModelBuilder::buildColumn( "ds_observacion", CYT_LBL_EVALUACION_OBSERVACIONES, 20, CDT_CMP_GRID_TEXTALIGN_LEFT, "ds_observacion");
        $this->addColumn( $column );

        $column = GridModelBuilder::buildColumn( "oid", CYT_LBL_RENDICION_OBSERVACIONES, 80, CDT_CMP_GRID_TEXTALIGN_LEFT,"",new GridRendicionObservacionesValueFormat() ) ;
        $this->addColumn( $column );

        $column = GridModelBuilder::buildColumn( "oid", CYT_LBL_SOLICITUD_ARCHIVOS, 60, CDT_CMP_GRID_TEXTALIGN_RIGHT,"",new GridFilesRendicionValueFormat() ) ;
        $this->addColumn( $column );
        $oUser = CdtSecureUtils::getUserLogged();
        if (CdtSecureUtils::hasPermission ( $oUser, CYT_FUNCTION_AGREGAR_SOLICITUD )) {
            //acciones sobre la lista
            $this->buildAction("add_rendicion_init", "add_rendicion_init", CYT_MSG_RENDICION_TITLE_ADD, "image", "add");
        }

    }

    /**
     * (non-PHPdoc)
     * @see GridModel::getTitle();
     */
    function getTitle() {
        return CYT_MSG_RENDICION_TITLE_LIST;
    }

    /**
     * (non-PHPdoc)
     * @see GridModel::getEntityManager();
     */
    public function getEntityManager() {
        return ManagerFactory::getRendicionManager();
    }

    /**
     * (non-PHPdoc)
     * @see GridModel::getRowActionsModel( $item );
     */
    public function getRowActionsModel($item) {
        //return $this->getDefaultRowActions($item, "evaluacion", CYT_LBL_EVALUACION, true, true, true, false, 500, 750);
        $actions = new ItemCollection();

        $action = $this->buildRowAction( "update_rendicion_init", "update_rendicion_init", CDT_CMP_GRID_MSG_EDIT . " ".CYT_LBL_RENDICION, CDT_UI_IMG_EDIT, "edit") ;
        $actions->addItem( $action );

        $action =  $this->buildDeleteAction( $item, "rendicion", CYT_LBL_RENDICION, $this->getMsgConfirmDelete( $item ), false ) ;
        $actions->addItem( $action );




        $oUser = CdtSecureUtils::getUserLogged();

        if (CdtSecureUtils::hasPermission ( $oUser, CYT_FUNCTION_ADMITIR_SOLICITUD )) {
            $action =  $this->buildRowAction( "admit_rendicion", "admit_rendicion", CYT_LBL_ADMITIR, CDT_UI_IMG_SEARCH, "view", "delete_items('admit_rendicion')", true, $this->getMsgConfirmAdmit()) ;
            $actions->addItem( $action );
        }

        if (CdtSecureUtils::hasPermission ( $oUser, CYT_FUNCTION_RECHAZAR_SOLICITUD )) {
            $action =  $this->buildRowAction( "deny_rendicion_init", "deny_rendicion_init", CYT_LBL_RECHAZAR, CDT_UI_IMG_SEARCH, "view") ;
            $actions->addItem( $action );
        }

        if (CdtSecureUtils::hasPermission ( $oUser, CYT_FUNCTION_ENVIAR_SOLICITUD )) {
            $action =  $this->buildRowAction( "send_rendicion", "send_rendicion", CYT_LBL_ENVIAR, CDT_UI_IMG_SEARCH, "view", "delete_items('send_rendicion')", false, $this->getMsgConfirmSend(CYT_MSG_RENDICION_ENVIAR_PREGUNTA)) ;
            $actions->addItem( $action );
        }


        if (CdtSecureUtils::hasPermission ( $oUser, CYT_FUNCTION_LISTAR_ESTADO )) {

            $action = $this->buildRowAction("list_rendicionesEstado", "list_rendicionesEstado", CYT_MSG_SOLICITUD_ESTADO_TITLE_LIST, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "attach" ) ;
            $actions->addItem( $action );

        }


        return $actions;
    }


    protected function getMsgConfirmSend( $msg ){

        return CdtFormatUtils::quitarEnters($msg);
    }

    protected function getMsgConfirmAdmit(  ){

        $msg = CYT_MSG_SOLICITUD_ADMITIR_PREGUNTA;
        return CdtFormatUtils::quitarEnters($msg);
    }
}
?>