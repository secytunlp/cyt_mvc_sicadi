<?php

/**
 * componente filter para evaluaciones.
 *
 * @author Marcos
 * @since 02-12-2013
 *
 */
class CMPEvaluacionFilter extends CMPFilter{

	/**
	 * evaluador 
	 * @var string
	 */
	private $evaluador;
	
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
	
	/**
	 * facultad
	 * @var Facultad
	 */
	private $facultad;
	
	/**
	 * predefinido
	 * @var predefinido
	 */
	private $predefinido;
	
	
	public function __construct( $id="filter_evaluacion"){
		parent::__construct($id);
		$this->setOrderBy('cd_solicitud');
		$this->setComponent("CMPEvaluacionGrid");

		$this->setFacultad( new Facultad() );
		
		$this->setSolicitud( new Solicitud() );
		$this->setPeriodo( new Periodo() );
		$this->setEstado( new Estado() );
		$this->setPredefinido( new PredefinidoEvaluacion() );
		
		$fieldCodigo = FieldBuilder::buildFieldText ( CYT_LBL_EVALUADOR, "evaluador"  );
		$this->addField( $fieldCodigo );
		
		
		$fieldFacultad = FieldBuilder::buildFieldSelect (CYT_LBL_SOLICITUD_FACULTAD, "facultad.oid", CYTSecureUtils::getFacultadesItems(), '', null, null, "--seleccionar--", "facultad_oid" );
		$fieldFacultad->getInput()->addProperty('style','width:250px;');
		$this->addField( $fieldFacultad );
		
		$findSolicitud = CYTSecureComponentsFactory::getFindSolicitud(new Solicitud(), CYT_LBL_SOLICITUD, "", "evaluacion_filter_solicitud_oid", "solicitud.oid", "");
		$this->addField( $findSolicitud );
		
		
		
		$fieldEstado = FieldBuilder::buildFieldSelect (CYT_LBL_SOLICITUD_ESTADO, "estado.oid", CYTSecureUtils::getEstadosEvaluacionItems(), '', null, null, "--seleccionar--", "estado_oid" );
		$this->addField( $fieldEstado,2 );
		
		$fieldPeriodo = FieldBuilder::buildFieldSelect (CYT_LBL_SOLICITUD_PERIODO, "periodo.oid", CYTSecureUtils::getPeriodosItems(), '', null, null, "--seleccionar--", "periodo_oid" );
		$this->addField( $fieldPeriodo,2 );
		
		$fieldPredefinido = FieldBuilder::buildFieldSelect (CYT_LBL_PREDEFINIDO, "predefinido.oid", CYTSecureUtils::getEvaluacionPredefinidosItems(), '', null, null, "--seleccionar--", "predefinido" );
		$this->addField( $fieldPredefinido,2 );
		
		
		$this->fillForm();

	}


	
	
	
	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$evaluador = $this->getEvaluador();

		if(!empty($evaluador)){
			$tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
			$filter = new CdtSimpleExpression( "(($tUser.ds_name like '%$evaluador%'))");

			$criteria->setExpresion($filter);
		}
		
		//filtramos por solicitud.
		$solicitud = $this->getSolicitud();
		if($solicitud!=null && $solicitud->getOid()!=null){
			$criteria->addFilter("cd_solicitud", $solicitud->getOid(), "=" );
		}
		
		$facultad = $this->getFacultad();
		if($facultad!=null && $facultad->getOid()!=null){
			$tFacultad = CYTSecureDAOFactory::getFacultadDAO()->getTableName();
			$criteria->addFilter("$tFacultad.cd_facultad", $facultad->getOid(), "=" );
		}
		
		
		$estado = $this->getEstado();
		if($estado!=null && $estado->getOid()!=null){
			$tEvaluacionEstado = CYTSecureDAOFactory::getEvaluacionEstadoDAO()->getTableName();
			$criteria->addFilter("$tEvaluacionEstado.estado_oid", $estado->getOid(), "=" );
		}
		
		
		$periodo = $this->getPeriodo();
		if($periodo!=null && $periodo->getOid()!=null){
			$tSolicitud = DAOFactory::getSolicitudDAO()->getTableName();
			$criteria->addFilter("$tSolicitud.cd_periodo", $this->getPeriodo()->getOid(), "=" );
			
		}
		
		$predefinido = $this->getPredefinido();
		if($predefinido!=null && $predefinido->getOid()!=null){
			$tEvaluacionEstado = CYTSecureDAOFactory::getEvaluacionEstadoDAO()->getTableName();
			$tSolicitudEstado = CYTSecureDAOFactory::getSolicitudEstadoDAO()->getTableName();
			$tSolicitud = DAOFactory::getSolicitudDAO()->getTableName();
			$tEvaluacion = CYTSecureDAOFactory::getEvaluacionDAO()->getTableName();
			switch ($predefinido->getOid()) {
				case 1:
					
					$filter = new CdtSimpleExpression( " EXISTS (SELECT S2.cd_solicitud 
FROM ".$tSolicitud." S2 
INNER JOIN ".$tSolicitudEstado." ON S2.cd_solicitud = ".$tSolicitudEstado.".solicitud_oid
WHERE   ".$tSolicitudEstado.".estado_oid = 3 AND ".$tSolicitudEstado.".fechaHasta IS NULL AND ".$tSolicitud.".cd_solicitud = S2.cd_solicitud)");

					$criteria->setExpresion($filter);
					//$criteria->addFilter("$tEstado.estado_oid", 2, "=" );
				break;
				case 2:
					$filter = new CdtSimpleExpression( " EXISTS (SELECT S1.cd_solicitud
FROM ".$tSolicitud." S1
INNER JOIN ".$tEvaluacion." E1 ON S1.cd_solicitud = E1.cd_solicitud

INNER JOIN ".$tEvaluacionEstado." EE1 ON E1.cd_evaluacion = EE1.evaluacion_oid
INNER JOIN ".$tSolicitudEstado." SE1 ON S1.cd_solicitud = SE1.solicitud_oid
WHERE S1.cd_solicitud = ".$tSolicitud.".cd_solicitud AND EE1.fechaHasta is NULL AND (EE1.estado_oid = 2 OR EE1.estado_oid = 6 OR EE1.estado_oid = 8) AND SE1.fechaHasta is NULL 
AND (SE1.estado_oid = 6 OR SE1.estado_oid = 8) AND SE1.fechaHasta is NULL
GROUP BY S1.cd_solicitud
HAVING (count(S1.cd_solicitud)<2))");

					$criteria->setExpresion($filter);
				break;
				case 3:
					$filter = new CdtSimpleExpression( " EXISTS (SELECT S1.cd_solicitud
FROM ".$tSolicitud." S1
INNER JOIN ".$tEvaluacion." E1 ON S1.cd_solicitud = E1.cd_solicitud

INNER JOIN ".$tEvaluacionEstado." EE1 ON E1.cd_evaluacion = EE1.evaluacion_oid
INNER JOIN ".$tSolicitudEstado." SE1 ON S1.cd_solicitud = SE1.solicitud_oid
WHERE S1.cd_solicitud = ".$tSolicitud.".cd_solicitud AND EE1.fechaHasta is NULL AND (EE1.estado_oid = 8) AND SE1.fechaHasta is NULL 
AND (SE1.estado_oid = 6) AND SE1.fechaHasta is NULL
GROUP BY S1.cd_solicitud
HAVING (count(S1.cd_solicitud)>1))");

					$criteria->setExpresion($filter);
				break;
				default:
					;
				break;
			}
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

	public function getEvaluador()
	{
	    return $this->evaluador;
	}

	public function setEvaluador($evaluador)
	{
	    $this->evaluador = $evaluador;
	}

	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}

	public function getPeriodo()
	{
	    return $this->periodo;
	}

	public function setPeriodo($periodo)
	{
	    $this->periodo = $periodo;
	}
	
	public function getFacultad()
	{
	    return $this->facultad;
	}

	public function setFacultad($facultad)
	{
	    $this->facultad = $facultad;
	}
	
	public function getPredefinido()
	{
	    return $this->predefinido;
	}

	public function setPredefinido($predefinido)
	{
	    $this->predefinido = $predefinido;
	}
	
}