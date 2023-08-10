<?php

/**
 * componente filter para títulos.
 *
 * @author Marcos
 * @since 03-01-2014
 *
 */
class CMPTituloFilter extends CMPFilter{

	
	private $ds_titulo;
	private $universidad;
	//private $nu_nivel;
	
	
	
	public function __construct( $id="filter_titulos"){

		parent::__construct($id);
		
		$this->setOrderBy('cd_titulo');

		$this->setComponent("CMPTituloGrid");
		
		$this->setUniversidad( new Universidad() );
		
		//formamos el form de búsqueda.
		$field = FieldBuilder::buildFieldText ( CYT_LBL_TITULO_NOMBRE, "ds_titulo"  );
		$this->addField( $field );
		
		$find = CYTSecureComponentsFactory::getFindUniversidad(new Universidad(), CYT_LBL_UNIVERSIDAD, "", "titulo_filter_universidad_oid", "universidad.oid", "titulo_filter_universidad_change");
		$this->addField( $find);
		
		/*$field = FieldBuilder::buildFieldSelect (CYT_LBL_NIVEL, "nu_nivel", Nivel::getItems(), "", null, null, "--Seleccionar--" );
		$this->addField( $field );*/
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$ds_titulo = $this->getDs_titulo();

		if(!empty($ds_titulo)){
			$criteria->addFilter("ds_titulo", $ds_titulo, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		$universidad = $this->getUniversidad();
		if($universidad!=null && $universidad->getOid()!=null){
			$criteria->addFilter("cd_universidad", $universidad->getOid(), "=" );
		}
		
		
		
			
		$criteria->addFilter("nu_nivel", CYT_CD_TITULO_GRADO, "=" );
		
		
	}




	

	

	

	

	public function getDs_titulo()
	{
	    return $this->ds_titulo;
	}

	public function setDs_titulo($ds_titulo)
	{
	    $this->ds_titulo = $ds_titulo;
	}

	public function getUniversidad()
	{
	    return $this->universidad;
	}

	public function setUniversidad($universidad)
	{
	    $this->universidad = $universidad;
	}

	

	
}