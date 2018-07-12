<?php

include_once('classes/config.php');

$obj = new Admin();

if(!$obj->isUserLoggedIn())

{

  header("Location: login.php");

  exit(0);                

}

else

{

  $UserId = $_SESSION['UserId'];



}
$objMod = new Model();
$objMan = new Manufacturer();


$manufacturerArr = $objMan->getAllManufacturer();



if(isset($_POST['submit']))

{

  if($objMod->addModel($_POST,$_FILES,$UserId))

  {

    $flag=true; 

    $msg="Model Added Successfully";  

  }

  else

  {

    $flag1=true;

    $msg="Something went wrong while adding the Model";



  }





}



?>

<!DOCTYPE html>

<html>
<style>
#imagePreview0, #imagePreview1, #imagePreview2, #imagePreview3 
{
  width: 180px;
  height: 180px;
  background-position: center center;
  background-size: cover;
  -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
  display: inline-block;
}
</style>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Car Inventory| Model</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="dist/css/adminlte.min.css">


  <!-- jvectormap -->

  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini">

  <div class="wrapper">



   <?php include_once('include/head.php');?>

   <?php include_once('include/sidebar.php'); ?>





   <!-- Content Wrapper. Contains page content -->

   <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

           <a type="button" class="btn btn-info" href="model_list.php">List Model</a>

         </div><!-- /.col -->

         <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="#">Home</a></li>

            <li class="breadcrumb-item active">Add Model</li>

          </ol>

        </div><!-- /.col -->

      </div><!-- /.row -->

    </div><!-- /.container-fluid -->

  </div>

  <!-- /.content-header -->



  <!-- Main content -->

  <section class="content">

    <div class="container-fluid">



      <!-- /.row -->

      <!-- Main row -->

      <div class="row">

        <div class="col-md-12">

          <?php if($flag){?>

            <div class="alert alert-success alert-dismissible">

              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

              <?php print $msg;?>

            </div>

          <?php } if($flag1){?>

            <div class="alert alert-danger alert-dismissible">

              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

              <?php print $msg;?>

            </div>

          <?php } if($flag2){?>

           <div class="alert alert-warning alert-dismissible">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <?php print $msg;?>

          </div>

        <?php } ?>







        <div class="card card-info">

          <div class="card-header">

            <h3 class="card-title">Add Model</h3>

          </div>

          <div class="card-body">

            <form class="form-horizontal" role="form" id="form_validation" method="post" enctype='multipart/form-data'>  

              <div class="row">

               <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_name">Manufacturer Name:</label>
                      <select class="form-control" name="MfId" style="width: 100%;" required="required">

                       <option value="">Select Manufacturer Name</option>

                       <?php



                       $cnt=0;



                       foreach($manufacturerArr as $key=>$val)



                        {?>                           

                          <option value="<?php print $val['MfId'];?>"><?php print $val['Manufacturer'];?></option>  

                          <?php 

                        }
                        ?> 

                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Model Name">Model Name:</label>
                      <input id="ModelName" type="text" name="ModelName" class="form-control" placeholder="Please enter model name" required="required" data-error="Model name is required."  onchange="return trim(this)" <?php if($flag1 || $flag2  || $flag3){

                      ?> <?php echo $_REQUEST['ModelName'];}?>>
                    </div>
                  </div>
                </div>


                <div class="form-group">

                  <label for="Color">Color:</label>

                  <input type="text" class="form-control" id="Color" placeholder="Write Your Color Here.." name="Color" required="required" onchange="return trim(this)"

                  <?php if($flag1 || $flag2  || $flag3){

                    ?> <?php echo $_REQUEST['Color'];}?>>
                  </div> 
                  <div class="form-group">

                    <label for="Manufacturing Year">Manufacturing Year:</label>

                    <input type="text" class="form-control" id="ManufacturingYear" placeholder="Write Manufacturing Year Here.." name="MfYear" required="required" onchange="return trim(this)"

                    <?php if($flag1 || $flag2  || $flag3){

                      ?> <?php echo $_REQUEST['MfYear'];}?>>

                    </div> 
                    <div class="form-group">

                      <label for="Registration Number">Registration Number:</label>

                      <input type="text" class="form-control" id="Registration Number" placeholder="Write Registration Number Here.." name="RegiNumber" required="" onchange="return trim(this)"

                      <?php if($flag1 || $flag2  || $flag3){

                        ?> <?php echo $_REQUEST['RegiNumber'];}?>>

                      </div> 
                      <div class="form-group">
                        <label>Notes:</label>
                        <textarea class="form-control" rows="3" name="Notes" placeholder="Enter Notes ..." onchange="return trim(this)"></textarea>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="Image1">Image1:</label>
                            <div id="imagePreview0"></div>
                            <br>
                            <input id="uploadFile0" type="file" name="image0" class="img" required="required">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="Image2">Image2:</label>
                            <div id="imagePreview1"></div>
                            <br>
                            <input id="uploadFile1" type="file" name="image1" class="img" required="required">
                          </div>
                        </div>
                      </div>

                      <div class="box-footer">

                       <div class="row">

                         <div class="col-md-10">

                          <a href="model_list.php" class="btn btn-default">Cancel</a>

                          <input type="submit" name="submit" class="btn btn-info pull-right" value="Submit" id="submitBt">

                        </div>

                      </div>

                    </div>  

                    <!-- /.form-group -->

                  </div>

                  <!-- /.col -->

                  <!-- /.col -->

                </div>

              </form>       



            </div>





          </div>

        </div>



      </div>

      <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->

  </section>

  <!-- /.content -->

</div>

<!-- /.content-wrapper -->

<?php include_once('include/footer.php');?>



<!-- Control Sidebar -->

<aside class="control-sidebar control-sidebar-dark">

  <!-- Control sidebar content goes here -->

</aside>

<!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->



<!-- jQuery -->

<script src="plugins/jquery/jquery.min.js"></script>

<script>
  $(function() {

    $("#uploadFile0").on("change", function()

    {

      var files = !!this.files ? this.files : [];

      if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support



      if (/^image/.test( files[0].type)){ // only image file

        var reader = new FileReader(); // instance of the FileReader

        reader.readAsDataURL(files[0]); // read the local file



        reader.onloadend = function(){ // set image data as background of div

          $("#imagePreview0").css("background-image", "url("+this.result+")");

        }

      }

    });

    $("#uploadFile1").on("change", function()

    {

      var files = !!this.files ? this.files : [];

      if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support



      if (/^image/.test( files[0].type)){ // only image file

        var reader = new FileReader(); // instance of the FileReader

        reader.readAsDataURL(files[0]); // read the local file



        reader.onloadend = function(){ // set image data as background of div

          $("#imagePreview1").css("background-image", "url("+this.result+")");

        }

      }

    });

  }); 


  function trim(el) {
    el.value = el.value.
                        replace(/(^\s*)|(\s*$)/gi, "").// removes leading and trailing spaces
                        replace(/[ ]{2,}/gi, " ").// replaces multiple spaces with one space 
                        replace(/\n +/, "\n"); // Removes spaces after newlines
                      }
                      function numbersonly(e) {
                        var unicode = e.charCode ? e.charCode : e.keyCode
                if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
                    if (unicode < 48 || unicode > 57) //if not a number
                        return false //disable key press
                    }
                  }

                </script>

              </body>

              </html>

