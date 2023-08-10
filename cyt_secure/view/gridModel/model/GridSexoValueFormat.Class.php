<?php

/**
 * Formato para renderizar un sexo en las grillas
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 27-05-2013
 *
 */
class GridSexoValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {

		$res = Sexo::getLabel( $value );
		 
		return $res ;
	}

}