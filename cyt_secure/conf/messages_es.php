<?php

/**
 * se definen los mensajes del sistema en español.
 * 
 * @author modelBuilder
 * 
 */
include ('messages_labels_es.php');
define( 'CYT_CMP_FORM_MSG_INVALID_NUMBER',  'no es un formato de nÃºmero entero');

define('CYT_MSG_ASIGNAR', 'Ingresar');
define('CYT_MSG_ASIGNAR_AVISO', 'IMPORTANTE!!! Para que tenga efecto la carga se debe presionar "Ingresar" antes de "Guardar"');
define('CYT_MSG_FORMATO_INVALIDO', 'Formato inválido de ');
define('CYT_MSG_FILE_UPLOAD_ERROR', 'Error al subir el ');
define('CYT_MSG_FILE_UPLOAD_EXITO', 'Archivo subido: ');
define('CYT_MSG_FILE_MAX_SIZE', ' es demasiado grande');
define('CYT_MSG_CAMPOS_REQUERIDOS', 'Faltan completar campos requeridos en la pestaña');
define('CYT_MSG_SIZE_ARCHIVOS', 'IMPORTANTE!!! los archivos a subir no deben superar los 4 Mb de tamaño');

define('CDT_SECURE_MSG_CDTUSER_TITLE_UNBLOCK', 'Desbloquear');
define('CDT_SECURE_MSG_CONFIRM_UNBLOCK_QUESTION', 'Confirma desbloquear el ítem?');
define('CDT_SECURE_MSG_CONFIRM_UNBLOCK_TITLE', 'Confirmación');


//login web.
define( "CDT_SECURE_MSG_INGRESE_CUIL", "Ingrese C.U.I.L.");
define( "CYT_SECURE_MSG_INGRESE_USERGROUP", "Ingrese Perfil");

//solicitar clave.
define( "CDT_SECURE_MSG_FORGOT_PASSWORD", "Si olvidó su password y quiere cambiarla, ingrese su CUIL o e-mail y le enviaremos una nueva");
define( "CDT_SECURE_LBL_FORGOT_PASSWORD_EMAIL", "CUIL o e-mail");
define( "CDT_SECURE_MSG_FORGOT_PASSWORD_FILL_EMAIL", "CUIL o e-mail requerido");
define( "CDT_SECURE_MSG_FORGOT_PASSWORD_NEW_PASSWORD_SENT", "Le enviamos una nueva password a su e-mail");

//* REGISTRACION */
define( "CDT_SECURE_MSG_USERNAME_REQUIRED", 'CUIL requerido');
define( "CDT_SECURE_MSG_NAME_REQUIRED", 'Nombre requerido');
define( "CDT_SECURE_MSG_REGISTRATION_USERNAME_DUPLICATED",  'El CUIL ya fue registrado');

define('CYT_SECURE_MSG_REGISTRATION_SOLICITANTE_CONTROL_ERROR', 'El CUIL no se encuentra registrado como Docente Investigador en nuestras bases');
define('CYT_SECURE_MSG_REGISTRATION_SOLICITANTE_CONTROL_1', 'Si usted es ');
define('CYT_SECURE_MSG_REGISTRATION_SOLICITANTE_CONTROL_2', ' continue con el registro');
define("CYT_SECURE_MSG_ACTIVATION_SOLICITANTE_ERROR",  "Su CUIL no se encuentra registrado como Docente Investigador en nuestras bases");


define( "CDT_SECURE_MSG_REGISTRATION_SIGNUP_SUCCESS", 'Gracias por registrarse! Recibir&aacute; un e-mail con instrucciones para activar su cuenta.');
define( "CDT_SECURE_MSG_ACTIVATE_REGISTRATION_SUCCESS", "Su cuenta ha sido activada!.");


define('CYT_SECURE_MSG_USER_CUIL_FORMAT', 'El C.U.I.L. debe ser del formato xx-xxxxxxxx-xx');
define('CYT_SECURE_MSG_USER_USERGROUP_REQUIRED', 'Asigne al menos un perfil');

//PDF
define('CYT_MSG_SOLICITUD_PDF_PRELIMINAR_TEXT', 'VISTA PRELIMINAR');

define('CYT_MSG_USER_USERGROUP_ASIGNAR', 'Asignar Perfil');
define('CYT_MSG_USER_USERGROUPS', "Indique los perfiles para el usuario");

define('CYT_MSG_SOLICITUD_PDF_TITLE', 'VISUALIZAR SOLICITUD');

define('CYT_MSG_SOLICITUD_PDF_PAGINA', 'Página');
define('CYT_MSG_SOLICITUD_PDF_PAGINA_DE', 'de');

define('CYT_MSG_SOLICITUD_RECIBIR_POR_MAIL', 'Acepto recibir toda notificación relativa a la presente solicitud en la dirección de correo electrónico declarada precedentemente : ');

define('CYT_MSG_SOLICITUD_BECARIO', 'BECARIO');
define('CYT_MSG_SOLICITUD_INVESTIGADOR_CARRERA', 'INVESTIGADOR DE CARRERA');

define('CYT_MSG_PROYECTO_RESUMEN', 'RESUMEN DEL PROYECTO');

define('CYT_MSG_BECA_RESUMEN', 'RESUMEN DE LA BECA');

define('CYT_MSG_EVALUACION_PDF_TITLE', 'VISUALIZAR EVALUACION');
define('CYT_MSG_EVALUACION_PDF_PRELIMINAR_TEXT', 'EVALUACION PRELIMINAR');

/* LUGARES DE TRABAJO */

define('CYT_MSG_LUGAR_TRABAJO_TITLE_LIST', 'Lugares de trabajo');

/* TITULOS */

define('CYT_MSG_TITULO', 'Título');
//define('CYT_MSG_TITULO_TITLE_LIST', 'Títulos');
define('CYT_MSG_TITULO_TITLE_ADD', 'Agregar ' . CYT_MSG_TITULO);

define('CYT_MSG_TITULO_NOMBRE_REQUIRED', CYT_MSG_TITULO . ' es requerido');
define('CYT_MSG_TITULO_UNIVERSIDAD_REQUIRED', 'Universidad es requerido');
define('CYT_MSG_TITULO_NIVEL_REQUIRED', 'Nivel es requerido');

define('CYT_MSG_TITULO_TITLE_LIST', 'Títulos de grado');
define('CYT_MSG_TITULOPOSGRADO_TITLE_LIST', 'Títulos de posgrado');

/* UNIVERSIDADES */

define('CYT_MSG_UNIVERSIDAD', 'Universidad');
define('CYT_MSG_UNIVERSIDAD_TITLE_LIST', 'Universidades');
define('CYT_MSG_UNIVERSIDAD_TITLE_ADD', 'Agregar ' . CYT_MSG_UNIVERSIDAD);

define('CYT_MSG_UNIVERSIDAD_NOMBRE_REQUIRED', CYT_MSG_UNIVERSIDAD . ' es requerido');



/* SOLICITUDES */
define('CYT_LBL_SOLICITUD', 'Solicitud');

define('CYT_MSG_SOLICITUD_ELIMINAR_PROHIBIDO', 'Sólo se pueden eliminar las solicitudes con estado CREADA');
define('CYT_MSG_SOLICITUD_MODIFICAR_PROHIBIDO', 'Sólo se pueden modificar las solicitudes con estado CREADA');
define('CYT_MSG_SOLICITUD_MODIFICAR_PROHIBIDO_1', 'Solicitud creada en otro año');
define('CYT_MSG_SOLICITUD_ENVIAR_PROHIBIDO', 'Sólo se pueden enviar las solicitudes con estado CREADA');
define('CYT_MSG_SOLICITUD_ENVIAR_PROHIBIDO_1', 'Solicitud creada en otro año');
define('CYT_MSG_SOLICITUD_ENVIAR_PREGUNTA', 'Luego de enviar la solicitud no podrá realizar modificaciones ¿Continua?');
define('CYT_MSG_SOLICITUD_ADMITIR_PREGUNTA', '¿Está seguro de admitir?');
define('CYT_MSG_SOLICITUD_ARCHIVO_NOMBRE', 'SOLICITUD_');
//define('CYT_MSG_SOLICITUD_ADMITIR_PROHIBIDO', 'Sólo se pueden admitir/rechazar las solicitudes con estado RECIBIDA');
define('CYT_MSG_SOLICITUD_ANTERIORES_PROHIBIDO', 'No tiene permisos para ver solicitudes de años anteriores');
define('CYT_MSG_SOLICITUD_NO_RENDIDAS', 'Ud. no ha rendido la solicitud del año ');

define('CYT_MSG_SOLICITUD_RECHAZAR', 'Rechazar solicitud');
define('CYT_MSG_SOLICITUD_RECHAZAR_MOTIVOS', 'Motivos');
define('CYT_MSG_SOLICITUD_RECHAZAR_MOTIVOS_REQUIRED', CYT_MSG_SOLICITUD_RECHAZAR_MOTIVOS. ' es requerido');

define('CYT_MSG_FACULTAD_NO_DECLARADA', 'Debe seleccionar una facultad en la pestaña ');
define('CYT_MSG_FIN_PERIODO', 'El período para presentar la Solicitud de Subsidio ha Finalizado');

/* SOLICITUDES ESTADOS */
define('CYT_MSG_SOLICITUD_ESTADO_TITLE_LIST', 'Estados');
define('CYT_MSG_SOLICITUD_ESTADO_CAMBIAR', 'Cambiar-estado');

define('CYT_MSG_SOLICITUD_ESTADO_SOLICITUD_REQUIRED', CYT_LBL_SOLICITUD. ' es requerido');
define('CYT_MSG_SOLICITUD_ESTADO_ESTADO_REQUIRED', CYT_LBL_ESTADO. ' es requerido');

/* CARGOS / DEDICACION*/
define('CYT_MSG_SIN_CARGO_CON_DEDICACION', 'Si especificó una dedicación docente debe especificar un cargo');
define('CYT_MSG_CON_CARGO_SIN_DEDICACION', 'Si especificó un cargo docente debe especificar una dedicación');
define('CYT_MSG_SIN_CARGO_SIN_BECA', 'Si no posee cargo, debe ser becario UNLP');
define('CYT_MSG_SIMPLE_SIN_BECA', 'Si tiene dedicación simple, debe ser becario o tener un cargo en la carrera de investigación');

define('CYT_MSG_BECARIO_CARRERA_PROHIBIDO', 'No puede ser becario y miembro de la carrera al mismo tiempo');


/* EVALUADORES */
define('CYT_MSG_EVALUADOR_TITLE_LIST', 'Evaluadores');
define("CYT_MSG_EVALUADORES_SEND_CONFIRMATION",  "Enviar evaluaciones a evaluadores");
define("CYT_MSG_EVALUADOR_INTERNO_NO_ENVIADO",  "No se envió al evaluador interno porque ya fue enviado");
define("CYT_MSG_EVALUADOR_EXTERNO_NO_ENVIADO",  "No se envió al evaluador externo porque ya fue enviado");
define("CYT_MSG_EVALUADOR_TERCERO_NO_ENVIADO",  "No se envió al tercer evaluador porque ya fue enviado");
define("CYT_MSG_EVALUADOR_INTERNO_EVALUADO",  "No se modificó el evaluador interno porque el estado de su evaluación es EVALUADA");
define("CYT_MSG_EVALUADOR_EXTERNO_EVALUADO",  "No se modificó el evaluador externo porque el estado de su evaluación es EVALUADA");
define("CYT_MSG_EVALUADOR_TERCERO_EVALUADO",  "No se modificó el tercer evaluador porque el estado de su evaluación es EVALUADA");

define("CYT_MSG_EVALUADOR_INTERNO_NO_ENVIADO_1",  "No se asignó al evaluador interno porque presentó una solicitud");
define("CYT_MSG_EVALUADOR_EXTERNO_NO_ENVIADO_1",  "No se asignó al evaluador externo porque presento una solicitud");
define("CYT_MSG_EVALUADOR_TERCERO_NO_ENVIADO_1",  "No se asignó al tercer evaluador porque presento una solicitud");

define("CYT_MSG_EVALUADOR_NO_ENVIADO_1",  "No se asignó al evaluador porque presentó una solicitud");
define("CYT_MSG_EVALUADOR_NO_ENVIADO",  "No se envió al evaluador $1 porque ya fue enviado");

define("CYT_MSG_EVALUADORES_ACTUALIZAR_PUNTAJES",  "Actualizar el puntaje y diferencia?");

define('CYT_MSG_EVALUADORES_PROHIBIDO_AGREGAR', 'Las solicitudes con estado CREADA, RECIBIDA, NO ADMITIDA y/o RETIRADA no tienen evaluaciones');
define('CYT_MSG_EVALUADORES_PROHIBIDO_AGREGAR2', 'La solicitud debe estar con estado RECIBIDA o EN EVALUACION para que se le puedan assignar evaluadores');
/* EVALUACIONES */

define('CYT_MSG_EVALUACION', 'Evaluación');
define('CYT_MSG_EVALUACION_TITLE_LIST', 'Evaluaciones');
define('CYT_MSG_EVALUACION_TITLE_AGREGAR', 'Agregar ' . CYT_LBL_EVALUADOR);
define('CYT_MSG_EVALUACION_TITLE_ADD', 'Agregar/Modificar ' . CYT_MSG_EVALUADOR_TITLE_LIST);
define('CYT_MSG_EVALUACION_TITLE_SEND', 'Enviar a ' . CYT_MSG_EVALUADOR_TITLE_LIST );
define('CYT_MSG_EVALUACION_TITLE_VIEW', 'Visualizar ' . CYT_MSG_EVALUACION );
define('CYT_MSG_EVALUACION_ACTUALIZAR_PUNTAJE', 'Actualizar Puntajes ' );

define('CYT_MSG_EVALUACION_SOLICITUD_REQUIRED', 'Solicitud es requerido');
define('CYT_MSG_EVALUACION_EVALUADOR_REQUIRED', 'Evaluador es requerido');


define('CYT_MSG_EVALUACION_ADMITIR_PREGUNTA', '¿Está seguro de aceptar?');

define('CYT_MSG_EVALUACION_ESTADO_EVALUACION_REQUIRED', CYT_MSG_EVALUACION. ' es requerido');

define('CYT_MSG_EVALUACION_EVALUAR_PROHIBIDO', 'Debe aceptar la evaluación para poder evaluarla');

define('CYT_MSG_EVALUACION_ADMITIDA_PROHIBIDO', 'La evaluación ya fue aceptada');
define('CYT_MSG_EVALUACION_ADMITIR_PROHIBIDO', 'Sólo se pueden aceptar/rechazar las evaluaciones con estado RECIBIDA');

define('CYT_MSG_EVALUACION_MODIFICAR_PROHIBIDO', 'La evaluación ya fue enviada');
define('CYT_MSG_EVALUACION_ENVIAR_PREGUNTA', 'Luego de enviar la evaluación no podrá realizar modificaciones ¿Continua?');
define('CYT_MSG_EVALUACION_ARCHIVO_NOMBRE', 'Evaluacion_');
define('CYT_MSG_EVALUACION_PUNTAJE_CERO', 'El puntaje es 0 (cero)');

define('CYT_MSG_EVALUACION_ANTERIORES_PROHIBIDO', 'No tiene permisos para ver evaluaciones de años anteriores');

define('CYT_MSG_EVALUACION_RECHAZAR', 'Rechazar evaluacion');
/* CAMBIOS */
define('CYT_MSG_CAMBIOS_PROHIBIDO_AGREGAR', 'No se puede hacer cambios');

/* RENDICIONES */
//define('CYT_LBL_RENDICION', 'Rendición');

define('CYT_MSG_RENDICION_TITLE_LIST', 'Rendiciones');
define('CYT_MSG_RENDICION_TITLE_ADD', 'Agregar Rendición');
define('CYT_MSG_RENDICION_TITLE_UPDATE', 'Modificar Rendición'  );
define('CYT_MSG_RENDICION_TITLE_VIEW', 'Visualizar Rendición'  );
define('CYT_MSG_RENDICION_TITLE_DELETE', 'Borrar Rendición'  );

define('CYT_MSG_RENDICION_ELIMINAR_PROHIBIDO', 'Sólo se pueden eliminar las rendiciones con estado CREADA');
define('CYT_MSG_RENDICION_MODIFICAR_PROHIBIDO', 'Sólo se pueden modificar los rendiciones con estado CREADA');
define('CYT_MSG_RENDICION_ENVIAR_PROHIBIDO', 'Sólo se pueden enviar los rendiciones con estado CREADA');
define('CYT_MSG_RENDICION_ENVIAR_PREGUNTA', '¿Enviar la rendición?');

define('CYT_MSG_RENDICION_PDF_TITLE', 'VISUALIZAR RENDICION');
define('CYT_MSG_RENDICION_ARCHIVO_NOMBRE', 'RENDICION_');

define('CYT_MSG_RENDICIONES_PROHIBIDO_AGREGAR', 'Solo se pueden rendir las solicitudes con estado OTORGADA');
define('CYT_MSG_RENDICION_CREADA', 'Solo se puede crear una rendición por solicitud');

define('CYT_MSG_RENDICION_ADMITIR_PROHIBIDO', 'Sólo se pueden admitir/rechazar las rendiciones con estado RECIBIDA');

define('CYT_MSG_RENDICION_ARCHIVOS_REQUERIDOS', 'Todos los archivos son obligatorios');

define('CYT_MSG_RENDICION_RECHAZAR', 'Rechazar rendición');

define('CYT_MSG_RENDICON_ESTADO_RENDICION_REQUIRED', CYT_LBL_RENDICION. ' es requerido');

?>
