<?php

/**
 * Utilidades para el sistema.
 *
 * @author Marcos
 * @since 09-11-2013
 */
class CYTSecureUtils {
	
	
	public static function login( User $oUser ){
		
		CdtUtils::cleanRequestError();
		
		/*
		$minutes = 30;
		if(defined("CDT_SECURE_SESION_LIFETIME"))
			$minutes = CDT_SECURE_SESION_LIFETIME;
			
		$mytimeout = $minutes * 60; // minutes * 60
		session_set_cookie_params($mytimeout);
		session_cache_expire($mytimeout / 60);
		session_start ();
		*/
		
		$_SESSION [APP_NAME]["ds_username"] = $oUser->getDs_username ();
		$_SESSION [APP_NAME]["ds_name"] = $oUser->getDs_name();
		$_SESSION [APP_NAME]["cd_user"] = $oUser->getOid ();
		$_SESSION [APP_NAME]["cd_usergroup"] = $oUser->getUserGroup()->getCd_usergroup(); 
		//dejamos en sessi�n las funciones que puede realizar el usuario (permisos).
		$_SESSION [APP_NAME]["functions"] = serialize( $oUser->getFunctions() ) ;
		
		
	}	

	/**
	 * se formateo un monto a visualizar
	 * @param $monto
	 * @return string
	 */
	public static function formatMontoToView( $monto ){

		if( empty($monto) )
		$monto = 0;

		$res = $monto;
		//si es negativo, le quito el signo para agregarlo antes de la moneda.
		if( $monto < 0 ){
			$res = $res * (-1);
		}
			
		$res = number_format ( $res , CYT_DECIMALES , CYT_SEPARADOR_DECIMAL, CYT_SEPARADOR_MILES );

		if( CYT_MONEDA_POSICION_IZQ ){
			$res = CYT_MONEDA_SIMBOLO . $res;
				
		}else
		$res = $res. CYT_MONEDA_SIMBOLO ;

		//si es negativo lo mostramos rojo y le agrego el signo.
		if( $monto < 0 ){
			$res = "<span style='color:red;'>- $res</span>";
		}

		return $res;
	}


	//Formato fecha yyyy-mm-dd
	public static function differenceBetweenDates($fecha_fin, $fecha_Ini, $formato_salida = "d") {
		$f0 = strtotime($fecha_fin);
		$f1 = strtotime($fecha_Ini);
		if ($f0 < $f1) {
			$tmp = $f1;
			$f1 = $f0;
			$f0 = $tmp;
		}
		return date($formato_salida, $f0 - $f1);
	}


	public static function getFilterOptionItems($oManager, $valueProperty, $labelProperty, $ds_field="", $labelFilter="", $valueFilter="", $order="", $criteria="") {

		$oCriteria = ($criteria)?$criteria:new CdtSearchCriteria();
		$order = ($order)?$order:$labelProperty;
		$oCriteria->addOrder($order, "ASC");
		if ($labelFilter!="") {
			$oCriteria->addFilter($labelFilter, $valueFilter, '=');
		}
		$entities = $oManager->getEntities($oCriteria);
		
		$items = array();
		foreach ($entities as $oEntity) {
			$value = CdtReflectionUtils::doGetter($oEntity, $valueProperty);
			if ($ds_field!="") {
				$labelProperty = $ds_field;
			}
			$label = CdtReflectionUtils::doGetter($oEntity, $labelProperty);
			$items[$value] = $label;
		}
		return $items;
	}
	
	public static function getEvaluacionPredefinidosItems() {

		/*$items = array();
		
			$items[1] = 'Faltan evaluadores';
		
		return $items;*/
		return self::getFilterOptionItems( CYTSecureManagerFactory::getPredefinidoEvaluacionManager(), "oid", "ds_predefinido","","","","cd_predefinido");
	}

	public static function getUserGroupItems() {

		return self::getFilterOptionItems(new CdtUserGroupManager(), "cd_usergroup", "ds_usergroup");
	}
	
	public static function getUserUserGroupItems($cd_user=null) {
		if ($cd_user) {
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter("cd_user", $cd_user, "=" );
		}
				
		return self::getFilterOptionItems( ManagerFactory::getUserUserGroupManager(), "cd_usergroup", "ds_usergroup","","","","orden",$oCriteria);

	}


	public static function getYesNoItems() {
		return array("false" => "No", "true" => "Si");
	}


	public static function formatDateToView($value) {
		if (!empty($value)&&($value!='0000-00-00')) {
			$dt = date(CYT_DATE_FORMAT, strtotime($value));
		}else
		$dt = "";
		return $dt;
	}

	public static function formatDateToPersist($value) {
		$value = str_replace('/', '-', $value);
		if (!empty($value))
		$dt = date("Y-m-d H:i:s", strtotime($value));
		else
		$dt = "";
		return $dt;
	}

	public static function formatDateTimeToView($value) {

		if (!empty($value)) {
			$dt = date(CYT_DATETIME_FORMAT, strtotime($value));
		}else
		$dt = "";

		return $dt;
	}

	public static function formatDateTimeToPersist($value) {

		if (!empty($value))
		$dt = date("Y-m-d H:i:s", strtotime($value));
		else
		$dt = "";

		return $dt;
	}

	public static function addDays($date, $dateFormat, $days){

		$newDate = strtotime ( "+$days day" , strtotime ( $date ) ) ;
		$newDate = date ( $dateFormat , $newDate );

		return $newDate;
	}

	public static function substractDays($date, $dateFormat, $days){

		$newDate = strtotime ( "-$days day" , strtotime ( $date ) ) ;
		$newDate = date ( $dateFormat , $newDate );

		return $newDate;
	}

	public static function isSameDay( $dt_date, $dt_another){

		$dt_dateAux = strtotime ( $dt_date ) ;
		$dt_dateAux = date ( "Ymd" , $dt_dateAux );

		$dt_anotherAux = strtotime ( $dt_another ) ;
		$dt_anotherAux = date ( "Ymd" , $dt_anotherAux );

		return $dt_dateAux == $dt_anotherAux ;
	}


	public static function validateEntity( $dao, $entity, $msg ){

		if( $entity == null || $entity->getOid()==null )
		throw new GenericException( $msg);

		$entity = $dao->getEntityById($entity->getOid());
		if( $entity == null )
		throw new GenericException( $msg );
			
		return $entity;
	}

			
	public static function getFacultadesItems() {

		return self::getFilterOptionItems( CYTSecureManagerFactory::getFacultadManager(), "oid", "ds_facultad");

	}
	
	public static function getCatsItems() {

		return self::getFilterOptionItems( CYTSecureManagerFactory::getCatManager(), "oid", "ds_cat");

	}
	
	
	
	public static function getCategoriasItems($mostradas="") {
		if ($mostradas) {
			$oCriteria = new CdtSearchCriteria();
			$filter = new CdtSimpleExpression("cd_categoria in (".$mostradas.")");
			$oCriteria->setExpresion($filter);
		}
		
		return self::getFilterOptionItems( CYTSecureManagerFactory::getCategoriaManager(), "oid", "ds_categoria","","","","cd_categoria",$oCriteria);

	}
	
	public static function getCarrerainvsItems($mostradas="") {
		if ($mostradas) {
			$oCriteria = new CdtSearchCriteria();
			$filter = new CdtSimpleExpression("cd_carrerainv in (".$mostradas.")");
			$oCriteria->setExpresion($filter);
		}
		return self::getFilterOptionItems( CYTSecureManagerFactory::getCarrerainvManager(), "oid", "ds_carrerainv","","","","",$oCriteria);

	}
	
	public static function getOrganismosItems($mostradas="") {
		if ($mostradas) {
			$oCriteria = new CdtSearchCriteria();
			$filter = new CdtSimpleExpression("cd_organismo in (".$mostradas.")");
			$oCriteria->setExpresion($filter);
		}
		return self::getFilterOptionItems( CYTSecureManagerFactory::getOrganismoManager(), "oid", "ds_codigo","","","","cd_organismo",$oCriteria);

	}
	
	public static function getCargosItems($mostradas="") {
		if ($mostradas) {
			$oCriteria = new CdtSearchCriteria();
			$filter = new CdtSimpleExpression("cd_cargo in (".$mostradas.")");
			$oCriteria->setExpresion($filter);
		}
		return self::getFilterOptionItems( CYTSecureManagerFactory::getCargoManager(), "oid", "ds_cargo","","","","nu_orden",$oCriteria);

	}
	
		
	public static function getDeddocsItems($mostradas="") {
		if ($mostradas) {
			$oCriteria = new CdtSearchCriteria();
			$filter = new CdtSimpleExpression("cd_deddoc in (".$mostradas.")");
			$oCriteria->setExpresion($filter);
		}
		return self::getFilterOptionItems( CYTSecureManagerFactory::getDeddocManager(), "oid", "ds_deddoc","","","","cd_deddoc",$oCriteria);

	}
	
	public static function getPeriodosItems() {

		return self::getFilterOptionItems( CYTSecureManagerFactory::getPeriodoManager(), "oid", "ds_periodo","","","","cd_periodo");

	}
	
	public static function getEstadosItems() {

		return self::getFilterOptionItems( CYTSecureManagerFactory::getEstadoManager(), "oid", "ds_estado","","","","cd_estado");

	}
	
	public static function getEvaluacionEstadosItems() {

		return self::getFilterOptionItems( CYTSecureManagerFactory::getEstadoEvaluacionManager(), "oid", "ds_estado","","","","cd_estado");

	}
	
	public static function getEstadosEvaluacionItems() {

		return self::getFilterOptionItems( CYTSecureManagerFactory::getEstadoEvaluacionManager(), "oid", "ds_estado","","","","cd_estado");

	}
	
	public static function getTiposInvestigadorItems($mostradas="") {
		//echo 'mos: '.$mostradas;
		if ($mostradas) {
			$oCriteria = new CdtSearchCriteria();
			$filter = new CdtSimpleExpression("cd_tipoinvestigador in (".$mostradas.")");
			$oCriteria->setExpresion($filter);
		}
		return self::getFilterOptionItems( CYTSecureManagerFactory::getTipoinvestigadorManager(), "oid", "ds_tipoinvestigador","","","","cd_tipoinvestigador",$oCriteria);

	}
	
	public static function getDisciplinasItems() {

		return self::getFilterOptionItems( CYTSecureManagerFactory::getDisciplinaManager(), "oid", "ds_disciplina","","","","ds_codigo");

	}
	
	
	
	public static function sendMailPop($nameTo, $to, $subject, $msg, $attachs="", $nameFrom = CDT_POP_MAIL_FROM_NAME, $from = CDT_POP_MAIL_FROM ) {


        require_once(CDT_EXTERNAL_LIB_PATH . "mailer/class.phpmailer.php");
        require_once(CDT_EXTERNAL_LIB_PATH . "mailer/class.smtp.php");


        if (CDT_TEST_MODE) {
        	//me los envío todos a mi en test
        	$to = 'marcos.pinero1976@gmail.com';
        }
        
        
        //para que no de la salida del mailer.
        ob_start();

        $mail = new PHPMailer();

        
        $mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = CDT_POP_MAIL_HOST;
		//Set the SMTP port number - likely to be 25, 465 or 587
		$mail->Port = CDT_POP_MAIL_PORT;
		$mail->SMTPSecure = CDT_POP_MAIL_SMTP_SECURE;
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication
		$mail->Username = CDT_POP_MAIL_USERNAME;
		//Password to use for SMTP authentication
		$mail->Password = CDT_POP_MAIL_PASSWORD;
		CdtUtils::log($from.' - '.$nameFrom);
		//Set who the message is to be sent from
		$mail->setFrom($from, $nameFrom);
		//Set an alternative reply-to address
		$mail->addReplyTo($from, $nameFrom);
		//Set who the message is to be sent to
		$mail->addAddress($to, $nameTo);
		//Set the subject line
		$mail->Subject = $subject;
		$body = $msg;
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML($body);
		//Replace the plain text body with one created manually
		$mail->AltBody = $body;
		
        
		
		$mail->CharSet = 'UTF-8';
		
		
		
        if ($attachs) {
	        foreach ($attachs as $attach) {
	        	$mail->AddAttachment($attach);
	        }
        }
        
	 	try {
            $mail->Send();
        } catch (GenericException $exc) {
            CdtUtils::log("OcurriÃ³ un error en el envÃ­o del mail a $nameTo <$to> motivo: ".$exc);
        }
        
       /* if (!$mail->Send())
            throw new GenericException("Ocurrió un error en el envío del mail a $nameTo <$to>");*/

        // Clear all addresses and attachments for next loop
        $mail->ClearAddresses();
        $mail->ClearAttachments();

        //para que no de la salida del mailer.
        ob_end_clean();
    }

    public static function sendMail($nameTo, $to, $subject, $msg, $attachs="", $nameFrom = CDT_POP_MAIL_FROM_NAME, $from = CDT_POP_MAIL_FROM) {

    	//FIXME para tests todos los mails me los envío a mi.
    	//$to = "marcospinero@yahoo.com.ar";
    	
        if (CDT_MAIL_ENVIO_POP)
            self::sendMailPop($nameTo, $to, $subject, $msg, $attachs, $nameFrom, $from);
        else {

            //para que no de la salida del mailer.
            ob_start();

            $to2 = $nameTo . " <" . $to . ">";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: " . $from;

            if (!mail($to2, $subject, $msg, $headers)){
                self::log_error("Ocurrió un error en el envío del mail a $to2") ;
            	throw new GenericException("Ocurrió un error en el envío del mail a $to2");
            }
            //para que no de la salida del mailer.
            ob_end_clean();
        }
    }
	
	public static function getUserLogged(){
		$oUser = new User();
		
		$data = CdtUtils::getParamSESSION(APP_NAME);
		$oUser->setOid( $data["cd_user"]);
		$oUser->setFunctions( unserialize( $data["functions"]) );
		$oUser->setDs_username( $data["ds_username"] );
		$oUser->setDs_name( $data["ds_name"] );
		$oUser->getUserGroup()->setCd_usergroup( $data["cd_usergroup"]);
		return $oUser;
	}
	
	public static function stripAccents($String)
	{
	    CdtUtils::log('Antes: '.$String);
		$String = preg_replace("/[äáàâãª]/","a",$String);
	    $String = preg_replace("/[ÁÀÂÃÄ]/","A",$String);
	    $String = preg_replace("/[ÍÌÎÏ]/","I",$String);
	    $String = preg_replace("/[íìîï]/","i",$String);
	    $String = preg_replace("/[éèêë]/","e",$String);
	    $String = preg_replace("/[ÉÈÊË]/","E",$String);
	    $String = preg_replace("/[óòôõöº]/","o",$String);
	    $String = preg_replace("/[ÓÒÔÕÖ]/","O",$String);
	    $String = preg_replace("/[úùûü]/","u",$String);
	    $String = preg_replace("/[ÚÙÛÜ]/","U",$String);
	    $String = preg_replace("[´`]","",$String);
	    $String = str_replace("ç","c",$String);
	    $String = str_replace("Ç","C",$String);
	    $String = str_replace("ñ","n",$String);
	    $String = str_replace("Ñ","N",$String);
	    $String = str_replace("Ý","Y",$String);
	    $String = str_replace("ý","y",$String);
	    CdtUtils::log('Después: '.$String);
	    return $String;
	}
	
	public static function edad($hoy, $edad){
		list($anio,$mes,$dia) = explode("-",$edad);
		list($anioH,$mesH,$diaH) = explode("-",$hoy);
		$anio_dif = $anioH - $anio;
		$mes_dif = $mesH - $mes;
		$dia_dif = $diaH - $dia;
		if ($dia_dif < 0 || $mes_dif < 0)
		$anio_dif--;
		return $anio_dif;
	}
	
	public static function dias($fecha1, $fecha2){
		list($ano1,$mes1,$dia1) = explode("-",$fecha1);
		list($ano2,$mes2,$dia2) = explode("-",$fecha2);
		$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
		$timestamp2 = mktime(0,0,0,$mes2,$dia2,$ano2); 
		$dias_diferencia = floor(($timestamp1 - $timestamp2) / (60 * 60 * 24)); 
		return $dias_diferencia;
	}
	
	public static function logObject($object){
		ob_start();
	    var_dump($object);
	    CdtUtils::log(ob_get_clean());
	    ob_end_clean();
	}
	
	public static function unpack($source, $target) {
		$string = implode("", gzfile($source));
		$fp = fopen($target, "w");
		fwrite($fp, $string, strlen($string));
		fclose($fp);
	} 
	public static function compact($source, $target) {
		$fp = fopen($source, "r");
		$data = fread ($fp, filesize($source));
		fclose($fp);
		$zp = gzopen($target, "w9");
		gzwrite($zp, $data);
		gzclose($zp);
	}
	
	
}
