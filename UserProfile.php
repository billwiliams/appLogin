<?php
error_reporting(E_ALL);
include_once ("config/AccesoDatos.php");
class UserProfile {
    private $id = '';
    private $first_name = '';
    private $last_name = '';
    private $about_me = '';
    private $url_img = '';
    private $phone_number = '';
    private $address = '';
    private $birthday = '';
    private $country = '';
    private $gender = '';

    /*
     * Setter methods
     */
    public function setId($id) {
        $this -> id = $id;
    }

    public function setFirstName($first_name) {
        $this -> first_name = $first_name;
    }

    public function setLastName($last_name) {
        $this -> last_name = $last_name;
    }

    public function setAboutMe($about_me) {
        $this -> about_me = $about_me;
    }

    public function setUrlImg($url_img) {
        $this -> url_img = $url_img;
    }

    public function setPhoneNumber($phone_number) {
        $this -> phone_number = $phone_number;
    }

    public function setAddress($address) {
        $this -> address = $address;
    }

    public function setBirthday($birthday) {
        $this -> birthday = $birthday;
    }

    public function setCountry($country) {
        $this -> country = $country;
    }

    public function setGender($gender) {
        $this -> gender = $gender;
    }

    /*
     * Getter methods
     */
    public function getId() {
        return $this -> id;
    }

    public function getFirstName() {
        return $this -> first_name;
    }

    public function getLastName() {
        return $this -> last_name;
    }

    public function getAboutMe() {
        return $this -> about_me;
    }

    public function getUrlImg() {
        return $this -> url_img;
    }

    public function getPhoneNumber() {
        return $this -> phone_number;
    }

    public function getAddress() {
        return $this -> address;
    }

    public function getBirthday() {
        return $this -> birthday;
    }

    public function getCountry() {
        return $this -> country;
    }

    public function getGender() {
        return $this -> gender;
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
    function searchById() {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $aFila = null;
        $bRet = false;
        if ($this -> id == "")
            throw new Exception("UserProfile->searchById(): error de codificaci&oacute;n, faltan datos");
        else {
            if ($oAccesoDatos -> conectar()) {
                $sQuery = "SELECT id, first_name, last_name, about_me, url_img, phone_number, address, birthday, country, gender
                    FROM app_user_profile 
                    WHERE id = '" . $this -> id . "'";
                $aFila = $oAccesoDatos -> ejecutarConsulta($sQuery);
                $oAccesoDatos -> desconectar();
                if ($aFila) {
                    $this -> id = $aFila[0][0];
                    $this -> first_name = $aFila[0][1];
                    $this -> last_name = $aFila[0][2];
                    $this -> about_me = $aFila[0][3];
                    $this -> url_img = $aFila[0][4];
                    $this -> phone_number = $aFila[0][5];
                    $this -> address = $aFila[0][6];
                    $this -> birthday = $aFila[0][7];
                    $this -> country = $aFila[0][8];
                    $this -> gender = $aFila[0][9];
                    $bRet = true;
                }
            }
        }
        return $bRet;
    }

    /*
     * public function insert
     *
     * Permite insertar el perfil de un usuario que se ha registrado.
     *
     * @return $nAfectados int; regresa el valor de filas afectadas en la base de datos.
     *
     */
    function insert() {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = -1;
        if ($this -> id == "" OR 
            $this -> first_name == "" OR 
            $this -> last_name == "")
            throw new Exception("UserProfile->insert(): error de codificaci&oacute;n, faltan datos");
        else {
            if ($oAccesoDatos -> conectar()) {
                $sQuery = "INSERT INTO app_user_profile (id, first_name, last_name, about_me, url_img, phone_number, address, birthday, country, gender) 
                    VALUES ('" . $this -> id . "', 
                            '" . $this -> first_name . "', 
                            '" . $this -> last_name . "',
                            '" . $this -> about_me . "',
                            '" . $this -> url_img . "',
                            '" . $this -> phone_number . "',
                            '" . $this -> address . "',
                            '" . $this -> birthday . "',
                            '" . $this -> country . "',
                            '" . $this -> gender . "')";

                $nAfectados = $oAccesoDatos -> ejecutarComando($sQuery);
                $oAccesoDatos -> desconectar();
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
    function update() {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = -1;
        if ($this -> id == "" OR 
            $this -> first_name == "" OR 
            $this -> last_name == "")
            throw new Exception("UserProfile->update(): error de codificaci&oacute;n, faltan datos");
        else {
            if ($oAccesoDatos -> conectar()) {
                $sQuery = "UPDATE app_user 
                        SET first_name = '" . $this -> first_name . "', 
                             last_name = '" . $this -> last_name . "',
                              about_me = '" . $this -> about_me . "',
                               url_img = '" . $this -> url_img . "',
                          phone_number = '" . $this -> phone_number . "',
                               address = '" . $this -> address . "',
                              birthday = '" . $this -> birthday . "',
                               country = '" . $this -> country . "',
                                gender = '" . $this -> gender . "'
                              WHERE id = '" . $this -> id . "'";

                $nAfectados = $oAccesoDatos -> ejecutarComando($sQuery);
                $oAccesoDatos -> desconectar();
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
    function delete() {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = null;
        if ($this -> id == "")
            exit("UserProfile->delete(): error de codificaci&oacute;n, faltan datos");
        else {
            if ($oAccesoDatos -> conectar()) {
                $sQuery = "DELETE FROM app_user_profile WHERE id = '" . $this -> id . "'";
                $nAfectados = $oAccesoDatos -> ejecutarComando($sQuery);
                $oAccesoDatos -> desconectar();
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
    function searchAll() {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $aFila = null;
        $aLineaUsu = null;
        $j = 0;
        $oUserProfile = null;
        $arrUserProfile = null;
        if ($oAccesoDatos -> conectar()) {
            $sQuery = "SELECT id, first_name, last_name, about_me, url_img, phone_number, address, birthday, country, gender
                FROM user_app_profile";
            $aFila = $oAccesoDatos -> ejecutarConsulta($sQuery);
            $oAccesoDatos -> desconectar();
            if ($aFila) {
                foreach ($aFila as $aLineaUsu) {
                    $oUserProfile = new UserProfile();

                    $oUserProfile -> setId($aLineaUsu[0]);
                    $oUserProfile -> setFirstName($aLineaUsu[1]);
                    $oUserProfile -> setLastName($aLineaUsu[2]);
                    $oUserProfile -> setAboutMe($aLineaUsu[3]);
                    $oUserProfile -> setUrlImg($aLineaUsu[4]);
                    $oUserProfile -> setPhoneNumber($aLineaUsu[5]);
                    $oUserProfile -> setAddress($aLineaUsu[6]);
                    $oUserProfile -> setBirthday($aLineaUsu[7]);
                    $oUserProfile -> setCountry($aLineaUsu[8]);
                    $oUserProfile -> setGender($aLineaUsu[9]);

                    $arrUserProfile[$j] = $oUserProfile;
                    $j = $j + 1;
                }
            }
        }
        return $arrUserProfile;
    }

}
?>