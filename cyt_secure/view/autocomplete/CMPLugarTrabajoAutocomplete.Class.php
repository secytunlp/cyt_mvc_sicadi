<?php
/**
 * 
 * Componente para autocomplete lugares de trabajo.
 * 
 * @author Marcos
 * @since 30/10/2013
 */

class CMPLugarTrabajoAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "LugarTrabajo";
	}

	protected function getFieldCode(){
		return "oid";
	}

	protected function getFieldSearch(){
		return "ds_unidad,ds_sigla";
	}

	protected function getEntityManager(){
		return CYTSecureManagerFactory::getLugarTrabajoManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "ds_unidad";
		$properties[] = "ds_sigla";
		$this->setPropertiesList($properties);
	}

	protected function getCriteria($text, $parent=null){
		
		$criterio = new CdtSearchCriteria();

		$tLugarTrabajo = CYTSecureDAOFactory::getLugarTrabajoDAO()->getTableName();
		
		
		$filter = new CdtSimpleExpression( "($tLugarTrabajo.ds_unidad like '%$text%') OR ($tLugarTrabajo.ds_sigla like '%$text%')");

		$criterio->setExpresion($filter);

		return $criterio;
	}

	protected function getItemDropDown( $entity ){
		$dropdownItem = "<div id='autocomplete_item_desc'><table><tr>";
		$dropdownItem .= "<td>".  $entity->getDs_unidad()  . "</td>";
		$dropdownItem .= "<td>".  $entity->getDs_sigla()  . "</td>";
		$dropdownItem .= "</tr></table></div>";
		return $dropdownItem;
	}


}
?>