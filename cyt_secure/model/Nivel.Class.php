<?php


/**
 * Nivel 
 *  
 * @author Marcos
 * @since 29-07-2013
 */

class Nivel {
    
    const GRADO = 1;
    const POSGRADO = 2;

    
    private static $items = array(  
    								   Nivel::GRADO=> CYT_LBL_NIVEL_GRADO,
    								   Nivel::POSGRADO=> CYT_LBL_NIVEL_POSGRADO,
    								   );
    
	public static function getItems(){
		return self::$items;
	}
	
	public static function getLabel($value){
		return self::$items[$value];
	}
					   
}
?>
