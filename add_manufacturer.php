<?php
include_once('classes/manufacturer.php');

$obj = new Admin();

$objMan = new Manufacturer();


if(!$obj->isUserLoggedIn())

{

  header("Location: login.php");

  exit(0);                

}

else

{

  $UserId = $_SESSION['UserId'];



}


if(isset($_POST['submit']))

{


 if(!$objMan->chkManufacturerExists($_POST,$UserId))
    {
  if($objMan->addManufacturer($_POST,$UserId))

  {

    $flag=true; 

    $msg="Manufacturer Added Successfully";  

  }

  else

  {

    $flag1=true;

    $msg="Something went wrong while adding the Manufacturer";



  }
}
else
    {
      $flag2=true;
      $msg="This Manufacturer already exists.";
    }





}



?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Manufacturer | Add Manufacturer</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="dist/css/adminlte.min.css">



  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



    <!-- Select2 -->

  <link rel="stylesheet" href="plugins/select2/select2.min.css">

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

           <a type="button" class="btn btn-info" href="manufacturer_list.php">List Manufacturer</a>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Add Manufacturer</li>

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

                <h3 class="card-title">Add Manufacturer</h3>

              </div>

              

              <!-- /.card-header -->

              <!-- form start -->









              <!-- /.box-header -->

              <div class="card-body">

                <form class="form-horizontal" role="form" method="post" enctype='multipart/form-data'>  

                  <div class="row">

                    <div class="col-md-6">


                               
                        <div class="box-footer">

                         <div class="row">

                           <div class="col-md-10">
                             <div class="form-group">

                        <label for="Manufacturer Name">Manufacturer Name:</label>

                        <input type="text" class="form-control"  placeholder="Manufacturer Name" name="MfName" required="" onchange="return trim(this)"

                        <?php if($flag1 || $flag2  || $flag3){

                          ?> <?php echo $_POST['MfName'];}?>>

                        </div> 

                            <a href="manufacturer_list.php" class="btn btn-default">Cancel</a>

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

<!-- jQuery UI 1.11.4 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>

  $.widget.bridge('uibutton', $.ui.button)

</script>

<!-- Bootstrap 4 -->

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Morris.js charts -->

<script src="plugins/morris/morris.min.js"></script>





<!-- Slimscroll -->

<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->

<script src="plugins/fastclick/fastclick.js"></script>

<!-- AdminLTE App -->

<script src="dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="dist/js/pages/dashboard.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="dist/js/demo.js"></script>
<script type="text/javascript">
  

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

