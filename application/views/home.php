<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/header.php'); ?>
  </head>
 <body class="ng-scope hold-transition skin-blue sidebar-mini" data-ng-app="postModule" data-ng-controller="PostController" data-ng-init="init()">
 	<input id="base_path" value="http://local.offers/application/views/includes/" type="hidden">
    <div class="wrapper">
      <header class="main-header">
       <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>O</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Offer</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/public/images/photo.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Sandun Wijetunger</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/public/images/photo.jpg" class="img-circle" alt="User Image">
                    <p>
                      Sandun Wijetunger - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
	<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <section class="col-lg-12 connectedSortable">
            	<!-- TO DO List -->
              	<div class="box box-primary">
	              	<div class="box-header">
	                  <i class="ion ion-clipboard"></i>
	                  <h3 class="box-title">Offers List</h3>
	                  <div class="box-tools pull-right">
	                    <ul class="pagination pagination-sm inline">
	                      <li><a href="#">&laquo;</a></li>
	                      <li><a href="#">1</a></li>
	                      <li><a href="#">2</a></li>
	                      <li><a href="#">3</a></li>
	                      <li><a href="#">&raquo;</a></li>
	                    </ul>
	                  </div>
	                </div><!-- /.box-header -->
	                <div class="box-body">
						<div class="table-responsive">
							<table id="offers" class="table table-bordered table-hover table-striped">
								<thead>
									<tr>
										<th width="5%">#</th>
										<th width="20%">Name</th>
										<th width="20%">Email</th>
										<th width="20%">Company Name</th>
										<th width="15%">Designation</th>
										<th width="15%">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr data-ng-repeat="user in post.users | orderBy : '-id'">
										<th scope="row">{{user.id}}</th>
										<td> {{user.name}} </td>
										<td> {{user.email}} </td>
										<td> {{user.companyName}} </td>
										<td> {{user.designation}} </td>
										<td> 
											<div class="tools">
						                        <i data-ng-click="editUser(user)" class="fa fa-edit"></i>
						                        <i data-ng-click="deleteUser(user)" class="fa fa-trash-o"></i>
						                      </div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="box-footer clearfix no-border">
			           		<button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
						</div>
					</div>
					
					<div class="box-body">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="alert alert-danger text-center alert-failure-div" role="alert" style="display: none">
								<p></p>
							</div>
							<div class="alert alert-success text-center alert-success-div" role="alert" style="display: none">
								<p></p>
							</div>
							<form novalidate name="userForm" >
								<div class="form-group">
									<label for="exampleInputEmail1">Name</label> 
									<input data-ng-minlength="3" required type="text" class="form-control" id="name" name="name" placeholder="Name" data-ng-model='tempUser.name'>
									<span class="help-block error" data-ng-show="userForm.name.$invalid && userForm.name.$dirty">
										{{getError(userForm.name.$error, 'name')}}
									</span>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email</label> 
									<input data-ng-minlength="3" required type="email" class="form-control" id="email" name="email" placeholder="Email" data-ng-model='tempUser.email'>
									<span class="help-block error" data-ng-show="userForm.email.$invalid && userForm.email.$dirty">
										{{getError(userForm.email.$error, 'email')}}
									</span>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Company Name</label>  
									<input data-ng-minlength="3" required type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" data-ng-model='tempUser.companyName'>
									<span class="help-block error" data-ng-show="userForm.company_name.$invalid && userForm.company_name.$dirty">
										{{getError(userForm.company_name.$error, 'company_name')}}
									</span>
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Designation</label> 
									<input data-ng-minlength="3" required type="text" class="form-control" id="designation" name="designation" placeholder="Designation" data-ng-model='tempUser.designation'>
									<span class="help-block error" data-ng-show="userForm.designation.$invalid && userForm.designation.$dirty">
										{{getError(userForm.designation.$error, 'designation')}}
									</span>
								</div>
								<!-- <input type="hidden" data-ng-model='tempUser.id'>  -->
								<div class="text-center">
									<button ng-disabled="userForm.$invalid" data-loading-text="Saving User..." ng-hide="tempUser.id" type="submit" class="btn btn-default" data-ng-click="addUser()">Save User</button>
									<button ng-disabled="userForm.$invalid" data-loading-text="Updating User..." ng-hide="!tempUser.id" type="submit" class="btn btn-default" data-ng-click="updateUser()">Update User</button>
								</div>
							</form>
							<div class="clearfix"></div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
							
							</div>
							
						</div>
					</div>
					
				</div><!-- /.box -->
            </section>
            
            <section class="col-lg-12 connectedSortable">

              <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">To Do List</h3>
                  <div class="box-tools pull-right">
                    <ul class="pagination pagination-sm inline">
                      <li><a href="#">&laquo;</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">&raquo;</a></li>
                    </ul>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="todo-list">
                    <li>
                      <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <!-- checkbox -->
                      <input type="checkbox" value="" name="">
                      <!-- todo text -->
                      <span class="text">Design a nice theme</span>
                      <!-- Emphasis label -->
                      <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name="">
                      <span class="text">Make the theme responsive</span>
                      <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name="">
                      <span class="text">Let theme shine like a star</span>
                      <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name="">
                      <span class="text">Let theme shine like a star</span>
                      <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name="">
                      <span class="text">Check your messages and notifications</span>
                      <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name="">
                      <span class="text">Let theme shine like a star</span>
                      <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                  <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                </div>
              </div><!-- /.box -->

            </section>
            
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2015-2016 <a href="">Sandun Wijetunge</a>.</strong> All rights reserved.
      </footer>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
	<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/footer.php'); ?>
	<!-- page script -->
    <script>
      $(function () {
        $("#offers").DataTable();
      });
    </script>
  </body>
</html>
