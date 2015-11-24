<?php

// Todos los controladores se nombrean con el nombre del controlador seguido de la palabra Controller, utilizando camelCase

class indexController extends Controller{
	public function index() {
		echo 'Hola desde el indexController';
	}
}

?>
