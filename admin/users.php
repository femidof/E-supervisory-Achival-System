<?php
    require "header.php";
     require "includes/functions.inc.php";


    if(isset($_POST['new_super'])){
		if(createSuper($_POST['Username'], $_POST['Email'], md5($_POST['Password']), $_POST['Fullname'], $_POST['Department'], $_POST['Nationality'], $_POST['State'])){
			$msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>New Supervisor has been created</button></div>";
		}else{
			$msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-danger'>An unknown error occured!</button></div>";
		}

}
if(isset($_GET['delete'])){
	if(deleteSuper($_GET['delete'])){
		$msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Record has been deleted successfully!</button></div>";
	}else{
		$msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-danger'>An unknown error occured!</button></div>";
	}
}
    ?>


<section class="site-section site-section-light site-section-top themed-background-dark-fire">
      <div class="container">
                    <h1 class="text-center animation-slideDown"><i class="fa fa-arrow-right"></i> <strong>ALL USERS</strong></h1>

                </div>
</section>


<div class="site-content site-section">

      <html>
    <head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css\bootstrap.min.css"> <!--css file link in bootstrap folder-->
    <title>View Users</title>
    </head>
        <style>
    .login-panel {
        margin-top: 150px;
         }
    .table {
        margin-top: 50px;

        }

        </style>

    <body>



                        <?php if(isset($_GET['new'])){
                        ?>
                        <div class="site-content site-section">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 site-block">
                                    <div class="block-full">
                                    <form action="#" class="dropzone dz-clickable"><div class="dz-default dz-message"><span></span></div></form>
                                    </div>

                                            <legend> <a href="users.php" style="text-decoration:none;"> <i class="fa fa-mail-reply"></i> </a> Vital Info</legend>
                                            <p><?php if(isset($_POST['new_super'])) echo $msg; ?></p>
                          <form action="users.php?new?>" method="post">
                          <div class="form-group">
                              <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Username" name="Username" />
                              </div>
                          </div>
                          <br>
                          <div class="form-group">
                              <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="E-Mail" name="Email" />
                              </div>
                          </div>
                          <br>
                          <div class="form-group">
                              <div class="col-md-8">
                                <input type="password" class="form-control" placeholder="Password" name="Password" />
                              </div>
                          </div>
                          <br>
                          <div class="form-group">
                              <div class="col-md-8">
                                  <input type="text" class="form-control" placeholder="Fullname" name="Fullname" />
                              </div>
                          </div>
                          <br>
                               <div class="form-group">
                              <div class="col-md-8">
                                  <input type="text" class="form-control" placeholder="Department" name="Department" />
                              </div>
                          </div>
                          <br>
                            <div class="form-group">
                              <div class="col-md-8">
                                  <input type="text" class="form-control" placeholder="Nationality" name="Nationality" />
                              </div>
                          </div>
                          <br>
                          <div class="form-group">
                              <div class="col-md-8">
                                  <input type="text" class="form-control" placeholder="State of Origin" name="State" />
                              </div>
                          </div>
                          <br>



                          <button class="btn btn-primary" type="submit" name="new_super" style="margin-top:10px;">
                            <i class="fa fa-save"></i>  Create User
                          </button>

                        </form>



                  </div>

              </div>

          </div>

<?php }else { ?>

         <div class="table-scrol">
        <h1 align="center">Students</h1>

    <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>

        <tr>
            <th>User Name</th>
            <th>User E-mail</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Middle Name</th>
            <th>Department</th>
            <th>Course of Study</th>
            <th>Nationality</th>
            <th>State Of Origin</th>
           <!-- <th>Project</th> -->
           <!-- <th>Delete User</th> -->

        </tr>
        </thead>
        <?php
        include("includes/dbh.inc.php");
        $view_users_query="select * from users";//select query for viewing users.
        $run=mysqli_query($conn,$view_users_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $user_id=$row[0];
            $user_name=$row[1];
            $user_email=$row[2];
            $user_pass=$row[3];
            $user_fname=$row[4];
            $user_lname=$row[5];
            $user_mname=$row[6];
            $user_department=$row[7];
            $user_course=$row[8];
            $user_nationality=$row[9];
            $user_stateoforigin=$row[10];



        ?>

        <tr>
<!--here showing results in the table -->
            <td><?php echo $user_name;  ?></td>
            <td><?php echo $user_email;  ?></td>
            <td><?php echo $user_fname;  ?></td>
            <td><?php echo $user_lname;  ?></td>
            <td><?php echo $user_mname;  ?></td>
            <td><?php echo $user_department;  ?></td>
            <td><?php echo $user_course;  ?></td>
            <td><?php echo $user_nationality;  ?></td>
            <td><?php echo $user_stateoforigin;  ?></td>
           <!-- <td><?php //echo "PROJECT TITLE";  ?></td> -->

          <!--  <td><a href="delete.php?del=<?php //echo $user_id ?>"><button class="btn btn-danger">Delete</button></a></td>--> <!--btn btn-danger is a bootstrap button to show danger-->
        </tr>

        <?php } ?>

    </table>
        </div>
</div>





<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="table-scrol">
        <h1 align="center">Supervisors</h1>
        <center><a href="?new" class="btn btn-info">Add New Supervisor</a></center>

    <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>

        <tr>
            <th>User Name</th>
            <th>User E-mail</th>
            <th>Full Name</th>
            <th>Department</th>
            <th>Nationality</th>
            <th>State Of Origin</th>
           <!-- <th>Delete Supervisor</th> -->

        </tr>
        </thead>



        <?php
        include("includes/dbh.inc.php");
        $view_users_query="select * from supervisors";//select query for viewing users.
        $run=mysqli_query($conn,$view_users_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $super_id=$row[0];
            $super_name=$row[1];
            $super_email=$row[2];
            $super_pass=$row[3];
            $super_fullname=$row[4];
            $super_department=$row[5];
            $super_nationality=$row[6];
            $stateoforigin=$row[7];

        ?>

        <tr>
<!--here showing results in the table -->
            <td><?php echo $row['super_user'];  ?></td>
            <td><?php echo $row['super_email'];;  ?></td>
            <td><?php echo $row['super_fullname'];;  ?></td>
            <td><?php echo $row['super_department'];;  ?></td>
            <td><?php echo $row['super_nationality'];;  ?></td>
            <td><?php echo $row['stateoforigin'];;  ?></td>

         <!--   <td><a href="?delete=<?php //echo $row['super_id']; ?>"><button class="btn btn-danger">Delete</button></a></td>--> <!--btn btn-danger is a bootstrap button to show danger-->
        </tr>

        <?php } ?>

    </table>
        </div>
</div>
<?php } ?>

</body>

</html>



































 </div>
