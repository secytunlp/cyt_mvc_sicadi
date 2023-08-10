<?php

/**
 * Representa el layout para el login de Gestión
 *
 * @author Marcos
 * @since 16-10-2013
 */
class LayoutCYTLogin extends LayoutSmile{


	protected function parseStyles($xtpl) {
 		
 		parent::parseStyles($xtpl);
 		
        $xtpl->assign('css', WEB_PATH . "css/smile/login-box.css");
        $xtpl->parse('main.estilo');
    }
    
    protected function getXTemplate($currentMenuGroup='', $menuOptions) {
        return new XTemplate(CYT_UI_SMILE_TEMPLATE_LOGIN);
    }
    
	


}
