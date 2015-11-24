<?php

// Para obtener el separador directorio correspondiente a unix o windows
define('DS', DIRECTORY_SEPARATOR);

// Ruta absoluta de la aplicación
define('ROOT', realpath(dirname(__FILE__)) . DS);

// Ruta del directorio apps donde se colocarán las aplicaciones
define('APP_PATH', ROOT . 'application' . DS);

// Configuraciones generales
require_once APP_PATH . 'Config.php';

// El request recibe las peticiones que vienen por la URL
require_once APP_PATH . 'Request.php';

// El Bootstrap es llamado por el Request y decide que controlador atiende
require_once APP_PATH . 'Bootstrap.php';

// El Controlador principal, de el van a derivar los demás controladores
require_once APP_PATH . 'Controller.php';

// El Modelo principal, de el van a derivar los demás modelos
require_once APP_PATH . 'Model.php';

// La vista principal, de ella derivan las demas vistas
require_once APP_PATH . 'View.php';

// Para implementar Singleton ????
require_once APP_PATH . 'Registro.php';

// bootstrap buscará el controlador solicitado
// La notación :: se usa para llamar a métodos estáticos
// try..catch se usa para capturar errores, en este caso
// atrapamos cuando no existe el controlador
try{
	Bootstrap::run(new Request);
} catch(Exception $e){
	echo $e->getMessage();
}
?>