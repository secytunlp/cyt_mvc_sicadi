<?php

/**
 * Formato para renderizar un monto en las grillas
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 12-03-2013
 *
 */
class GridMontoValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {

		$res = CYTSecureUtils::formatMontoToView( $value );
		 
		return $res ;
	}

}