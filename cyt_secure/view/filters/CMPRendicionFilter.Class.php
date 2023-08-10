<?php

/**
 * componente filter para rendiciones.
 *
 * @author Marcos
 * @since 04-03-2016
 *
 */
class CMPRendicionFilter extends CMPFilter{

	
	/**
	 * solicitud 
	 * @var string
	 */
	private $solicitud;
	
	/**
	 * estado
	 * @var Estado
	 */
	private $estado;
	
	/**
	 * periodo
	 * @var Facultad
	 */
	private $periodo;
	
	
	
	public function __construct( $id="filter_cambio"){
		parent::__construct($id);
		//$this->setOrderBy('cd_cambio');
		$this->setComponent("CMPRendicionGrid");

		
		
		$this->setSolicitud( new Solicitud() );
		$this->setEstado( new Estado() );
		$this->setPeriodo( new Periodo() );
		
		$findSolicitud = CYTSecureComponentsFactory::getFindSolicitud(new Solicitud(), CYT_LBL_SOLICITUD, "", "cambio_filter_solicitud_oid", "solicitud.oid", "");
		$this->addField( $findSolicitud );
		
		$fieldEstado = FieldBuilder::buildFieldSelect (CYT_LBL_SOLICITUD_ESTADO, "estado.oid", CYTSecureUtils::getEstadosItems(), '', null, null, "--seleccionar--", "estado_oid" );
		$this->addField( $fieldEstado );
		
		$fieldPeriodo = FieldBuilder::buildFieldSelect (CYT_LBL_SOLICITUD_PERIODO, "periodo.oid", CYTSecureUtils::getPeriodosItems(), '', null, null, "--seleccionar--", "periodo_oid" );
		$this->addField( $fieldPeriodo,2 );
		
		$this->fillForm();

	}


	
	
	
	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		
		//filtramos por solicitud.
		$solicitud = $this->getSolicitud();
		if($solicitud!=null && $solicitud->getOid()!=null){
			$criteria->addFilter("solicitud_oid", $solicitud->getOid(), "=" );
		}
		
		$estado = $this->getEstado();
		if($estado!=null && $estado->getOid()!=null){
			$tRendicionEstado = CYTSecureDAOFactory::getRendicionEstadoDAO()->getTableName();
			$criteria->addFilter("$tRendicionEstado.estado_oid", $estado->getOid(), "=" );
		}
		
		$periodo = $this->getPeriodo();
		if($periodo!=null && $periodo->getOid()!=null){
			$tPeriodo = CYTSecureDAOFactory::getPeriodoDAO()->getTableName();
			$criteria->addFilter("$tPeriodo.cd_periodo", $this->getPeriodo()->getOid(), "=" );
			
		}
		
		$oUser = CdtSecureUtils::getUserLogged();
		
		if ($oUser->getCd_usergroup()==CYT_CD_GROUP_SOLICITANTE) {
            $separarCUIL = explode('-',trim($oUser->getDs_username()));
            $oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('nu_documento', $separarCUIL[1], '=');
			
			$oDocenteManager =  CYTSecureManagerFactory::getDocenteManager();
			$oDocente = $oDocenteManager->getEntity($oCriteria);
			$tSolicitud = DAOFactory::getSolicitudDAO()->getTableName();
            $criteria->addFilter("$tSolicitud.cd_docente", $oDocente->getOid(), "=");
        }
		
		$criteria->addNull('fechaHasta');
		
		
	}




	


	

	public function getSolicitud()
	{
	    return $this->solicitud;
	}

	public function setSolicitud($solicitud)
	{
	    $this->solicitud = $solicitud;
	}

	public function getPeriodo()
	{
	    return $this->periodo;
	}

	public function setPeriodo($periodo)
	{
	    $this->periodo = $periodo;
	}

	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}
}