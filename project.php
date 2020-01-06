<?php
    require "header.php";
    require "includes/functions.inc.php";
    require "includes/dbh.inc.php";



    if(isset($_POST['new_request'])){

    $project_title = $_POST['project_name'];

    $result = $conn->query("SELECT id FROM request WHERE requested_by = '".$_SESSION["userUid"]."' LIMIT 1");
        if($result->num_rows < 0){
                echo "<script type = 'text/javascript'> alert('Sorry You Cannot Request For Two Projects'); window.location = 'project.php'; </script>";
        exit();
      }
      else{

		if(createRequest($_POST['project_name'],$_POST['project_department'],$_SESSION['userUid'],$_POST['UserId'])){
			$msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>New Venue has been created</button></div>";
		}else{
			$msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-danger'>An unknown error occured!</button></div>";
		}

}

}

    ?>


    <main>

            <section class="site-section site-section-light site-section-top themed-background-dark ">
            <div class="container text-center">

                    <h1 class="animation-slideDown">
                  <i class="fa fa-briefcase fa-fw"></i></a>
                    <strong>PROJECT</strong></h1>
                </div>

            </section>


            <div class="site-content site-section">


                    <div class="row">
                        <div class="col-sm-8">

                          <?php if(isset($_GET['request'])){
                            foreach (fetchData() as $data) {
                              // code...
                            }
                        ?>
                          <div class="site-content site-section">
                                  <div class="row">
                                      <div class="col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 site-block">
                            <legend> <a href="project.php" style="text-decoration:none;"> <i class="fa fa-mail-reply"></i> </a> Project Request</legend>
                            <p><?php if(isset($_POST['new_super'])) echo $msg; ?></p>
                            <form action="project.php" method="post">
                            <div class="form-group">
                                <div class="col-md-10">
                                  <label class="col-md-10 control-label">Project Title</label>
                                  <input type="text" class="form-control" placeholder="Project Name" name="project_name" />
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-10">
                                  <label class="col-md-12 control-label">Project Department</label>
                                  <input type="text" class="form-control" placeholder="Project Department" name="project_department"/>
                                </div>
                            </div>

                            <br>
                            <div class="row" style="">
                              <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Project Title" name="UserId" value="<?php echo $data['idUsers']; ?>" />
                              </div>
                            </div>
                            <button class="btn btn-primary" type="submit" name="new_request" style="margin-top:10px;">
                              <i class="fa fa-save"></i>  Request
                            </button>

                          </form>



                    </div>

                </div>

            </div>

  <?php }else { ?>



                        <div class="site-block">
                                <table class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Project Title</th>
                                            <th class="text-center">Department</th>
                                        </tr>
                                    </thead>
                                    <?php
                                     include("includes/dbh.inc.php");
                                     $view_project_query="select * from project";//select query for viewing projects.
                                     $run=mysqli_query($conn,$view_project_query);//here run the sql query.
                                     while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
                                     {
                                         $project_id=$row[0];
                                         $project_name=$row[1];
                                         $project_department=$row[2];
                                     ?>
                                    <tbody>
                                    <tr class="active">

                                    <td><?php echo $project_name;  ?></td>
                                    <td><?php echo $project_department;  ?></td>
                                    </tr>

                                    </tbody>
                                    <?php } ?>
                                    <tr>
                                      <td colspan="2">
                                      <a href="?request"><button class="btn btn-success">Request a Project</button></a>
                                    </td>
                                    </tr>

                                </table>

                            </div>

                        </div>
                        

                              <?php } ?>

                    </div>

                    </div>
    </main>


<?php
require "footer.php";
?>

 <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
 <a href="#" id="to-top"><i class="fa fa-angle-up"></i></a>

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="js/vendor/jquery.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>
