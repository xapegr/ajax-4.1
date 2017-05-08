<?php
/** directorClass.php
 * Entity directorClass
 * autor  Roberto Plana
 * version 2012/09
 */
require_once "EntityInterface.php";

class Application implements EntityInterface {
    private $id;
    private $idUser;
    private $position;
    private $startDate;
    private $web;
    private $salary;
    private $hobbies;//array with hobbies selected
    private $relocate;
    private $reasons;

    function __construct() {
    }

    public function getId() {
        return $this->id;
    }

    public function getIdUser() {
        return $this->idFilmType;
    }

    public function getPosition() {
        return $this->idDirector;
    }

    public function getStartDate() {
        return $this->name;
    }

    public function getWeb() {
        return $this->price;
    }

    public function getSalary() {
        return $this->image;
    }

    public function getHobbies() {
        return $this->inSale;
    }

    public function getRelocte() {
        return $this->rented;
    }

	public function getReasons() {
        return $this->reviews;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function setWeb($web) {
        $this->web = $web;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function setHobbies($hobbies) {
        $this->hobbies = $hobbies;
    }

    public function setRelocte($relocate) {
        $this->relocate = $relocate;
    }

    public function setReasons($reasons) {
        $this->reasons = $reasons;
    }

    public function getAll() {
		$data = array();
		$data["id"] = $this->id;
		$data["idUser"] = $this->idUser;
		$data["position"] = $this->position;
		$data["startDate"] = $this->startDate;
		$data["web"] = $this->web;
		$data["salary"] = $this->salary;
		$data["hobbies"] = $this->hobbies;
		$data["relocate"] = $this->relocate;
    $data["reasons"] = $this->reasons;


    //TODO caution about hobbies


		return $data;
    }

    public function setAll($id, $idUser, $position, $startDate, $web, $salary, $hobbies, $relocate, $reasons) {
		$this->setId($id);
		$this->setIdFilmType($idUser);
		$this->setIdDirector($position);
		$this->setName($startDate);
		$this->setPrice($web);
		$this->setImage($salary);
		$this->setInSale($hobbies);
		$this->setRented($relocate);
		$this->setReviews($reasons);
    }

    public function toString() {
        $toString = "App[id=" . $this->id . "][idUser=" . $this->idUser . "][position=" . $this->position . "][startDate=" . $this->startDate . "][web=" . $this->web . "][salary=" . $this->salary . "][hobbies=" . $this->hobbies . "][relocate=" . $this->relocate . "][reasons= ".$this->reasons."]";
		return $toString;
    }
}
?>
