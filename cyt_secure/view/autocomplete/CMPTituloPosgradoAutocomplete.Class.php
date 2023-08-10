<?php
/**
 * 
 * Componente para autocomplete títulos de posgrado.
 * 
 * @author Marcos
 * @since 27/06/2014
 */

class CMPTituloPosgradoAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "Titulo";
	}

	protected function getFieldCode(){
		return "oid";
	}

	protected function getFieldSearch(){
		return "ds_titulo";
	}

	protected function getEntityManager(){
		return CYTSecureManagerFactory::getTituloManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "ds_titulo";
		//$properties[] = "ds_universidad";
		$this->setPropertiesList($properties);
	}

	protected function getCriteria($text, $parent=null){
		
		$criterio = new CdtSearchCriteria();

		$tTitulo = CYTSecureDAOFactory::getTituloDAO()->getTableName();
		
		
		$filter = new CdtSimpleExpression( "(nu_nivel = ".CYT_CD_TITULO_POSGRADO.") AND ($tTitulo.ds_titulo like '%$text%')");

		$criterio->setExpresion($filter);
		$criterio->addOrder('universidad.nu_orden','DESC');

		return $criterio;
	}

	protected function getItemDropDown( $entity ){
		$dropdownItem = "<div id='autocomplete_item_desc'><table><tr>";
		//$dropdownItem .= "<td>".  $entity->getDs_titulo()  . "</td>";
		$dropdownItem .= "<td>".  $entity->getUniversidad()->getDs_universidad()  . "</td>";
		$dropdownItem .= "</tr></table></div>";
		return $dropdownItem;
	}


}
?>