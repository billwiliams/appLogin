<?php
class Util{
	private $id = '';
	private $password = '';
	private $salt = '';
	private $passwordHash = '';
    	
    function generateId(){
		$this->id = generateNumericKey(9);
		$this->id += "_".generateAlphaNumericKey(2);
		return $this->id;
	}
	
    function generateSalt(){
    	$this->salt = uniqid('',true);
		return $this->salt; 
	}
	
	function generateHashPassword($salt,$password){
        $this->passwordHash = md5($salt.$password);
		return $this->passwordHash;
    }
	
	function generateNumericKey($longitud){
		$key='';
		$pattern = '1234567890';
		$max=strlen($pattern)-1;
		
		for($i=0;$i<$longitud;$i++)
			$key.=$pattern{mt_rand(0,$max)};
		return $key;
	}
	
	function generateAlphaNumericKey($longitud){
		$key='';
		$pattern = 'abcdefghijklmnopqrstuvwxyz';
		$max=strlen($pattern)-1;
		
		for($i=0;$i<$longitud;$i++)
			$key.=$pattern{mt_rand(0,$max)};
		return $key;
	}
}
	
?>