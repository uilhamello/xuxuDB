<?php

interface InterfaceTO{


	/*--------------------------------------------------------------------------------------------------------
	   Todo las clases TOs, en general, van a tener la misma estructura de metodos abajo, cambiando sólo sus parametros
	   EVERY "TO CLASSES" WILL HAVE THE CODE AS SIMILAR AS BELOW, 
	   JUST CHANGE ITS ATRIBUTES AND SOME INFORMATIONS PASSED FOR THE FATHER CLASS IN THE __CONSTRUCT
	--------------------------------------------------------------------------------------------------------*/

	/*
	****************************************************************************************
	FUNCTION: INICIALIZED AS THE CLASS IS INSTANCED
	
	PARAMETER: A STRING WITH A JSON STRUTURE (observation: it is no a case-sensitive values):
			 A) WHERE:'ID_TABLE = 12 AND NAME = /'NAME_EXEMPLE/'
			 B) ID:ID_TABLE
			 C) NO_POPULATE: FALSE/TRUE
			 EXEMPLE OF USE: new Sist_permisos_usuarios('{"id":"1","no_populate":true,where":"id_usuario=1"}');

	PROCESS: 1) STARTS THE CLASS FATHER... 
			 2) SETS THE ID PASSED AS PARAMETER
			 3) CHECK IF IT IS FOR POPULARED THE OBJECT ATRIBUTES WITH THE BATABASE DATAS, 
			 	IF SO, JUST CALL THE CLASSTO'S METHOD TO DO IT.
	****************************************************************************************
	*/
	public function __construct($_parametere);


	/*
	****************************************************************************************
	FUNCTION: CREATES A ARRAY WITH OBJECTS OF THE FOREIGN KEY CLASS
	RETURN: UN ARRAY THAT THE KEY IS THE ID_FOREIGN PASSED AS FUNCTION'S ATRIBUTE
			EACH ARRAY ELEMENTS HAS A OBJECT OF THE FOREIGN KEY CLASS
	ATRIBUTE: THE CLASS ATRIBUTE FOREIGN KEY NAME 
	****************************************************************************************
	*/
	public function getForeign($_foreign);

	/*
	****************************************************************************************
	FUNCTION: RETURN THE ATRIBUTE VALUE REQUIRED
	****************************************************************************************
	*/
    public function __get($name);

	/*
	****************************************************************************************
	FUNCTION: RECORD THE VALUE TO THE ATRIBUTE PASSED
	****************************************************************************************
	*/
    public function __set($name, $value);

}

?>