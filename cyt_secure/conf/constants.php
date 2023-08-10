<?php

ini_set('memory_limit', '-1');
ini_set('max_execution_time', '0');
ini_set('display_errors', '0');


define('CDT_UI_LANGUAGE', 'es');


/* FORMATOS */

//números
define('CYT_DECIMALES', '2');
define('CYT_SEPARADOR_DECIMAL', ',');
define('CYT_SEPARADOR_MILES', '.');

//moneda.
define('CYT_MONEDA_SIMBOLO', '$');
define('CYT_MONEDA_ISO', 'ARS');
define('CYT_MONEDA_NOMBRE', 'Pesos Argentinos');
define('CYT_MONEDA_POSICION_IZQ', 1);





define('CYT_DATE_FORMAT', 'd/m/Y');
define('CYT_DATETIME_FORMAT', 'd/m/y H:i:s');
define('CYT_DATETIME_FORMAT_STRING', 'YmdHis');

define('CYT_TIPO_ACREDITACION_ID', 1);
define('CYT_TIPO_ACREDITACION_PPID', 2);
define('CYT_TIPO_ACREDITACION_PIITAP', 3);

define('CYT_ESTADO_PROYECTO_CREADO', 1);
define('CYT_ESTADO_PROYECTO_RECIBIDO', 2);
define('CYT_ESTADO_PROYECTO_ADMITIDO', 3);
define('CYT_ESTADO_PROYECTO_NO_ADMITIDO', 4);
define('CYT_ESTADO_PROYECTO_ACREDITADO', 5);
define('CYT_ESTADO_PROYECTO_EN_EVALUACION', 6);
define('CYT_ESTADO_PROYECTO_NO_ACREDITADO', 7);
define('CYT_ESTADO_PROYECTO_EVALUADO', 8);

define('CYT_ESTADO_INTEGRANTE_ALTA_CREADA', 1);
define('CYT_ESTADO_INTEGRANTE_ALTA_RECIBIDA', 2);
define('CYT_ESTADO_INTEGRANTE_ADMITIDO', 3);
define('CYT_ESTADO_INTEGRANTE_BAJA_CREADA', 4);
define('CYT_ESTADO_INTEGRANTE_BAJA_RECIBIDA', 5);
define('CYT_ESTADO_INTEGRANTE_CAMBIO_CREADO', 6);
define('CYT_ESTADO_INTEGRANTE_CAMBIO_RECIBIDO', 7);
define('CYT_ESTADO_INTEGRANTE_CAMBIO_HS_CREADO', 8);
define('CYT_ESTADO_INTEGRANTE_CAMBIO_HS_RECIBIDO', 9);


define('CYT_ESTADO_SOLICITUD_CREADA', 1);
define('CYT_ESTADO_SOLICITUD_RECIBIDA', 2);
define('CYT_ESTADO_SOLICITUD_ADMITIDA', 3);
define('CYT_ESTADO_SOLICITUD_NO_ADMITIDA', 4);
define('CYT_ESTADO_SOLICITUD_OTORGADA', 5);
define('CYT_ESTADO_SOLICITUD_EN_EVALUACION', 6);
define('CYT_ESTADO_SOLICITUD_NO_OTORGADA', 7);
define('CYT_ESTADO_SOLICITUD_EVALUADA', 8);
define('CYT_ESTADO_SOLICITUD_RENDIDA', 9);
define('CYT_ESTADO_SOLICITUD_RENUNCIADA', 10);
define('CYT_ESTADO_SOLICITUD_RETIRADA', 11);
define('CYT_ESTADO_SOLICITUD_DEVUELTA', 12);

define('CYT_INTEGRANTE_DIRECTOR', 1);
define('CYT_INTEGRANTE_CODIRECTOR', 2);
define('CYT_INTEGRANTE_FORMADO', 3);
define('CYT_INTEGRANTE_NO_FORMADO', 4);
define('CYT_INTEGRANTE_BECARIO', 5);
define('CYT_INTEGRANTE_COLABORADOR', 6);

define('CYT_SOLICITUD_PERIODO_2010', 1);
define('CYT_SOLICITUD_PERIODO_2011', 2);
define('CYT_SOLICITUD_PERIODO_2012', 3);
define('CYT_SOLICITUD_PERIODO_2013', 4);
define('CYT_SOLICITUD_PERIODO_2014', 5);
define('CYT_SOLICITUD_PERIODO_2015', 6);
define('CYT_SOLICITUD_PERIODO_2016', 7);
define('CYT_SOLICITUD_PERIODO_2017', 8);
define('CYT_SOLICITUD_PERIODO_2018', 9);

//lista de identificadores a mostrar en tablas auxiliares
define('CYT_DEDDOC_MOSTRADAS', '1,2,3');
define('CYT_CATEGORIA_MOSTRADAS', '6,7,8,9,10');
define('CYT_CARRERAINV_MOSTRADAS', '1,2,3,6,8,9,10,12');
define('CYT_ORGANISMO_MOSTRADAS', '1,2');
define('CYT_CATEGORIA_DIRECTOR', '6,7,8');
define('CYT_TIPO_INTEGRANTE_DIRECTOR', '1,4,8');

define('CYT_CATEGORIA_FORMADOS', '6,7,8');
define('CYT_CATEGORIA_NO_FORMADOS', '9,10');

define('CYT_FACULTAD_NO_DECLARADA', 574);

define('CYT_DIA_MES_BECA', '-03-31');

define('CYT_DIA_MES_PROYECTO_INI', '-01-01');
define('CYT_DIA_MES_PROYECTO_FIN', '-12-31');
define('CYT_DIA_MES_PROYECTO_CONTROL_UN_YEAR', '-04-01');

define('CYT_EXTENSIONES_PERMITIDAS', 'pdf,doc,docx,rtf');
define('CYT_PATH_PDFS', 'pdfs');
define('CYT_FILE_MAX_SIZE', 4085760);

define('CYT_CD_LUGAR_TRABAJO_UNLP', 1850);
define('CYT_CD_LUGAR_TRABAJO_UNLP_CONICET', 20419);

define('CYT_CD_VIATICO', 'Viaticos');
define('CYT_DS_VIATICO', 'Viáticos');
define('CYT_DS_PASAJE', 'Pasajes');
define('CYT_CD_INSCRIPCION', 'Inscripcion');
define('CYT_DS_INSCRIPCION', 'Inscripción');

define('CYT_CD_AEREO', 'Aereo');
define('CYT_DS_AEREO', 'Aéreo');
define('CYT_DS_OMNIBUS', 'Omnibus');
define('CYT_DS_AUTOMOVIL', 'Automovil');

define('CYT_CD_PRESUPUESTO_TIPO_1', 1);
define('CYT_CD_PRESUPUESTO_TIPO_2', 2);
define('CYT_CD_PRESUPUESTO_TIPO_3', 3);
define('CYT_CD_PRESUPUESTO_TIPO_4', 4);
define('CYT_CD_PRESUPUESTO_TIPO_5', 5);

define('CYT_DEDICACIONES_SIMPLES', '3,5');

define('CYT_CD_VIATICO', 'Viaticos');
define('CYT_DS_VIATICO', 'Viáticos');
define('CYT_DS_PASAJE', 'Pasajes');
define('CYT_CD_INSCRIPCION', 'Inscripcion');
define('CYT_DS_INSCRIPCION', 'Inscripción');

define('CYT_CD_CARGO_NO_DECLARADO', 6);

define('CYT_CD_SIN_DEDICACION', 4);

define('CYT_CD_GROUP_ADMINISTRADOR', 1);
define('CYT_CD_GROUP_DIRECTOR', 2);
define('CYT_CD_GROUP_SOLICITANTE', 3);
define('CYT_CD_GROUP_ADMIN_VIAJES_JOVENES', 4);
define('CYT_CD_GROUP_SECYT_VIAJES_JOVENES', 8);
define('CYT_CD_GROUP_SECYT_VIAJES_JOVENES_FACULTAD', 9);
define('CYT_CD_GROUP_EVALUADOR', 10);
define('CYT_CD_GROUP_COORDINADOR', 11);
define('CYT_CD_GROUP_ADMIN_PROYECTOS', 12);
define('CYT_CD_GROUP_ADMIN_FACULTAD_PROYECTOS', 13);
define('CYT_CD_GROUP_SECYT_PROYECTOS', 14);
define('CYT_CD_GROUP_DIRECTOR_PROYECTO', 15);
define('CYT_CD_GROUP_SECYT_UNIDADES', 16);
define('CYT_CD_GROUP_ADMIN_UNIDADES', 17);

define('CYT_CD_TITULO_GRADO', 1);
define('CYT_CD_TITULO_POSGRADO', 2);

define('PATH_RENDICIONES', 'rendiciones');

define('CYT_CD_SIN_CATEGORIA', '1');


define('CYT_CARRERAINV_CD_SUPERIOR', '1');
define('CYT_CARRERAINV_CD_PRINCIPAL', '2');
define('CYT_CARRERAINV_CD_INDEPENDIENTE', '3');
define('CYT_CARRERAINV_CD_ASISTENTE', '6');
define('CYT_CARRERAINV_CD_ADJUNTO', '12');
define('CYT_CARRERAINV_CD_P_ADJUNTO', '9');
define('CYT_CARRERAINV_CD_P_ASISTENTE', '13');
?>