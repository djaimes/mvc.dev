<?php
class Bootstrap {
	// Pasamos de parámetro un objeto Request
	public static function run(Request $peticion){
		$controller = $peticion->getControlador() . 'Controller';
		$rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
		$metodo = $peticion->getMetodo(); 
		$args = $peticion->getArgs();
		
		// ¿Es accesible el archivo controlador?
		if(is_readable($rutaControlador)){
			require_once $rutaControlador;
			$controller = new $controller;
			
			// ¿el método es válido?
			if(is_callable(array($controller, $metodo))){
				$metodo = $peticion->getMetodo(); 
			} else {
				$metodo = 'index';
			}
			
			// Argumentos
			if(isset($args)){
				call_user_func_array(array($controller, $metodo), $args);
			} else {
				call_user_func_array(array($controller, $metodo));
			}
		} else {
			// Si no existe la clase controladora, mandamos una excepción
			throw new Exception('El Controlador no se ha encontrado');
		}
	}
}
?>
