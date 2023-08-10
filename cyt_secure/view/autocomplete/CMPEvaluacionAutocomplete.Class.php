<?php
/**
 * 
 * Componente para autocomplete evaluaciones.
 * 
 * @author Marcos
 * @since 03/12/2013
 */

class CMPEvaluacionAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "Evaluacion";
	}

	protected function getFieldCode(){
		return "cd_evaluacion";
	}

	protected function getFieldSearch(){
		return "ds_username";
	}

	protected function getEntityManager(){
		return ManagerFactory::getEvaluacionManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "ds_username";
		//$properties[] = "ds_nombre";
		$this->setPropertiesList($properties);
	}

	protected function getCriteria($text, $parent=null){
		
		$criterio = new CdtSearchCriteria();

		$tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
		
		
		$filter = new CdtSimpleExpression( "($tUser.ds_username like '$text%')");

		$criterio->setExpresion($filter);

		return $criterio;
	}

	protected function getItemDropDown( $entity ){
		$dropdownItem = "<div id='autocomplete_item_desc'><table><tr>";
		$dropdownItem .= "<td>".  $entity->getUser()->getDs_username()  . "</td>";
		//$dropdownItem .= "<td>".  $entity->getUser()->getDs_nombre()  . "</td>";
		$dropdownItem .= "</tr></table></div>";
		return $dropdownItem;
	}


}
?>