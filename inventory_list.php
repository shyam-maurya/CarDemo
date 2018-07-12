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
$objInv = new Inventory();

$inventoryArr = $objInv->getAllInventory();

?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Car Demo | Iventory List</title>

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


          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="index.php">Home</a></li>

              <li class="breadcrumb-item active">Inventory List</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

        <div class="col-12">



          <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" data-backdrop="static" data-keyboard="false">

           <div class="modal-dialog modal-lg"> 

            <div class="modal-content"> 



             <div class="modal-header"> 

               <h4 class="modal-title">

                <i class="glyphicon glyphicon-history"></i> Models Details

              </h4> 
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 



            </div> 

            <div class="modal-body"> 




             <!-- content will be load here -->                          

             <div id="dynamic-content"></div>



           </div> 

           <div class="modal-footer">
            <button type="button" class="btn btn-block btn-outline-primary btn-lg" onclick="UpdateCarDetails()" style="margin-right: 450px;">Sold Car </button>
            <button type="button" class="btn btn-block btn-outline-secondary btn-lg" data-dismiss="modal">Close</button>  

          </div> 



        </div> 

      </div>

    </div> 





    <div class="card card-info">

      <div class="card-header">

        <h3 class="card-title"> Inventory List</h3>

      </div>

      <!-- /.card-header -->

      <div class="card-body">

        <table id="example1" class="table table-bordered table-striped">

          <thead>

            <tr>

              <th>Sr. No.</th>
              <th>Manufacturer Name</th>

              <th>Model Name</th>



              <th>Count</th>
              <th>View</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $cnt=0;

            foreach($inventoryArr as $key=>$val){

              $cnt++;

              ?>

              <tr role="row" <?php if($cnt%2!=0){ echo "class="."odd";} else{ echo "class="."even";}?>>

                <td><?php print $cnt;?></td>  
                <td>  <a data-original-title="View Options" data-toggle="modal" data-target="#view-modal" href="#my_modal" data-id="<?php echo $val['ModelId'];?>" id="getDetails" >  <?php print $val['ManufacturerName'];?> </a></td>    

                <td><?php print $val['ModelName'];?></td>                           

                <td><?php print $val['CarCount'];?></td> 



                <td><a class="btn btn-success" data-original-title="View Options" data-toggle="modal" data-target="#view-modal" href="#my_modal" data-id="<?php echo $val['ModelId'];?>" id="getDetails" > <i class="fa fa-eye"></i></a></td>                                                                    



                <?php 

              }?>

              



            </tbody>

            <tfoot>

              <tr>

                <th>Sr. No.</th>

                <th>Manufacturer Name</th>

                <th>Model Name</th>

                <th>Count</th>

                <th>View</th>

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



<script>

  $(document).ready(function(){



    $(document).on('click', '#getDetails', function(e){



      e.preventDefault();



        var uid = $(this).data('id');   // it will get id of clicked row

        //alert(uid);



        $.ajax({

          type: "POST",

          url: "ajax.php?action=modelDetails",

          data: {uid: uid},

          success: function (result)

          {

            $('#dynamic-content').html(result);

          }

        });

        

      });

    

  });


  function UpdateCarDetails() {

    var uid = $("#ModelIdd").val();

    $.ajax({

      type: "POST",

      url: "ajax.php?action=soldCar",

      data: {uid: uid},

      success: function (result)

      {

       $("#view-modal").modal("hide");
       location.reload();

     }

   });
  }

</script>

</body>

</html>

