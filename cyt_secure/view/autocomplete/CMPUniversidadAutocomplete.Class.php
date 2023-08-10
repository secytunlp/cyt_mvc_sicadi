<?php
/**
 * 
 * Componente para autocomplete universidades.
 * 
 * @author Marcos
 * @since 03/01/2014
 */

class CMPUniversidadAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "Universidad";
	}

	protected function getFieldCode(){
		return "oid";
	}

	protected function getFieldSearch(){
		return "ds_universidad";
	}

	protected function getEntityManager(){
		return CYTSecureManagerFactory::getUniversidadManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "ds_universidad";
		//$properties[] = "ds_universidad";
		$this->setPropertiesList($properties);
	}

	protected function getCriteria($text, $parent=null){
		
		$criterio = new CdtSearchCriteria();

		$tUniversidad = CYTSecureDAOFactory::getUniversidadDAO()->getTableName();
		
		
		$filter = new CdtSimpleExpression( "($tUniversidad.ds_universidad like '%$text%')");

		$criterio->setExpresion($filter);
		//$criterio->addOrder('universidad.nu_orden','DESC');

		return $criterio;
	}

	protected function getItemDropDown( $entity ){
		$dropdownItem = "<div id='autocomplete_item_desc'><table><tr>";
		//$dropdownItem .= "<td>".  $entity->getDs_universidad()  . "</td>";
		//$dropdownItem .= "<td>".  $entity->getUniversidad()->getDs_universidad()  . "</td>";
		$dropdownItem .= "</tr></table></div>";
		return $dropdownItem;
	}


}
?>