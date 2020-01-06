<?php
    require "header.php";
    require "includes/functions.inc.php";
    require "includes/dbh.inc.php";



    if(isset($_POST['new_request'])){
		if(createRequest($_POST['project_name'],$_POST['project_department'],$_SESSION['userUid'])){
			$msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Project has been created</button></div>";
		}else{
			$msg = mysqli_error($query);
		}

}

if(isset($_POST['submit_project'])){
  $view_project_query=" UPDATE request SET submitted = 'Yes' WHERE id = '".$_GET["submit"]."' ";//select query for viewing projects.
  $run=mysqli_query($conn,$view_project_query);
  if($run){
if(submitProject($_POST['ProjectTitle'],$_POST['ProjectDepartment'],$_SESSION['userUid'], $_POST['ProjectSupervisors'], $_POST['ProjectId'])){
  $msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Project has been submitted</button></div>";
}else{
$msg = mysqli_error($db);
}
}
}

if(isset($_GET['edit'])){
$data = fetchDocument($_GET['edit']);

$project_name = $data['project_name'];

$read = file("projects/".$project_name.".txt");
}

if(isset($_GET['submit'])){
$data = fetchDocument($_GET['submit']);

$project_name = $data['project_name'];

$read = file("projects/".$project_name.".txt");
}

if(isset($_POST['create_project'])){

  $project_title = $_POST['ProjectTitle'];
  $project_content = $_POST['ProjectContent'];

  $file = fopen("projects/".$project_title.".txt","w+") or die("file not open");

  $s = $project_content;
  fputs($file, $s);


  fclose($file);
}
if(isset($_POST['submit_project'])){

  $project_title = $_POST['ProjectTitle'];
  $project_content = $_POST['ProjectContent'];

  $file = fopen("projects/".$project_title.".txt","w+") or die("file not open");

  $s = $project_content;
  fputs($file, $s);


  fclose($file);
}


    ?>


    <main>

            <section class="site-section site-section-light site-section-top themed-background-dark ">
            <div class="container text-center">

                    <h1 class="animation-slideDown">
                  <i class="fa fa-briefcase fa-fw"></i></a>
                    <strong>REQUEST</strong></h1>
                </div>

            </section>


            <div class="site-content site-section">


                    <div class="row">
                        <div class="col-sm-12">

                          <?php if(isset($_GET['edit'])){
                        $data = fetchDocument($_GET['edit']);?>
                          <div class="site-content site-section">
                            <div class="row">
                                <div class="col-md-10">
                                <div class="block-full">
                                </div>
                                        <form action="request.php" method="post" style="margin-left:20em;">
                                          <?php if(isset($_POST['create_project'])) echo $error;  ?>
                                          <div class="content-box-large box-with-header">
              <div>

              <div class="row">
                <div class="col-sm-12">
                  <input type="text" class="form-control" placeholder="Project Title" name="ProjectTitle" value="<?php echo $data['project_name']; ?>" />
                </div>
              </div>

              <hr>
        <div class="row">
                <div class="col-sm-12">
                  <input type="text" class="form-control" placeholder="Project Department" name="ProjectDepartment" value="<?php echo $data['project_department']; ?>" disabled/>
                </div>
              </div>

              <hr>

              <div class="row">

              <div class="col-sm-12">
                    <div class="form-group">
                      <textarea class="form-control" name="ProjectContent" rows="8" cols="100" placeholder="Enter Project Content"><?php foreach($read as $read){ echo $read; } ?></textarea>

                  </div>
                </div>

              </div>

              <hr>

            </div>
            <button class="btn btn-primary" type="submit" name="create_project" style="margin-bottom:2em;">
                        <i class="fa fa-save"></i>
                        Create Project
                      </button>

          </div>
                                      </form>


                                </div>

                            </div>

            </div>

          <?php } else if(isset($_GET['submit'])){
$data = fetchDocument($_GET['submit']);?>
            <div class="site-content site-section">
              <div class="row">
                  <div class="col-md-10">
                  <div class="block-full">
                  </div>
                          <form action="request.php?submit=<?php echo $_GET['submit']; ?>" method="post" style="margin-left:20em;">
                            <?php if(isset($_POST['submit_project'])) echo $msg;  ?>
                            <div class="content-box-large box-with-header">
<div>


<div class="row">
  <div class="col-sm-12">
    <input type="text" class="form-control" placeholder="Project Title" name="ProjectTitle" value="<?php echo $data['project_name']; ?>" />
  </div>
</div>

<hr>
<div class="row">
  <div class="col-sm-12">
    <input type="text" class="form-control" placeholder="Project Department" name="ProjectDepartment" value="<?php echo $data['project_department']; ?>" />
  </div>
</div>

<hr>

<div class="row">

<div class="col-sm-12">
      <div class="form-group">
        <textarea class="form-control" name="ProjectContent" rows="8" cols="100" placeholder="Enter Project Content"><?php foreach($read as $read){ echo $read; } ?></textarea>

    </div>
  </div>

</div>

<hr>

  <div class="row" style="display:none; visibility:hidden;">
    <div class="col-sm-12">
      <input type="text" class="form-control" placeholder="Project Title" name="ProjectSupervisors" value="<?php echo $data['proj_supervisors']; ?>" />
    </div>
  </div>

  <div class="row" style="display:none; visibility:hidden;">
    <div class="col-sm-12">
      <input type="text" class="form-control" placeholder="Project Title" name="ProjectId" value="<?php echo $data['id']; ?>" />
    </div>
  </div>

</div>
<button class="btn btn-primary" type="submit" name="submit_project" style="margin-bottom:2em;">
          <i class="fa fa-save"></i>
          Submit Project
        </button>

</div>
                        </form>


                  </div>

              </div>

</div>

  <?php }else { ?>

                            <div class="site-block">
                              <?php if(isset($_POST['submit_project'])) echo $msg;  ?>
                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Project Title</th>
                                                <th class="text-center">Department</th>
                                                <th class="text-center">Supervisor</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Edit Project</th>
                                                <th class="text-center">Submit Project</th>
                                                <th class="text-center">Project Submitted</th>
                                                <th class="text-center">Cancel Request</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          <?php
                                          foreach(fetchAllRequests() as $requests) {
                                           ?>
                                        <tr class="active">

                                        <td><?php echo $requests['project_name'];  ?></td>
                                        <td><?php echo $requests['project_department'];  ?></td>
                                        <td><?php

                                         echo $requests['super_fullname'];

                                         ?></td>

                                        <td><?php echo $requests['status'];  ?></td>

                                        <?php if($requests['status'] == "Processing" ){ ?>

                                        <td><button class="btn btn-default">Awaiting Approval</button></td>

                                      <?php } else if($requests['status'] == "Approved"){ ?>

                                        <td><a href="?edit=<?php echo $requests['id']; ?>"><button class="btn btn-success">Edit Project</button></a></td>

                                    <?php } ?>

                                    <?php if($requests['status'] == "Processing" ){ ?>

                                    <td><button class="btn btn-default">Awaiting Approval</button></td>

                                  <?php } else if($requests['status'] == "Approved"){ ?>

                                      <td><a href="?submit=<?php echo $requests['id']; ?>"><button class="btn btn-warning">Submit to Supervisor</button></a></td>

                                  <?php } else if($requests['status'] == "Yes"){ ?>

                                        <td><button class="btn btn-warning">Project Submitted</button></td>

                                  <?php } ?>

                                  <?php if($requests['submitted'] == "Yes" ){ ?>

                                    <td><button class="btn btn-primary">Yes</button></td>

                                <?php } else if($requests['submitted'] == "No"){ ?>

                                    <td><button class="btn btn-danger">No</button></td>

                              <?php } ?>

                                <?php if($requests['status'] == "Processing" ){ ?>

                                  <td><a href="delete.php?del=<?php echo $requests['id']; ?>"><button class="btn btn-danger">Cancel</button></a></td>

                              <?php } else if($requests['status'] == "Approved"){ ?>

                                  <td><button class="btn btn-default">Cancel</button></td>

                            <?php } ?>

                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>

                                </div>



                        </div>
                        <!-- Search -->

                                <!-- END Search -->

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
