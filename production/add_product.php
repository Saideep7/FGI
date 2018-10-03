<?php
//include('defend.php');
include("../conn/conn.php");

 $message_alert = '';
//Adding CC Details
  if(isset($_POST['add_cc'])) {

    $cc_name = mysqli_real_escape_string($con, $_POST['cc_name']);
    $ps1= $_POST['cc_password'];
	$ps2=$_POST['cc_cpassword'];
	if($ps1!=$ps2)
	  {
		$message_alert = '
        <div class="alert alert-danger">
          <strong>Oops!</strong> passwords doesnot match!<br>
		  </div>';
	  }

	else
	  {
	$cpsw=$ps1;//encryption needed
	$cc_password=mysqli_real_escape_string($con, $cpsw);
    $um_name = mysqli_real_escape_string($con, $_POST['um_name']);
    $um_ph = mysqli_real_escape_string($con, $_POST['um_ph']);
    $dealer = mysqli_real_escape_string($con, $_POST['dealer']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $district = mysqli_real_escape_string($con, $_POST['district']);
    $pin = mysqli_real_escape_string($con, $_POST['pin']);
    $role='cc';

    $query_add_cc = "INSERT INTO only_cc(dealer,state,cc_name,um_name,um_ph,pincode,district) VALUES('$dealer','$state','$cc_name','$um_name','$um_ph','$pin','$district')";

    $query_user_login = "INSERT INTO user_login(user_name,password,role) VALUES('$cc_name','$cc_password','$role')";

    if (mysqli_query($con, $query_add_cc)) {


      if (mysqli_query($con, $query_user_login)) {
        $message_alert = '
        <div class="alert alert-success">
          <strong>Success!</strong> CC Successfully Added!<br>
          <strong>Success!</strong> User Logins Created Successfully!<br>
        </div>';
      }

    } else {
      $message_alert = '
      <div class="alert alert-danger">
        <strong>Error!</strong> Data Updation Failed!
      </div>';
    }
	  }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/bc2.ico" type="image/ico" />

    <title>DairyPro Feed | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="admin_dashboard.php" class="site_title"><img src="images/bc2.ico"/ width="60px"> <span>DairyPro feed</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3></h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="admin_dashboard.php">Dashboard</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Add Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_cc.php">Add cc </a></li>
                      <li><a href="add_vlcc.php">Add Vlcc</a></li>
                      <li><a href="add_rs.php">Add Rs </a></li>
                    </ul>
                  </li>
                  <li><a href="add_product.php"><i class="fa fa-stack-overflow"></i>Add Products <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a id="clickmusers" href="manage_users.php"><i class="fa fa-user-times"></i>Manage Users <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="manage_products.php"><i class="fa fa-pencil"></i>Manage Products <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="manage_orders.php"><i class="fa fa-shopping-basket"></i>Manage orders <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="manage_invoices.php"><i class="fa fa-file"></i>Manage Invoices <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="manage_incentives.php"><i class="fa fa-money"></i>Manage Incentives <span class="fa fa-chevron-down"></span></a>
                  </li>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Elements</h3>
              </div>
            </div>
            <div class="clearfix"></div>

              <div class="content-wrapper">
                <div class="container-fluid">
                  <!-- Breadcrumbs-->
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Add User</a>
                    </li>
                    <li class="breadcrumb-item active">Add a new Product</li>
                  </ol>
                   <div class="col" id="notification">
                                <?php echo $message_alert; ?>
                            </div>
                <div style="width:60%;margin-left:20px;" >
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                      <div class="form-group">
                            <label for="exampleInputName">Product name</label>
                            <input class="form-control" id="exampleInputName" name="cc_name" type="text" aria-describedby="nameHelp" placeholder="Enter CC name">
                      </div>


            <div class="form-group">
                                      <label for="dealer">Product category</label>
                                      <select id="dealer" class="form-control" name="dealer">
                                        <option selected>Choose...</option>
                                        <option value="Doodla">farm feed</option>
                                        <option value="Hatsan">other</option>

                                      </select>
                                    </div>
            						<div class="form-group">
                                      <label for="state">Quantity</label>
                                    <input class="form-control" id="exampleInputName"
                                    name="qty" type="text" aria-describedby="nameHelp"
                                    placeholder="Product Quantity">
                                    </div>

                                    <div class="form-group">
                                      <label for="district">Ex_factory_cost</label>
                                      <input type="text" class="form-control"
                                       name="ex_fact_cost"  placeholder="Enter Ex_factory_cost">
                                    </div>
                                    <div class="form-group">
                                      <label for="district">Unit Manager Incentives</label>
                                      <input type="text" class="form-control"
                                       name="ex_fact_cost"  placeholder="Enter Unit Manager Incentives">
                                    </div>

                                    <div class="form-group">
                                      <label for="district">Route Supervisor Incentives</label>
                                      <input type="text" class="form-control"
                                       name="ex_fact_cost"  placeholder="Enter  RS Incentives">
                                    </div>

                                    <div class="form-group">
                                      <label for="district">Other Incentives</label>
                                      <input type="text" class="form-control"
                                       name="ex_fact_cost"  placeholder="Enter Other Incentives">
                                    </div>


                                    <div class="form-group">
                                      <label class="col-form-label" for="pincode">Pin Code:</label>
                                      <input type="text" name="pin" pattern="[0-9]{6}" maxlength="6" class="form-control" id="pincode" placeholder="Enter Pincode of CC Location">
                                    </div>
                      <!--<a class="btn btn-primary btn-block" href="login.html">Add CC</a>-->
            		  <button name="add_cc" style="width:150px;" type="submit" class="btn btn-primary btn-lg">Add CC</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
                <!-- /.container-fluid-->
                <!-- /.content-wrapper-->
                <!-- Scroll to Top Button-->
                <!-- Logout Modal-->
            	<script type="text/javascript">
                  $(document).ready( function() {
                    $('#notification').delay(3000).fadeOut();
                  });
                </script>
                <!-- Bootstrap core JavaScript-->

        <!-- /page content -->

        <!-- footer content -->

        <!-- /footer content -->
      </div>
    </div>
    <footer>
      <div class="pull-right">
        &copy;
        DairyPro Feed<a href="https://colorlib.com"> webiste</a>
      </div>
      <div class="clearfix"></div>
    </footer>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
