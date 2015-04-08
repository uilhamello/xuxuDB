<?php

class Country_info{

 
/* TABLE FIELD: Code ---------*/
	private $Code_null = FALSE;
	private $Code_type = 'char';
	private $Code_size = '3';
 
/* TABLE FIELD: Name ---------*/
	private $Name_null = FALSE;
	private $Name_type = 'char';
	private $Name_size = '52';
 
/* TABLE FIELD: Continent ---------*/
	private $Continent_null = FALSE;
	private $Continent_type = 'enum';
	private $Continent_size = array('Asia','Europe','North America','Africa','Oceania','Antarctica','South America');
 
/* TABLE FIELD: Region ---------*/
	private $Region_null = FALSE;
	private $Region_type = 'char';
	private $Region_size = '26';
 
/* TABLE FIELD: SurfaceArea ---------*/
	private $SurfaceArea_null = FALSE;
	private $SurfaceArea_type = 'float';
	private $SurfaceArea_size = '10,2';
 
/* TABLE FIELD: IndepYear ---------*/
	private $IndepYear_null = TRUE;
	private $IndepYear_type = 'smallint';
	private $IndepYear_size = '6';
 
/* TABLE FIELD: Population ---------*/
	private $Population_null = FALSE;
	private $Population_type = 'int';
	private $Population_size = '11';
 
/* TABLE FIELD: LifeExpectancy ---------*/
	private $LifeExpectancy_null = TRUE;
	private $LifeExpectancy_type = 'float';
	private $LifeExpectancy_size = '3,1';
 
/* TABLE FIELD: GNP ---------*/
	private $GNP_null = TRUE;
	private $GNP_type = 'float';
	private $GNP_size = '10,2';
 
/* TABLE FIELD: GNPOld ---------*/
	private $GNPOld_null = TRUE;
	private $GNPOld_type = 'float';
	private $GNPOld_size = '10,2';
 
/* TABLE FIELD: LocalName ---------*/
	private $LocalName_null = FALSE;
	private $LocalName_type = 'char';
	private $LocalName_size = '45';
 
/* TABLE FIELD: GovernmentForm ---------*/
	private $GovernmentForm_null = FALSE;
	private $GovernmentForm_type = 'char';
	private $GovernmentForm_size = '45';
 
/* TABLE FIELD: HeadOfState ---------*/
	private $HeadOfState_null = TRUE;
	private $HeadOfState_type = 'char';
	private $HeadOfState_size = '60';
 
/* TABLE FIELD: Capital ---------*/
	private $Capital_null = TRUE;
	private $Capital_type = 'int';
	private $Capital_size = '11';
 
/* TABLE FIELD: Code2 ---------*/
	private $Code2_null = FALSE;
	private $Code2_type = 'char';
	private $Code2_size = '2';



    public function __get($name){  

   		return $this->$name;

    }

}

?>