<?php

require_once 'config.php';

class Model{



    function __construct() {


    }


    function getAllModel() {

        global $conn;

        $arr_records = array();

        $sql = "SELECT sm_car_models.*,sm_manufacturer.Manufacturer as ManufacturerName FROM `sm_car_models` JOIN sm_manufacturer ON sm_manufacturer.MfId=sm_car_models.MfId  ORDER BY ModelId DESC ";

        $result = $conn->query($sql);

        $count = $result->rowCount();

        if (($result) && (($count) > 0)) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $arr_records[] = $row;

            }

        }

        return $arr_records;

    }

 

     function addModel($param,$file,$AdminId)

    {

       global $conn;

       $return = false;

        $ModelName = isset($param['ModelName']) ? trim($param['ModelName']) : null;
        $MfId = isset($param['MfId']) ? trim($param['MfId']) : null;
        $Color = isset($param['Color']) ? trim($param['Color']) : null;
        $MfYear = isset($param['MfYear']) ? trim($param['MfYear']) : null;
        $RegiNumber = isset($param['RegiNumber']) ? trim($param['RegiNumber']) : null;
        $Notes = isset($param['Notes']) ? trim($param['Notes']) : null;
        $file0 = (isset($file['image0']['name']) && $file['image0']['error'] == "0") ? $file['image0']['name'] : null;
        $file1 = (isset($file['image1']['name']) && $file['image1']['error'] == "0") ? $file['image1']['name'] : null;
        if (isset($file0)) {
            $ext0 = pathinfo($file0, PATHINFO_EXTENSION);
            $file00 = basename($file0, "." . $ext0);
            $file0 = "Image0" . time() . "0" . "." . $ext0;
        } else {
            $ext0 = "jpg";
        }

        if (($ext0 != "jpg" && $ext0 != "png" && $ext0 != "jpeg" && $ext0 != "gif")) {
            return $return;
        } else {
            if (isset($file0)) {
                move_uploaded_file($file["image0"]["tmp_name"], "uploads/" . $file0);
            }
        }
             if (isset($file1)) {
            $ext1 = pathinfo($file1, PATHINFO_EXTENSION);
            $file11 = basename($file1, "." . $ext1);
            $file1 = "Image1" . time() . "0" . "." . $ext1;
        } else {
            $ext1 = "jpg";
        }

        if (($ext1 != "jpg" && $ext1 != "png" && $ext1 != "jpeg" && $ext1 != "gif")) {
            return $return;
        } else {
            if (isset($file1)) {
                move_uploaded_file($file["image1"]["tmp_name"], "uploads/" . $file1);
            }
        }

       


  $sql="INSERT INTO `sm_car_models` ( `MfId`, `ModelName`, `Color`, `MfYear`, `RegistrationNumber`, `Note`, `Img1`, `Img2`, `IsActive`, `CreatedBy`, `CreatedOn`) VALUES ('$MfId', '$ModelName', '$Color', '$MfYear', '$RegiNumber', '$Notes', '$file0', '$file1', '1', '$AdminId',NOW())";

    $result = $conn->query($sql);
    $count = $result->rowCount();


          if (($result) && (($count) > 0)) {
      $return = true;

        }

              return $return;



}


    function getModelCount() {

        global $conn;

        $arr_records = array();

        $sql = "SELECT count(ModelId) as model_count From sm_car_models WHERE IsActive='1'";
        $result = $conn->query($sql);

        $count = $result->rowCount();

        if (($result) && (($count) > 0)) {

        $row = $result->fetch(PDO::FETCH_ASSOC);

                $arr_records = $row['model_count'];

            

        }

        return $arr_records;

    }



 
}


?>

