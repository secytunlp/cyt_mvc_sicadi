<?php

/**
 * componente filter para universidades.
 *
 * @author Marcos
 * @since 03-01-2014
 *
 */
class CMPUniversidadFilter extends CMPFilter{

	
	private $ds_universidad;
	
	
	
	
	public function __construct( $id="filter_universidads"){

		parent::__construct($id);


		$this->setComponent("CMPUniversidadGrid");
		
		
		
		//formamos el form de búsqueda.
		$field = FieldBuilder::buildFieldText ( CYT_LBL_UNIVERSIDAD_NOMBRE, "ds_universidad"  );
		$this->addField( $field );
		
		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$ds_universidad = $this->getDs_universidad();

		if(!empty($ds_universidad)){
			$criteria->addFilter("ds_universidad", $ds_universidad, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		
		
	}




	

	
	public function getOrderBy()
	{
	    return "cd_universidad";
	}
	

	


	public function getDs_universidad()
	{
	    return $this->ds_universidad;
	}

	public function setDs_universidad($ds_universidad)
	{
	    $this->ds_universidad = $ds_universidad;
	}
}