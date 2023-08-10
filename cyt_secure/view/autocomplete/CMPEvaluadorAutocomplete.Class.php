<?php
/**
 * 
 * Componente para autocomplete evaluadores.
 * 
 * @author Marcos
 * @since 15/05/2014
 */

class CMPEvaluadorAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "User";
	}

	protected function getFieldCode(){
		return "oid";
	}

	protected function getFieldSearch(){
		return "ds_name";
	}
	
	protected function getFieldSearchParent(){
		return "facultad.cd_cat";
	}

	protected function getEntityManager(){
		return CYTSecureManagerFactory::getEvaluadorManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "ds_name";
		//$properties[] = "ds_username";
		$this->setPropertiesList($properties);
	}

	protected function getCriteria($text, $parent=null){
		
		$criterio = new CdtSearchCriteria();

		$tUser = CYT_TABLE_CDT_USER;
		
		$fieldParent = $this->getFieldSearchParent();
		if( !empty($parent) && !empty($fieldParent)){
			$opciones = explode(",", $parent);
			switch ($opciones[1]) {
				case '!=':
					$criterio->addFilter( 'facultad.cd_facultad' , $opciones[2], "<>");;
				break;
				case '==':
					$criterio->addFilter( 'facultad.cd_facultad' , $opciones[2], "=");;
				break;
				
			}
			//$criterio->addFilter( $fieldParent , $opciones[0], "=");
		}
		
		$filter = new CdtSimpleExpression( "(($tUser.ds_name like '%$text%') OR ($tUser.ds_username like '%$text%'))");

		$criterio->setExpresion($filter);
		//$criterio->addOrder('universidad.nu_orden','DESC');

		return $criterio;
	}

	protected function getItemDropDown( $entity ){
		$dropdownItem = "<div id='autocomplete_item_desc'><table><tr>";
		//$dropdownItem .= "<td>".  $entity->getDs_name()  . "</td>";
		$dropdownItem .= "<td>".  $entity->getDs_username()  . "</td>";
		$dropdownItem .= "</tr></table></div>";
		return $dropdownItem;
	}

	
	

}
?>