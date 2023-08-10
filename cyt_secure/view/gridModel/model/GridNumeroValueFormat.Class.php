<?php

/**
 * Formato para renderizar un numero en las grillas
 *
 * @author Marcos
 * @since 18-11-2013
 *
 */
class GridNumeroValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {

		$res = number_format (  (double) $value , CYT_DECIMALES , CYT_SEPARADOR_DECIMAL, CYT_SEPARADOR_MILES );
		 
		return $res ;
	}

}