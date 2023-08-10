<?php

/**
 * Formato para renderizar un nivel en las grillas
 *
 * @author Marcos
 * @since 03-01-2014
 *
 */
class GridNivelValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {

		$res = Nivel::getLabel( $value );
		 
		return $res ;
	}

}