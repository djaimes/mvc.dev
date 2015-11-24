<?php
// Controlador principal

// La clase debe ser abstracta para que no pueda instanciarse
// Es decir que no se puedan crear objetos a partir de ella

abstract class Controller {
	// Una método abstract fuerza a que las clases que 
	// deriven de esta, implementen el método index
	// En caso de que no se indique el método en la URL
	// Se usará index
	abstract public function index();
}

?>
