<?php

/**
 * componente filter para lugares de trabajo.
 *
 * @author Marcos
 * @since 02-11-2013
 *
 */
class CMPLugarTrabajoFilter extends CMPFilter{

	
	private $ds_unidad;
	private $ds_sigla;
	private $padre;
	
	
	
	public function __construct( $id="filter_lugaresTrabajo"){

		parent::__construct($id);


		$this->setComponent("CMPLugarTrabajoGrid");
		
		//formamos el form de búsqueda.
		$fieldDs_unidad = FieldBuilder::buildFieldText ( CYT_LBL_LUGAR_TRABAJO_NOMBRE, "ds_unidad"  );
		
		$this->addField( $fieldDs_unidad );
		
		$fieldDs_sigla = FieldBuilder::buildFieldText ( CYT_LBL_LUGAR_TRABAJO_SIGLA, "ds_sigla"  );
		
		$this->addField( $fieldDs_sigla );
		

		/*$this->setPadre( new LugarTrabajo() );
		
		
		
		$findPadre = CYTComponentsFactory::getFindLugarTrabajo(new LugarTrabajo(), CYT_LBL_LUGAR_TRABAJO_PADRE, "", "lugarTrabajo_filter_lugarTrabajo_oid", "padre.oid", "lugarTrabajo_filter_lugarTrabajo_change");
		$findPadre->getInput()->setInputSize(5,70);
		$this->addField( $findPadre);*/
		
		$fieldPadre = FieldBuilder::buildFieldText ( CYT_LBL_LUGAR_TRABAJO_PADRE, "padre"  );
		
		$this->addField( $fieldPadre );		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$ds_unidad = $this->getDs_unidad();

		if(!empty($ds_unidad)){
			$criteria->addFilter("ds_unidad", $ds_unidad, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		$ds_sigla = $this->getDs_sigla();

		if(!empty($ds_sigla)){
			$criteria->addFilter("ds_sigla", $ds_sigla, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		//filtramos por tipo de unidad.
		$padre = $this->getPadre();
		if(!empty($padre)){
			$filter = new CdtSimpleExpression("(PADRE.ds_unidad LIKE '%".$padre."%' OR PADRE.ds_sigla LIKE '%".$padre."%')");
			$criteria->setExpresion($filter);
			
			
		}


		//$criteria->addOrder("ds_unidad");
		
	}




	

	

	

	public function getDs_unidad()
	{
	    return $this->ds_unidad;
	}

	public function setDs_unidad($ds_unidad)
	{
	    $this->ds_unidad = $ds_unidad;
	}

	public function getDs_sigla()
	{
	    return $this->ds_sigla;
	}

	public function setDs_sigla($ds_sigla)
	{
	    $this->ds_sigla = $ds_sigla;
	}

	public function getPadre()
	{
	    return $this->padre;
	}

	public function setPadre($padre)
	{
	    $this->padre = $padre;
	}
	
	public function getOrderBy()
	{
	    return "cd_unidad";
	}
}