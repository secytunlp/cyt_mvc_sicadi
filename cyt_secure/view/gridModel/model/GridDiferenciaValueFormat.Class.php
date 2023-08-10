<?php

/**
 * Formato para renderizar una diferencia en las grillas
 *
 * @author Marcos
 * @since 18-11-2013
 *
 */
class GridDiferenciaValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {

		$res = number_format ( (double) $value , CYT_DECIMALES , CYT_SEPARADOR_DECIMAL, CYT_SEPARADOR_MILES );
		 
		if( $value >= CYT_DIFERENCIA ){
			$res = "<span style='color:red;'>$res</span>";
		}
		
		return $res ;
	}

}