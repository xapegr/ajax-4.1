<?php

//TODO CHANGE FOR THE APP
/**
* toDoClass class
* it controls the hole server part of the application
*/
require_once "ControllerInterface.php";
require_once "../model/Application.php";
require_once "../model/persist/ApplicationADO.php";


class AppControllerClass implements ControllerInterface {
	private $action;
	private $jsonData;

	function __construct($action, $jsonData) {
		$this->setAction($action);
		$this->setJsonData($jsonData);
	}

	public function getAction() {
		return $this->action;
	}

	public function getJsonData() {
		return $this->jsonData;
	}

	public function setAction($action) {
		$this->action = $action;
	}
	public function setJsonData($jsonData) {
		$this->jsonData = $jsonData;
	}

	public function doAction()
	{
		$outPutData = array();

		switch ( $this->getAction() )
		{
			case 10010:
				$outPutData = $this->insertApp();
				break;
			default:
				$errors = array();
				$outPutData[0]=false;
				$errors[]="Sorry, there has been an error. Try later";
				$outPutData[]=$errors;
				error_log("Action not correct in AppControllerClass, value: ".$this->getAction());
				break;
		}

		return $outPutData;
	}


	private function insertApp () {
		$appArray = json_decode(stripslashes($this->getJsonData()));
		$outPutData = array();
		$outPutData[]= true;
		$appIds = array();

		foreach ($appArray as $appObj) {
			$app = new Application();
			$app->setAll($appObj->id, $appObj->idUser, $appObj->position, $appObj->startDate, $appObj->web, $appObj->salary, $appObj->hobbies, $appObj->relocate, $appObj->reasons);
			$appIds[] =ApplicationADO::create($app);
		}

		$outPutData[] = $appIds;
		return $outPutData;
	}


}
?>
