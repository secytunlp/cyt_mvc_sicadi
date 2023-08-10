<?php

/**
 * Formato para renderizar los archivos en las grillas
 *
 * @author Marcos
 * @since 18-11-2013
 *
 */
class GridFilesValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {

		$oManagerSolicitud = ManagerFactory::getSolicitudManager();
		$oSolicitud = $oManagerSolicitud->getObjectByCode($value);
		$adjuntos ='<a href="doAction?action=view_solicitud_pdf&id='.$value.'" target="_blank"><img class="hrefImg" src="'.WEB_PATH.'css/images/file.jpg" title="Solicitud" /></a>';
		$dir = APP_PATH.'pdfs/'.$oSolicitud->getPeriodo()->getDs_periodo().'/'.$oSolicitud->getDocente()->getNu_documento().'/';
		$dirREL = WEB_PATH.'pdfs/'.$oSolicitud->getPeriodo()->getDs_periodo().'/'.$oSolicitud->getDocente()->getNu_documento().'/';
		if (file_exists($dir)){
				
		      
		     $handle=opendir($dir);
				while ($archivo = readdir($handle))
				{
			        if ((is_file($dir.$archivo))&&(!strchr($archivo,CYT_MSG_SOLICITUD_ARCHIVO_NOMBRE)&&(!strchr($archivo,CYT_MSG_EVALUACION_ARCHIVO_NOMBRE))))
			         {
			         	$adjuntos .='<a href="'.$dirREL.$archivo.'" target="_blank"><img class="hrefImg" src="'.WEB_PATH.'css/images/file.jpg" title="'.$archivo.'" /></a>';
			         	
			         	}
						
				}
				closedir($handle);
			}
		
		$documento = str_pad($oSolicitud->getDocente()->getNu_documento(), 8, "0", STR_PAD_LEFT);
		if (substr($documento,0,1)==0) {
			$dir = APP_PATH.'pdfs/'.$oSolicitud->getPeriodo()->getDs_periodo().'/'.$documento.'/';
			$dirREL = WEB_PATH.'pdfs/'.$oSolicitud->getPeriodo()->getDs_periodo().'/'.$documento.'/';
			
			if (file_exists($dir)){
					
			     
			     $handle=opendir($dir);
					while ($archivo = readdir($handle))
					{
				        if ((is_file($dir.$archivo))&&(!strchr($archivo,CYT_MSG_SOLICITUD_ARCHIVO_NOMBRE)&&(!strchr($archivo,CYT_MSG_EVALUACION_ARCHIVO_NOMBRE))))
				         {
				         	$adjuntos .='<a href="'.$dirREL.$archivo.'" target="_blank"><img class="hrefImg" src="'.WEB_PATH.'css/images/file.jpg" title="'.$archivo.'" /></a>';
				         	
				         	}
							
					}
					closedir($handle);
			}
		}
		
		 
		return $adjuntos ;
	}

}