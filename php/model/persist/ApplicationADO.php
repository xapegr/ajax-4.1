<?php
/** userClass.php
* Entity userClass
* autor  Roberto Plana
* version 2012/09
*/
require_once "BDcompany.php";
require_once "EntityInterfaceADO.php";


class ApplicationADO implements EntityInterfaceADO {

  //----------Data base Values---------------------------------------
  private static $tableName = "EmpApp";
  private static $colNameId = "id";
  private static $colNameIdUser = "idUser";
  private static $colNamePosition = "position";
  private static $colNameStartDate = "startDate";
  private static $colNameWeb = "web";
  private static $colNameSalary = "salary";
  private static $colNameHobbies = "hobbies";
  private static $colNameRelocate = "relocate";
  private static $colNameReasons = "reasons";


  //---Databese management section-----------------------
  /**
  * fromResultSetList()
  * this function runs a query and returns an array with all the result transformed into an object
  * @param res query to execute
  * @return objects collection
  */
  public static function fromResultSetList( $res ) {
    $entityList = array();
    $i=0;
    //while ( ($row = $res->fetch_array(MYSQLI_BOTH)) != NULL ) {
    foreach ( $res as $row)
    {
      //We get all the values an add into the array
      $entity = ApplicationADO::fromResultSet( $row );

      $entityList[$i]= $entity;
      $i++;
    }
    return $entityList;
  }

  /**
  * fromResultSet()
  * the query result is transformed into an object
  * @param res ResultSet del qual obtenir dades
  * @return object
  */
  public static function fromResultSet( $res ) {
    //We get all the values form the query
    $id = $res[ ApplicationADO::$colNameId];
    $idUser = $res[ ApplicationADO::$colNameIdUser ];
    $position = $res[ ApplicationADO::$colNamePosition ];
    $startDate = $res[ ApplicationADO::$colNameStartDate ];
    $web = $res[ ApplicationADO::$colNameWeb ];
    $salary = $res[ ApplicationADO::$colNameSalary ];
    $hobbies = $res[ ApplicationADO::$colNameHobbies ];
    $relocate = $res[ ApplicationADO::$colNameRelocate ];
    $reasons = $res[ ApplicationADO::$colNameReasons ];

    //Object construction
    $entity = new Application();
    $entity->setId($id);
    $entity->setIdUser($idUser);
    $entity->setPosition($position);
    $entity->setStartDate($startDate);
    $entity->setWeb($web);
    $entity->setSalary($salary);
    $entity->setRelocate($hobbies);
    $entity->setReasons($reasons);

    return $entity;
  }

  /**
  * findByQuery()
  * It runs a particular query and returns the result
  * @param cons query to run
  * @return objects collection
  */
  public static function findByQuery( $cons, $vector ) {
    try {
      $conn = DBConnect::getInstance();
    }
    catch (PDOException $e) {
      echo "Error executing query.";
      error_log("Error executing query in ApplicationADO: " . $e->getMessage() . " ");
      die();
    }

    //Run the query
    $res = $conn->execution($cons, $vector);

    return ApplicationADO::fromResultSetList( $res );
  }

  /**
  * findById()
  * It runs a query and returns an object array
  * @param id
  * @return object with the query results
  */
  public static function findById( $film ) {
    $cons = "select * from `".ApplicationADO::$tableName."` where ".ApplicationADO::$colNameId." = ?";
    $arrayValues = [$film->getId()];

    return ApplicationADO::findByQuery( $cons, $arrayValues );
  }




  /**
  * findAll()
  * It runs a query and returns an object array
  * @param none
  * @return object with the query results
  */
  public static function findAll() {
    $cons = "select * from `".ApplicationADO::$tableName."`";
    return ApplicationADO::findByQuery( $cons, [] );
  }


  /**
  * create()
  * insert a new row into the database
  */
  public function create($app) {
    //Connection with the database
    try {
      $conn = DBConnect::getInstance();
    }
    catch (PDOException $e) {
      echo "Error connecting database: " . $e->getMessage() . " ";
      error_log("Error in create in ApplicationADO: " . $e->getMessage() . " ");
      die();
    }

    $cons="insert into ".ApplicationADO::$tableName." (`idUser`,`position`,`startDate`,`web`,`salary`,`relocate`,`reasons`) values (?, ?, ?, ?, ?, ?, ?)" ;
    $arrayValues= [$app->getIdUser(),$app->getPosition(), $app->getStartDate(), $app->getWeb(), $app->getSalary(), ((int) $app->getRelocate()), ((int) $app->getReasons())];

    $id = $conn->executionInsert($cons, $arrayValues);

    $app->setId($id);

    return $app->getId();
  }

  /**
  * delete()
  * it deletes a row from the database
  */
  public function delete($film) {
    //Connection with the database
    try {
      $conn = DBConnect::getInstance();
    }
    catch (PDOException $e) {
      echo "Error connecting database: " . $e->getMessage() . " ";
      error_log("Error in delete in ApplicationADO: " . $e->getMessage() . " ");
      die();
    }


    $cons="delete from `".ApplicationADO::$tableName."` where ".ApplicationADO::$colNameId." = ?";
    $arrayValues= [$film->getId()];

    $conn->execution($cons, $arrayValues);
  }


  /**
  * update()
  * it updates a row of the database
  */
  public function update($film) {
    //Connection with the database
    try {
      $conn = DBConnect::getInstance();
    }
    catch (PDOException $e) {
      print "Error connecting database: " . $e->getMessage() . " ";
      die();
    }

    $cons="update `".ApplicationADO::$tableName."` set ".ApplicationADO::$colNameIdUser." = ?,".ApplicationADO::$colNamePosition." = ?,".ApplicationADO::$colNameStartDate." = ?,".
    ApplicationADO::$colNameWeb." = ?, ".ApplicationADO::$colNameSalary." = ?, ".ApplicationADO::$colNameHobbies." = ?, ".ApplicationADO::$colNameReasons." = ? where ".ApplicationADO::$colNameId." = ?";
    $arrayValues= [$film->getIdUser(),$film->getPosition(), $film->getStartDate(), $film->getWeb(), $film->getSalary(), ((int) $film->getRelocate()), ((int) $film->getReasons()), $film->getId()];

    $conn->execution($cons, $arrayValues);

  }
}
?>
