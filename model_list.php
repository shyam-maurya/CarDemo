<?php

include_once('classes/config.php');

$obj = new Admin();

if(!$obj->isUserLoggedIn()){

  header("Location: login.php");

}

 else

{

  $UserId = $_SESSION['UserId'];
}
$objMod = new Model();
$modelArr = $objMod->getAllModel();
?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title> Car Inventory | Model List</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1">



  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTables -->

  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

 <?php include_once('include/head.php');?>

 <?php include_once('include/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

        <a type="button" class="btn btn-info" href="add_model.php">Add Model</a>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="index.php">Home</a></li>

              <li class="breadcrumb-item active">Model List</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

        <div class="col-12">

            <div class="card card-info">

            <div class="card-header">

              <h3 class="card-title"> Model List</h3>

            </div>

            <!-- /.card-header -->

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">

                <thead>

                <tr>

                  <th>Sr. No.</th>

                  <th>Model Name</th>

                  <th>Model Name</th>

                  <th>Color </th>

                  <th>Manufacturer Year</th>

                  <th>Registration Number</th>

                </tr>

                </thead>

                <tbody>

                  <?php

                      $cnt=0;

                      foreach($modelArr as $key=>$val){

                        $cnt++;

                        ?>

                        <tr role="row" <?php if($cnt%2!=0){ echo "class="."odd";} else{ echo "class="."even";}?>>

                        <td><?php print $cnt;?></td>  

                         <td><?php print $val['ManufacturerName'];?></td>                           

                        <td><?php print $val['ModelName'];?></td> 

                         <td><?php print $val['Color'];?></td>                           

                        <td><?php print $val['MfYear'];?></td> 

                         <td><?php print $val['RegistrationNumber'];?></td>                           
                                                       

                        <?php 

                      }?>

              

                

                </tbody>

                <tfoot>

                <tr>

                  <th>Sr. No.</th>

             
                  <th>Model Name</th>

                  <th>Model Name</th>

                  <th>Color </th>

                  <th>Manufacturer Year</th>

                  <th>Registration Number</th>

                </tr>

                </tfoot>

              </table>

            </div>

            <!-- /.card-body -->

          </div>

          <!-- /.card -->

        </div>

        <!-- /.col -->

      </div>

      <!-- /.row -->

    </section>

    <!-- /.content -->

  </div>

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

<!-- Bootstrap 4 -->

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->

<script src="plugins/datatables/jquery.dataTables.min.js"></script>

<script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- SlimScroll -->

<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->

<script src="plugins/fastclick/fastclick.js"></script>

<!-- AdminLTE App -->

<script src="dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="dist/js/demo.js"></script>

<!-- page script -->

<script>

  $(function () {

    $("#example1").DataTable();

    $('#example2').DataTable({

      "paging": true,

      "lengthChange": false,

      "searching": false,

      "ordering": true,

      "info": true,

      "autoWidth": false

    });

  });
 
</script>

</body>

</html>

