<?php

class Localidades_info{

 
/* TABLE FIELD: id ---------*/
	private $id_null = FALSE;
	private $id_type = 'int';
	private $id_size = '11';
 
/* TABLE FIELD: municipio_id ---------*/
	private $municipio_id_null = FALSE;
	private $municipio_id_type = 'int';
	private $municipio_id_size = '11';
 
/* TABLE FIELD: clave ---------*/
	private $clave_null = FALSE;
	private $clave_type = 'varchar';
	private $clave_size = '4';
 
/* TABLE FIELD: nombre ---------*/
	private $nombre_null = FALSE;
	private $nombre_type = 'varchar';
	private $nombre_size = '110';
 
/* TABLE FIELD: latitud ---------*/
	private $latitud_null = FALSE;
	private $latitud_type = 'varchar';
	private $latitud_size = '6';
 
/* TABLE FIELD: longitud ---------*/
	private $longitud_null = FALSE;
	private $longitud_type = 'varchar';
	private $longitud_size = '7';
 
/* TABLE FIELD: altitud ---------*/
	private $altitud_null = FALSE;
	private $altitud_type = 'varchar';
	private $altitud_size = '4';



    public function __get($name){  

   		return $this->$name;

    }

}

?>