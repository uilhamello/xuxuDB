<?php

class Cf_examen_psicopedagogico_info{

 
/* TABLE FIELD: id_psicopedagogico ---------*/
	private $id_psicopedagogico_null = FALSE;
	private $id_psicopedagogico_type = 'int';
	private $id_psicopedagogico_size = '11';
 
/* TABLE FIELD: id_examen ---------*/
	private $id_examen_null = FALSE;
	private $id_examen_type = 'int';
	private $id_examen_size = '11';
 
/* TABLE FIELD: tiempo_aprendizaje ---------*/
	private $tiempo_aprendizaje_null = FALSE;
	private $tiempo_aprendizaje_type = 'tinyint';
	private $tiempo_aprendizaje_size = '2';
 
/* TABLE FIELD: atencion ---------*/
	private $atencion_null = FALSE;
	private $atencion_type = 'tinyint';
	private $atencion_size = '2';
 
/* TABLE FIELD: memoria_corto_plazo ---------*/
	private $memoria_corto_plazo_null = FALSE;
	private $memoria_corto_plazo_type = 'enum';
	private $memoria_corto_plazo_size = array('SI','NO');



    public function __get($name){  

   		return $this->$name;

    }

}

?>