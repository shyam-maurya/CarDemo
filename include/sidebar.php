  <?php 

$uri=$_SERVER['REQUEST_URI'];

$uriArr=explode('/',$uri);

//print_r($uriArr);

?>

  <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <a href="index.php" class="brand-link">

      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"

           style="opacity: .8">

      <span class="brand-text font-weight-light"> Car inventory </span>

    </a>


    <!-- Sidebar -->

    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="image">

          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

        </div>

        <div class="info">

          <a href="#" class="d-block"><?php echo $_SESSION['Name'];?></a>

        </div>

      </div>

 <!-- Sidebar Menu -->

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

  

          <li class="nav-item">

            <a href="index.php"  <?php if(isset($uriArr[1]) && !empty($uriArr[1]) && $uriArr[1]=='index.php'){?> class="nav-link active"<?php }else {?> class="nav-link" <?php }?>>

              <i class="nav-icon fa fa-dashboard"></i>

              <p>

                Dashboard

                <span class="right badge badge-danger"></span>

              </p>

            </a>

          </li>

       

         <li class="nav-item">

            <a href="manufacturer_list.php" <?php if(isset($uriArr[1]) && !empty($uriArr[1]) && $uriArr[1]=='manufacturer_list.php' ||  $uriArr[1]=='add_manufacturer.php'){?> class="nav-link active"<?php }else {?> class="nav-link" <?php }?>>

              <i class="nav-icon fa fa-car"></i>

              <p>

                Manufacturer

                <span class="right badge badge-danger"></span>

              </p>

            </a>

          </li>


             <li class="nav-item">

            <a href="model_list.php" <?php if(isset($uriArr[1]) && !empty($uriArr[1]) && $uriArr[1]=='model_list.php' ||  $uriArr[1]=='add_model.php'){?> class="nav-link active"<?php }else {?> class="nav-link" <?php }?>>

              <i class="nav-icon fa fa-arrows"></i>

              <p>

                Model

                <span class="right badge badge-danger"></span>

              </p>

            </a>

          </li>

            <li class="nav-item">

            <a href="inventory_list.php" <?php if(isset($uriArr[1]) && !empty($uriArr[1]) && $uriArr[1]=='inventory_list.php'){?> class="nav-link active"<?php }else {?> class="nav-link" <?php }?>>

              <i class="nav-icon fa fa-outdent"></i>

              <p>

                View Inventory

                <span class="right badge badge-danger"></span>

              </p>

            </a>

          </li>




        </ul>

      </nav>

      <!-- /.sidebar-menu -->

         </div>

    <!-- /.sidebar -->

  </aside>