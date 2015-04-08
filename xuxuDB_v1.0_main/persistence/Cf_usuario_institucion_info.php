<?php

class Cf_usuario_institucion_info{

 
/* TABLE FIELD: id_usuario_institucion ---------*/
	private $id_usuario_institucion_null = FALSE;
	private $id_usuario_institucion_type = 'int';
	private $id_usuario_institucion_size = '11';
 
/* TABLE FIELD: id_usuario ---------*/
	private $id_usuario_null = FALSE;
	private $id_usuario_type = 'int';
	private $id_usuario_size = '11';
 
/* TABLE FIELD: id_institucion ---------*/
	private $id_institucion_null = FALSE;
	private $id_institucion_type = 'int';
	private $id_institucion_size = '11';



    public function __get($name){  

   		return $this->$name;

    }

}

?>