<?php

class Countrylanguage_info{

 
/* TABLE FIELD: CountryCode ---------*/
	private $CountryCode_null = FALSE;
	private $CountryCode_type = 'char';
	private $CountryCode_size = '3';
 
/* TABLE FIELD: Language ---------*/
	private $Language_null = FALSE;
	private $Language_type = 'char';
	private $Language_size = '30';
 
/* TABLE FIELD: IsOfficial ---------*/
	private $IsOfficial_null = FALSE;
	private $IsOfficial_type = 'enum';
	private $IsOfficial_size = array('T','F');
 
/* TABLE FIELD: Percentage ---------*/
	private $Percentage_null = FALSE;
	private $Percentage_type = 'float';
	private $Percentage_size = '4,1';



    public function __get($name){  

   		return $this->$name;

    }

}

?>