<?php

/**
 * componente filter para evaluadores.
 *
 * @author Marcos
 * @since 16-05-2014
 *
 */
class CMPEvaluadorFilter extends CMPFilter{

	
	
	private $user;
	
	private $facultad;
	
	
	public function __construct( $id="filter_lugaresTrabajo"){

		parent::__construct($id);

		$this->setOrderBy('ds_name');
		
		$this->setOrderType('ASC');
		
		$this->setComponent("CMPEvaluadorGrid");
		
		$this->setFacultad( new Facultad() );
		$this->setUser( new User() );
		
		//formamos el form de búsqueda.
		$findEvaluador = CYTSecureComponentsFactory::getFindEvaluador(new User(), CYT_LBL_EVALUADOR, "", "evaluacion_filter_evaluador_oid", "user.oid", "");
		$this->addField( $findEvaluador );
		
		$fieldFacultad = FieldBuilder::buildFieldSelect (CYT_LBL_SOLICITUD_FACULTAD, "facultad.oid", CYTSecureUtils::getFacultadesItems(), '', null, null, "--seleccionar--", "facultad_oid" );
		//$fieldFacultad->getInput()->addProperty('style','width:250px;');
		$this->addField( $fieldFacultad );
		
		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$facultad = $this->getFacultad();
		if($facultad!=null && $facultad->getOid()!=null){
			$criteria->addFilter("cd_facultad", $facultad->getOid(), "=" );
		}

		$user = $this->getUser();
		if($user!=null && $user->getOid()!=null){
			$criteria->addFilter("user_oid", $user->getOid(), "=" );
		}
		//$criteria->addOrder("ds_unidad");
		
	}
	
	public function getUser()
	{
	    return $this->user;
	}

	public function setUser($user)
	{
	    $this->user = $user;
	}

	public function getFacultad()
	{
	    return $this->facultad;
	}

	public function setFacultad($facultad)
	{
	    $this->facultad = $facultad;
	}
}