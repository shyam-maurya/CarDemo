<?php

require_once 'config.php';

class Manufacturer{



    function __construct() {


    }

     function chkManufacturerExists($param) {

        $MfName = isset($param['MfName']) ? $param['MfName'] : null;



        global $conn;

        $return = false;



        $sql = "SELECT * FROM `sm_manufacturer` WHERE `Manufacturer` = '" . $MfName . "'";

        $result = $conn->query($sql);

        if (($result) && ($result->rowCount() > 0)) {

            $return = true;

        }

        return $return;

    }

    function getAllManufacturer() {

        global $conn;

        $arr_records = array();

        $sql = "SELECT * FROM `sm_manufacturer` ORDER BY MfId DESC ";

        $result = $conn->query($sql);

        $count = $result->rowCount();

        if (($result) && (($count) > 0)) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $arr_records[] = $row;

            }

        }

        return $arr_records;

    }

 

     function addManufacturer($param,$AdminId)

    {

       global $conn;

       $return = false;

       $MfName=htmlspecialchars($param['MfName']);

    $sql="INSERT INTO `sm_manufacturer` (`Manufacturer`, `IsActive`, `CreatedBy`, `CreatedOn`) VALUES ('$MfName', '1', '$AdminId',NOW())";

    $result = $conn->query($sql);
    $count = $result->rowCount();


          if (($result) && (($count) > 0)) {
      $return = true;

        }

              return $return;



}


     function deleteManufacturer($id) {

        global $conn;

        $return = false;

        $sql = "DELETE FROM `sm_manufacturer` WHERE `MfId`='$id'";

        $result = $conn->query($sql);

        if ($result) {

        	     	

            $return = true;

        }

        return $return;

    }


    function getManfCount() {

        global $conn;

        $arr_records = array();

        $sql = "SELECT count(MfId) as mf_count From sm_manufacturer WHERE IsActive='1'";
        $result = $conn->query($sql);

        $count = $result->rowCount();

        if (($result) && (($count) > 0)) {

        $row = $result->fetch(PDO::FETCH_ASSOC);

                $arr_records = $row['mf_count'];

            

        }

        return $arr_records;

    }

 
}




if (isset($_GET['act']) && $_GET['act'] == 'deleteManufacturer') {



    $objMan = new Manufacturer();



    if ($objMan->deleteManufacturer($_GET['id'])) {



        header('Location: ../manufacturer_list.php?success_delete');

    } else {



        header('Location: ../manufacturer_list.php?failure_delete');

    }

}

?>

