<?php

class Municipios_info{

 
/* TABLE FIELD: id ---------*/
	private $id_null = FALSE;
	private $id_type = 'int';
	private $id_size = '11';
 
/* TABLE FIELD: estado_id ---------*/
	private $estado_id_null = FALSE;
	private $estado_id_type = 'int';
	private $estado_id_size = '11';
 
/* TABLE FIELD: clave ---------*/
	private $clave_null = FALSE;
	private $clave_type = 'varchar';
	private $clave_size = '3';
 
/* TABLE FIELD: nombre ---------*/
	private $nombre_null = FALSE;
	private $nombre_type = 'varchar';
	private $nombre_size = '50';
 
/* TABLE FIELD: sigla ---------*/
	private $sigla_null = FALSE;
	private $sigla_type = 'varchar';
	private $sigla_size = '4';



    public function __get($name){  

   		return $this->$name;

    }

}

?>