<?php

include_once('classes/config.php');
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'modelDetails')
 {
     
    
    $ModelId = $_REQUEST['uid'];
     $sql="SELECT sm_car_models.*,sm_manufacturer.Manufacturer as ManufacturerName FROM sm_car_models JOIN sm_manufacturer ON sm_manufacturer.MfId=sm_car_models.MfId WHERE sm_car_models.ModelId='$ModelId'";

    $result = $conn->query($sql);
    if(($result) && ($result->rowCount() > 0))
    {
          $row =$result->fetch(PDO::FETCH_ASSOC);

          $img1='uploads/'.$row['Img1'];
           $img2='uploads/'.$row['Img2'];
           

            $html_data .="<input type='hidden'  id='ModelIdd' name='ModelIdd' value='$ModelId'>";


               $html_data .= " <center> <div class='col-sm-6'>
                          <div class='row'>
                            <div class='col-sm-6'>
                              <img class='img-fluid mb-3' src=".$img1." alt='Photo'>
                            </div>
                            <div class='col-sm-6'>
                            <img class='img-fluid mb-3' src=".$img2." alt='Photo'>

                             </div>
                      
                          </div>
                          
                        </div></center>";
                      
     $html_data .= "<div style='overflow-x:auto;'>
                     <table  class='table table-bordered table-striped'>
                      <thead>
                      <tr>
                      <th>Manufacturer Name</th>
                      <th>Model Name</th>
                      <th>Color </th>
                      <th>Manufacturer Year</th>
                      <th>Registration Number</th>
                      <th>Notes</th>
                     
              </tr>
        </thead>
        <tbody>";


      

         $html_data .= "<tr>";
         $html_data .= "<td >" . $row['ManufacturerName'] . "</td>";
         $html_data .= "<td >" . $row['ModelName'] . "</td>";
         $html_data .= "<td >" . $row['Color'] . "</td>";
         $html_data .= "<td >" . $row['MfYear'] . "</td>";
         $html_data .= "<td >" . $row['RegistrationNumber'] . "</td>";
         $html_data .= "<td >" . $row['Note'] . "</td>";




         $html_data .= "</tr>";
    
    $html_data .= "</tbody></table></div>";
    echo $html_data;
              
               
            
    }
    else
    {
        echo "No data Available";
    }
 }

 else if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'soldCar') {
    $ModelId = $_REQUEST['uid'];

    $return = "fail";
     $query = "UPDATE `sm_car_models` set `IsActive`= '0' where `ModelId`='" . $ModelId . "'";
    $result = $conn->query($query);
    if ($result) {
        $return = "success";
    }
    echo $return;
}





?>
