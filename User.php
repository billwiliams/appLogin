<?php
error_reporting(E_ALL);
include_once("config/AccesoDatos.php");
class User{
	private $id='';
	private $username = '';
	private $password = '';
	private $lastAccess = '';
	private $salt = '';
	private $fb_id = '';
	private $tw_id = '';
	private $type = '';
	private $status = '';
	
	
	/*
	 * Setter methods
	 */
	public function setId($id){
		$this->id = $id;
	}
	
	public function setUsername($username){
		$this->username = $username;
	}	
	
	public function setPassword($password){
		$this->password = $password;
	}	
	
	public function setLastAccess($lastAccess){
		$this->lastAccess = $lastAccess;
	}
	
	public function setSalt($salt){
		$this->salt = $salt;
	}
	
	public function setFacebookId($fb_id){
		$this->fb_id = $fb_id;
	}	
	
	public function setTwitterId($tw_id){
		$this->tw_id = $tw_id;
	}
	
	public function setType($type){
		$this->type = $type;
	}
	
	public function setStatus($status){
		$this->status = $status;
	}
	
	/*
	 * Getter methods
	 */
	public function getId(){
		return $this->id;
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function getPassword(){
		return $this->password;
	}
	
	public function getLastAccess(){
		return $this->lastAccess;
	}
	
	public function getSalt(){
		return $this->salt;
	}
	
	public function getFacebookId(){
		return $this->fb_id;
	}
	
	public function getTwitterId(){
		return $this->tw_id;
	}
	
	public function getType(){
		return $this->type;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	/*
	 * public function SignIn
	 * 
	 * Realiza la búsqueda de un usuario mediante su id y contraseña.
	 * 
	 * @return boolean $bRet false; si no coincidieron username y password 
	 * @return boolean $bRet true; si coincidieron username y password 
	 * 
	 */
	function signIn(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$aFila=null;
	$bRet = false;
		if ($this->username=="" OR $this->password=="")
			throw new Exception("User->signIn(): error de codificaci&oacute;n, faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "SELECT id, username, password, last_access, salt, fb_id, tw_id, type, status
					FROM app_user 
					WHERE username = '".$this->username."' 
					AND password = '".$this->password."'";
				$aFila = $oAccesoDatos->ejecutarConsulta($sQuery);
				$oAccesoDatos->desconectar();
				if ($aFila){
					$this->id = $aFila[0][0];
					$this->username = $aFila[0][1];
					$this->password = $aFila[0][2];
					$this->lastAccess = $aFila[0][3];
					$this->salt = $aFila[0][4];
					$this->fb_id = $aFila[0][5];
					$this->tw_id = $aFila[0][6];
					$this->type = $aFila[0][7];
					$this->status = $aFila[0][8];
					$bRet = true;
				}
			}
		}
		return $bRet;
	}
	
	/*
	 * public function searchById
	 * 
	 * Busca a un usuario mediante su id.
	 * 
	 * @return boolean $bRet false; si no existe el usuario
	 * @return boolean $bRet true; si existe el usuario
	 * 
	 */
	function searchById(){
		$oAccesoDatos=new AccesoDatos();
		$sQuery="";
		$aFila=null;
		$bRet = false;
		if ($this->username=="")
			throw new Exception("User->searchById(): error de codificaci&oacute;n, faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "SELECT id, username, password, last_access, salt, fb_id, tw_id, type, status
					FROM app_user 
					WHERE username = '".$this->username;
				$aFila = $oAccesoDatos->ejecutarConsulta($sQuery);
				$oAccesoDatos->desconectar();
				if ($aFila){
					$this->id = $aFila[0][0];
					$this->username = $aFila[0][1];
					$this->password = $aFila[0][2];
					$this->lastAccess = $aFila[0][3];
					$this->salt = $aFila[0][4];
					$this->fb_id = $aFila[0][5];
					$this->tw_id = $aFila[0][6];
					$this->type = $aFila[0][7];
					$this->status = $aFila[0][8];
					$bRet = true;
				}
			}
		}
		return $bRet;
	}
	
	/*
	 * public function searchByFacebookId
	 * 
	 * Busca a un usuario mediante su id de facebook.
	 * 
	 * @return boolean $bRet false; si no existe el usuario
	 * @return boolean $bRet true; si existe el usuario
	 * 
	 */
	function searchByFacebookId(){
		$oAccesoDatos=new AccesoDatos();
		$sQuery="";
		$aFila=null;
		$bRet = false;
		if ($this->fb_id == "")
			throw new Exception("User->searchByFacebookId(): error de codificaci&oacute;n, faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "SELECT id, username, password, last_access, salt, fb_id, tw_id, type, status
					FROM app_user 
					WHERE fb_id = '".$this->fb_id;
				$aFila = $oAccesoDatos->ejecutarConsulta($sQuery);
				$oAccesoDatos->desconectar();
				if ($aFila){
					$this->id = $aFila[0][0];
					$this->username = $aFila[0][1];
					$this->password = $aFila[0][2];
					$this->lastAccess = $aFila[0][3];
					$this->salt = $aFila[0][4];
					$this->fb_id = $aFila[0][5];
					$this->tw_id = $aFila[0][6];
					$this->type = $aFila[0][7];
					$this->status = $aFila[0][8];
					$bRet = true;
				}
			}
		}
		return $bRet;
	}
	
	/*
	 * public function searchByTwitterId
	 * 
	 * Busca a un usuario mediante su id de Twitter.
	 * 
	 * @return boolean $bRet false; si no existe el usuario
	 * @return boolean $bRet true; si existe el usuario
	 * 
	 */
	function searchByTwitterId(){
		$oAccesoDatos=new AccesoDatos();
		$sQuery="";
		$aFila=null;
		$bRet = false;
		if ($this->tw_id == "")
			throw new Exception("User->searchByTwitterId(): error de codificaci&oacute;n, faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "SELECT id, username, password, last_access, salt, fb_id, tw_id, type, status
					FROM app_user 
					WHERE tw_id = '".$this->tw_id;
				$aFila = $oAccesoDatos->ejecutarConsulta($sQuery);
				$oAccesoDatos->desconectar();
				if ($aFila){
					$this->id = $aFila[0][0];
					$this->username = $aFila[0][1];
					$this->password = $aFila[0][2];
					$this->lastAccess = $aFila[0][3];
					$this->salt = $aFila[0][4];
					$this->fb_id = $aFila[0][5];
					$this->tw_id = $aFila[0][6];
					$this->type = $aFila[0][7];
					$this->status = $aFila[0][8];
					$bRet = true;
				}
			}
		}
		return $bRet;
	}
	
	/*
	 * public function insertFromWebsite
	 * 
	 * Permite insertar un usuario que se ha registrado mediante el formulario del sitio web.
	 * 
	 * @return $nAfectados int; regresa el valor de filas afectadas en la base de datos.
	 * 
	 */
	function insertFromWebsite(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->id=="" OR 
			$this->username == "" OR 
			$this->password == "" OR 
			$this->salt == "" OR
			$this->type == "")
			throw new Exception("User->insertFromWebsite(): error de codificaci&oacute;n, faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "INSERT INTO app_user (id, username, password, salt, type, status) 
					VALUES ('".$this->id."', '".
							   $this->username."', '".
							   $this->password."','".
							   $this->salt."','".
							   $this->type."','".
							   $this->status."')";
							   
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();	
			} 
		}
		return $nAfectados;
	}
	
	/*
	 * public function insertFromTwitter
	 * 
	 * Inserta un usuario mediante el uso del API de Twitter.
	 * Los datos los obtiene después de la autorización del Usuario a la aplicación.
	 * La aplicación web genera el id y salt automáticamente.
	 * La contraseña no es requerida.
	 * 
	 * @return $nAfectados int; regresa el valor de filas afectadas en la base de datos.
	 * 
	 */
	function insertFromTwitter(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->id=="" OR 
			$this->username == "" OR 
			$this->tw_id == "" OR 
			$this->salt == "")
			throw new Exception("User->insertFromTwitter(): error de codificaci&oacute;n, faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "INSERT INTO app_user (id, username, salt, tw_id, type, status) 
					VALUES ('".$this->id."', '".
							   $this->username."', '".
							   $this->salt."','".
							   $this->tw_id."','".
							   $this->type."','".
							   $this->status."')";
							   
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();	
			} 
		}
		return $nAfectados;
	}
	
	
	/*
	 * public function insertFromFacebook
	 * 
	 * Inserta un usuario mediante el uso del API de Facebook.
	 * Los datos los obtiene después de la autorización del Usuario a la aplicación.
	 * La aplicación web genera el id y salt automáticamente.
	 * La contraseña no es requerida.
	 * 
	 * @return $nAfectados int; regresa el valor de filas afectadas en la base de datos.
	 * 
	 */
	function insertFromFacebook(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->id=="" OR 
			$this->username == "" OR 
			$this->fb_id == "" OR 
			$this->salt == "")
			throw new Exception("User->insertFromFacebook(): error de codificaci&oacute;n, faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "INSERT INTO app_user(id, username, salt, fb_id, type, status) 
					VALUES ('".$this->id."', '".
							   $this->username."', '".
							   $this->salt."','".
							   $this->fb_id."','".
							   $this->type."','".
							   $this->status."')";
							   
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();	
			} 
		}
		return $nAfectados;
	}

	/*
	 * public function update
	 * 
	 * @return $nAfectados int; regresa el valor de filas afectadas en la base de datos.
	 * 
	 */
	function update(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->id=="")
			throw new Exception("User->update(): error de codificaci&oacute;n, faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "UPDATE app_user 
					SET username='".$this->username."', 
					password= '".$this->password."' , 
					last_access= '".$this->lastAccess."' , 
					salt= '".$this->salt."',
					fb_id= '".$this->fb_id."',
					tw_id= '".$this->tw_id."',
					type= '".$this->type."',
					status= '".$this->status."'
					WHERE id = '".$this->id."'";
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();
			} 
		}
		return $nAfectados;
	}

	/*
	 * public function delete
	 * 
	 * Elimina un usuario especificando su id
	 * @return $nAfectados int; regresa el valor de filas afectadas en la base de datos.
	 */
	function delete(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=null;
		if ($this->id=="")
			exit("User->borrar(): error de codificaci&oacute;n, faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "DELETE FROM app_user WHERE id = '".$this->id."'";
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();
			} 
		}
		return $nAfectados;
	}
	
	/*
	 * public function searchAll
	 * 
	 * Busca a todos los usuarios registrados en la base de datos.
	 * 
	 * @return $arrUsuarios array; el registro de los usuarios obtenidos de la base de datos.
	 */
	function searchAll(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$aFila=null;
	$aLineaUsu=null;
	$j=0;
	$oUsu=null;
	$arrUsuarios = null;
		if ($oAccesoDatos->conectar()){
		 	$sQuery = "SELECT id, username, password, last_access, salt, fb_id, tw_id, type, status
				FROM user_app 
				ORDER BY last_access";
			$aFila = $oAccesoDatos->ejecutarConsulta($sQuery);
			$oAccesoDatos->desconectar();
			if ($aFila){
				foreach($aFila as $aLineaUsu){
					$oUsu = new User();
					$oUsu->setId($aLineaUsu[0]);
					$oUsu->setUsername($aLineaUsu[1]);
					$oUsu->setPassword($aLineaUsu[2]);
					$oUsu->setLastAccess($aLineaUsu[3]);
					$oUsu->setSalt($aLineaUsu[4]);
					$oUsu->setFacebookId($aLineaUsu[5]);
					$oUsu->setTwitterId($aLineaUsu[6]);
					$oUsu->setType($aLineaUsu[7]);
					$oUsu->setStatus($aLineaUsu[8]);
            		$arrUsuarios[$j] = $oUsu;
					$j=$j+1;
				}
			} 
		}
		return $arrUsuarios;
	}
	
}
?>
