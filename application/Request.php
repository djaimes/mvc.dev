<?php
class Request
{
	private $_controlador;
	private $_metodo;
	private $_argumentos;

	public function __construct() {
		if(isset($_GET['url'])){
			// Quitar caracteres sobrantes
			$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
			
			// Obtener nombre de controlador, método y argumentos	
			$url = explode('/', $url);
			
			// Eliminar elementos inválidos, como dobles slash
			$url = array_filter($url);

			// Tomamos el primer elemento del array, el controlador
			$this->_controlador = strtolower(array_shift($url));
			
			// Tomamos el segundo elemento del array, el metodo
			$this->_metodo = strtolower(array_shift($url));
			
			// _argumentos contiene el resto del arreglo
			$this->_argumentos = $url;
		}
		
		// Si no se indica controlador, usamos el default index
		if(!$this->_controlador){
			$this->_controlador = DEFAULT_CONTROLLER;
		}
			
		// Si no se indica método, usamos el método default index
		if(!$this->_metodo){
			$this->_metodo = 'index';
		}
			
		// Si no se indican argumentos, se usa un array vacío
		if(!isset($this->_argumentos)){
			$this->_argumentos = array();
		}			
	}
	
	/* Métodos */
	public function getControlador(){
		return $this->_controlador;
	}
	
	public function getMetodo(){
		return $this->_metodo;
	}
	
	public function getArgs(){
		return $this->_argumentos;
	}
}
?>
