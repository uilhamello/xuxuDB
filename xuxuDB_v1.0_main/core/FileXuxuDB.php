<?php

class FileXuxuDB{

	private $fileName;
	private $fileContent;
	private $dir;
	private $mode;

	public function setDir($_dir){
		$this->dir = $_dir;
	}

	public function getDir(){
		return $this->dir;
	}

	public function __construct(){}

	public function getMode(){
		return $this->mode;
	}

	public function setMode($_mode){
		$this->mode = $_mode;
	}

	public function setFileName($_file_name){
		$this->fileName = $_file_name;
	}

	public function getFileName(){
		return $this->fileName;
	}

	public function setFileContent($_file_content){
		$this->fileContent = $_file_content;
	}

	public function getFileContent(){
		return $this->fileContent;
	}

	public function exist_file(){

		if(empty($this->fileName)){
			return file_exists($this->fileName);
		} else {
			return false;
		}

	}

	public function getFileContents(){

		if(file_exists($this->fileName)){
			return file_get_contents($this->fileName);
		} else {
			return false;
		}
	}

	public function createFile(){

		$file = fopen($this->fileName, "w+");
		$return = true;
		
		if(! fwrite($file, stripslashes($this->fileContent))){
			$return = false;
		}

		fclose($file);
		if(!empty($this->mode)){
			chmod($this->fileName, $this->mode);
		}
		return $return;

	}

	public function createDir(){

		if(!$this->exist_file()){


			if(trim($this->dir) !=""){
				if(!$this->isDir()){
					return mkdir($this->dir, $this->mode);
				}
				else{
					return false;
				}
			}else{
				return false;
			}

		}
	}

	public function isDir(){

		if(trim($this->dir) !=""){
			return is_dir($this->dir);
		}
	}

}
?>