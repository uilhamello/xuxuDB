<?php

class Estados_info{

 
/* TABLE FIELD: id ---------*/
	private $id_null = FALSE;
	private $id_type = 'int';
	private $id_size = '11';
 
/* TABLE FIELD: clave ---------*/
	private $clave_null = FALSE;
	private $clave_type = 'varchar';
	private $clave_size = '2';
 
/* TABLE FIELD: nombre ---------*/
	private $nombre_null = FALSE;
	private $nombre_type = 'varchar';
	private $nombre_size = '45';
 
/* TABLE FIELD: abrev ---------*/
	private $abrev_null = FALSE;
	private $abrev_type = 'varchar';
	private $abrev_size = '16';



    public function __get($name){  

   		return $this->$name;

    }

}

?>