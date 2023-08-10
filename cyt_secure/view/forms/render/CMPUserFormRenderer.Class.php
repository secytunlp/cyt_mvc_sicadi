<?php

/**
 * Implementación para renderizar un formulario de user 
 *
 * @author Marcos
 * @since 11-111-2013
 *
 */
class CMPUserFormRenderer extends DefaultFormRenderer {

	 protected function getXTemplate() {
    	return new XTemplate( CDT_CMP_TEMPLATE_FORM );
    }
	
	
	protected function renderFieldset(CMPForm $form, XTemplate $xtpl){

		
		foreach ($form->getFieldsets() as $fieldset) {	
			//legend
			$legend = $fieldset->getLegend();
			if(!empty($legend)){
				$xtpl->assign("value", $legend);
				$xtpl->parse("main.fieldset.legend");
			}
			
			
			
			
			
			foreach ($fieldset->getFieldsColumns() as $column => $fields) {
				
				foreach ($fields as $formField) {
					
					$input = $formField->getInput();
					$label = $formField->getLabel();
					
					$this->renderLabel( $label, $input, $xtpl );
					$this->renderInput( $input, $xtpl );
					$xtpl->assign("minWidth", $formField->getMinWidth());
					
					if( $input->getIsVisible() ){
						$xtpl->assign("display", 'block');
						
					}
					else $xtpl->assign("display", 'none');
					
					$xtpl->parse("main.fieldset.column.field");
				}
				$xtpl->parse("main.fieldset.column");
			}
			
			
			$xtpl->parse("main.fieldset");
		}
		
	}
	
	
	protected function renderCustom(CMPForm $form, XTemplate $xtpl){
		
		
		//renderizamos las relaciones con sus formularios de alta
		
		$xtpl_relaciones = new XTemplate( CYT_TEMPLATE_USER_EDIT_USER_RELACIONES );
		
		
		//usergroups
		$oUserUserGroupsHTML = $this->getHTMLUsergroups($form);
		$xtpl_relaciones->assign( "usergroups_tab", CYT_SECURE_LBL_USER_USERGROUPS );
		$xtpl_relaciones->assign( "usergroups", $oUserUserGroupsHTML );
		
		
		
		$xtpl_relaciones->parse("main");
		
		
		
		$xtpl->assign( "customHTML", $xtpl_relaciones->text("main"));
	}	
	
	

	
	/**
	 * renderizamos en el formulario de user los usergroups que tiene asignados.
	 * También agregamos un formulario para asignar nuevos usergroups.
	 *
	 * @param CMPForm $form
	 * @param XTemplate $xtpl
	 */
	protected function getHTMLUsergroups(CMPForm $form){
	
		$xtpl_usergroups = new XTemplate( CYT_TEMPLATE_USER_EDIT_USERGROUPS );
	
		//mostrar los usergroups actuales.
		$xtpl_usergroups->assign('usergroups_title', CYT_MSG_USER_USERGROUPS );
	
		//TODO parsear labels.
		$this->parseUsergroupsLabels($xtpl_usergroups);
		 
		//recuperamos los usergroups de la user desde la sesión.
		$manager = new UserUserGroupSessionManager();
		$oUserUserGroups = $manager->getEntities( new CdtSearchCriteria() );
		 
		//parseamos los usergroups.
		$this->parseUsergroups($oUserUserGroups, $form, $xtpl_usergroups);
		 
		//formulario para agregar un nuevo usergroup a la user.
		if( $form->getIsEditable() ){
			$oUserUserGroupForm = new CMPUserUserGroupForm();
			$xtpl_usergroups->assign('formulario', $oUserUserGroupForm->show() );
		}
		$xtpl_usergroups->parse("main");
	
		return $xtpl_usergroups->text("main");
	
	}
	
	/**
	 * armamos un array con los datos del usergroup.
	 * @param UserUserGroup $oUserUserGroup
	 */
	public function buildArrayUsergroup(UserUserGroup $oUserUserGroup){
	
		$array_usergroup = array();
	
		$array_usergroup["item_oid"] = $oUserUserGroup->getUserGroup()->getCd_usergroup();
		
		$manager =  new CdtUserGroupManager();
		$oUserGroup = $manager->getCdtUserGroupById($oUserUserGroup->getUserGroup()->getCd_usergroup());
		
		
		$array_usergroup["usergroup"] = $oUserGroup->getDs_usergroup();
	
		return $array_usergroup;
	
	}
	/**
	 * columnas para el listado de usergroups
	 * @return multitype:string
	 */
	public function getUsergroupColumns(){
		return array( "usergroup");
	}
	
	/**
	 * labels para el listado de usergroups
	 * @return multitype:string
	 */
	public function getUsergroupColumnsLabels(){
		return array( CDT_SECURE_LBL_CDTUSERGROUP);
	}
	
	/**
	 * aligns para las columnas del listado de usergroups.
	 * @return multitype:string
	 */
	public function getUsergroupColumnsAlign(){
		return array( "left");
	}
		
	/**
	 * parseamos los labels para el listado de usergroups.
	 * @param XTemplate $xtpl_usergroups
	 */
	protected function parseUsergroupsLabels(XTemplate $xtpl_usergroups){
	
		$aligns = $this->getUsergroupColumnsAlign();
	
		$index=0;
		foreach ( $this->getUsergroupColumnsLabels() as $label) {
	
			$xtpl_usergroups->assign('usergroup_label', $label );
			$xtpl_usergroups->assign('align', $aligns[$index]);
			$xtpl_usergroups->parse('main.usergroup_th');
	
			$index++;
		}
	}
	
	
	/**
	 * parseamos el listado de usergroups.
	 * @param ItemCollection $oUserUserGroups
	 * @param CMPForm $form
	 * @param XTemplate $xtpl_usergroups
	 */
	protected function parseUsergroups(ItemCollection $oUserUserGroups=null, CMPForm $form, XTemplate $xtpl_usergroups){
	
		if( $oUserUserGroups!= null ){
			foreach ($oUserUserGroups as $oUserUserGroup) {
				 
				$this->parseUsergroup($oUserUserGroup, $xtpl_usergroups);
				 
				if( $form->getIsEditable() ){
					$xtpl_usergroups->assign('item_oid', $oUserUserGroup->getUserGroup()->getCd_usergroup());
					$xtpl_usergroups->parse("main.usergroup.editar_usergroup");
				}
				 
				$xtpl_usergroups->parse("main.usergroup");
			}
		}
	}
	
	/**
	 * parseamos un usergroup.
	 * @param UserUserGroup $oUserUserGroup
	 * @param XTemplate $xtpl_usergroups
	 */
	protected function parseUsergroup(UserUserGroup $oUserUserGroup, XTemplate $xtpl_usergroups){
	
		$columns = $this->getUsergroupColumns();
		$aligns = $this->getUsergroupColumnsAlign();
		$array_usergroup = $this->buildArrayUsergroup($oUserUserGroup);
	
		$index=0;
		foreach ($columns as $column) {
	
			$xtpl_usergroups->assign('data', $array_usergroup[$column] );
			$xtpl_usergroups->assign('align', $aligns[$index]);
			$xtpl_usergroups->parse('main.usergroup.usergroup_data');
	
			$index++;
		}
	
	}

	
	
	
	
	
	
	
	
}