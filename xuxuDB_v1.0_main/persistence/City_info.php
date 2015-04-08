<?php

class City_info{

 
/* TABLE FIELD: id_ciudad ---------*/
	private $id_ciudad_null = FALSE;
	private $id_ciudad_type = 'int';
	private $id_ciudad_size = '11';
 
/* TABLE FIELD: Name ---------*/
	private $Name_null = FALSE;
	private $Name_type = 'char';
	private $Name_size = '35';
 
/* TABLE FIELD: CountryCode ---------*/
	private $CountryCode_null = FALSE;
	private $CountryCode_type = 'char';
	private $CountryCode_size = '3';
 
/* TABLE FIELD: District ---------*/
	private $District_null = FALSE;
	private $District_type = 'char';
	private $District_size = '20';
 
/* TABLE FIELD: Population ---------*/
	private $Population_null = FALSE;
	private $Population_type = 'int';
	private $Population_size = '11';



    public function __get($name){  

   		return $this->$name;

    }

}

?>