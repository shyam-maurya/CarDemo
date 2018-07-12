<?php

require_once 'config.php';

class Inventory{



    function __construct() {


    }

    

    function getAllInventory() {

        global $conn;

        $arr_records = array();

   $sql = "SELECT sm_car_models.ModelId,sm_car_models.ModelName,count(sm_car_models.`ModelName`) as CarCount,sm_manufacturer.Manufacturer as ManufacturerName FROM `sm_car_models` JOIN sm_manufacturer ON sm_manufacturer.MfId=sm_car_models.MfId WHERE sm_car_models.IsActive='1' GROUP BY sm_car_models.ModelName";
        $result = $conn->query($sql);

        $count = $result->rowCount();

        if (($result) && (($count) > 0)) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $arr_records[] = $row;

            }

        }

        return $arr_records;

    }

     function getInventCount() {

        global $conn;

        $arr_records = array();

        $sql = "SELECT count(ModelId) as sold_count From sm_car_models WHERE IsActive='0'";
        $result = $conn->query($sql);

        $count = $result->rowCount();

        if (($result) && (($count) > 0)) {

        $row = $result->fetch(PDO::FETCH_ASSOC);

                $arr_records = $row['sold_count'];

            

        }

        return $arr_records;

    }

 

 



 
}



?>

