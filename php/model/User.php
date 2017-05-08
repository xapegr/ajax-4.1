<?php
/** User.php
 * Entity User
 * autor  Roberto Plana
 * version 2012/09
 */
 require_once "EntityInterface.php";
class User implements EntityInterface {
    private $id;
    private $name;
    private $surname1;
    private $nick;
    private $password;
    private $rol;
    private $address;
    private $telephone;
    private $mail;
    private $birthDate;
    private $entryDate;
    private $dropOutDate;
    private $active;
    private $image;

    //----------Data base Values---------------------------------------
    private static $tableName = "users";
    private static $colNameId = "id";
    private static $colNameName = "name";
    private static $colNameSurname1 = "surname1";
    private static $colNameNick = "nick";
    private static $colNamePassword = "password";
    private static $colNameRol = "rol";
    private static $colNameAddress = "address";
    private static $colNameTelephone = "telephone";
    private static $colNameMail = "mail";
    private static $colNameBirthDate = "birthDate";
    private static $colNameEntryDate = "entryDate";
    private static $colNameDropOutDate = "dropOutDate";
    private static $colNameActive = "active";
    private static $colNameImage = "image";

    function __construct() {
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname1() {
        return $this->surname1;
    }

    public function getNick() {
        return $this->nick;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getTelephone() {
        return $this->telephone;
    }

	public function getMail() {
        return $this->mail;
    }

    public function getBirthDate() {
        return $this->birthDate;
    }

    public function getEntryDate() {
        return $this->entryDate;
    }

    public function getDropOutDate() {
        return $this->dropOutDate;
    }

    public function getActive() {
        return $this->active;
    }

    public function getImage() {
        return $this->image;
    }


    public function setId($id) {
        $this->id = $id;
    }
    public function setName($name) {
        $this->name = $name;
    }

	public function setSurname1($surname1) {
        $this->surname1 = $surname1;
    }

    public function setNick($nick) {
        $this->nick = $nick;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

	public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setBirthDate($birthDate) {
        $this->birthDate = $birthDate;
    }

    public function setEntryDate($entryDate) {
        $this->entryDate = $entryDate;
    }

    public function setDropOutDate($dropOutDate) {
        $this->dropOutDate = $dropOutDate;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function setImage($image) {
		$this->image = $image;
    }

    public function getAll() {
		$data = array();
		$data["id"] = $this->id;
		$data["name"] = $this->name;
		$data["surname1"] = $this->surname1;
		$data["nick"] = $this->nick;
		$data["password"] = $this->password;
    $data["rol"] = $this->rol;
		$data["address"] = $this->address;
		$data["telephone"] = $this->telephone;
		$data["mail"] = $this->mail;
		$data["birthDate"] = $this->birthDate;
		$data["entryDate"] = $this->entryDate;
		$data["dropOutDate"] = $this->dropOutDate;
		$data["active"] = $this->active;
		$data["image"] = $this->image;

		return $data;
    }

    public function setAll($id, $name, $surname1, $nick, $password,$rol, $address, $telephone, $mail, $birthDate, $entryDate, $dropOutDate, $active, $image) {
		$this->setId($id);
		$this->setName($name);
		$this->setSurname1($surname1);
		$this->setNick($nick);
		$this->setPassword($password);
    $this->setRol($rol);
		$this->setAddress($address);
		$this->setTelephone($telephone);
		$this->setMail($mail);
		$this->setBirthDate($birthDate);
		$this->setEntryDate($entryDate);
		$this->setDropOutDate($dropOutDate);
		$this->setActive($active);
		$this->setImage($image);
    }

    public function toString() {
        $toString = "User[id=" . $this->id . "][name=" . $this->getName(). "][surname1=" . $this->getSurname1() . "][password=" . $this->password . "][rol=" . $this->rol ."][email=" . $this->mail . "]";
		return $toString;

    }
}
?>
