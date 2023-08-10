<?php
/**
 * 
 * Componente para autocomplete solicitudes.
 * 
 * @author Marcos
 * @since 08/03/2016
 */

class CMPRendicionAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "Rendicion";
	}

	protected function getFieldCode(){
		return "oid";
	}

	protected function getFieldSearch(){
		return "ds_investigador";
	}

	protected function getEntityManager(){
		return ManagerFactory::getRendicionManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "ds_investigador";
		$this->setPropertiesList($properties);
	}

	protected function getCriteria($text, $parent=null){
		
		$criterio = new CdtSearchCriteria();

		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		
		
		$filter = new CdtSimpleExpression( "($tDocente.ds_apellido like '$text%' OR $tDocente.ds_nombre like '$text%')");

		$criterio->setExpresion($filter);

		return $criterio;
	}

	protected function getItemDropDown( $entity ){
		$dropdownItem = "<div id='autocomplete_item_desc'><table><tr>";
		$dropdownItem .= "<td>".  $entity->getDs_investigador()  . "</td>";
		
		$dropdownItem .= "</tr></table></div>";
		return $dropdownItem;
	}


}
?>