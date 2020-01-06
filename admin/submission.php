<?php
    require "header.php";
    require "includes/functions.inc.php";
    require "includes/dbh.inc.php";



if(isset($_POST['submit_report'])){
if(submitReport($_GET['report'],$_POST['ProjectReport'])){
  $msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Report has been submitted</button></div>";
}else{
$msg = mysqli_error($db);
}

}

if(isset($_GET['reject'])){
  $view_project_query=" UPDATE submission SET status = 'Rejected' WHERE submission_id = '".$_GET["reject"]."' ";//select query for viewing projects.
  $run=mysqli_query($conn,$view_project_query);

if($run){
  $msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Report has been submitted</button></div>";
}

else{
  echo mysqli_error($conn);
}
}

if(isset($_POST['submit_project'])){
  $view_project_query=" UPDATE submission SET status = 'Approved' WHERE submission_id = '".$_GET["approve"]."' ";//select query for viewing projects.
  $run=mysqli_query($conn,$view_project_query);

if($run){
if(submitProject($_POST['ProjectTitle'],$_POST['ProjectDepartment'])){
  $msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Project has been submitted</button></div>";
}else{
$msg = mysqli_error($db);
}
}
}



if(isset($_GET['approve'])){
$data = reviewProject($_GET['approve']);

$project_name = $data['project_name'];

$read = file("../projects/".$project_name.".txt");

}



    ?>


    <main>

            <section class="site-section site-section-light site-section-top themed-background-dark ">
            <div class="container text-center">

                    <h1 class="animation-slideDown">
                  <i class="fa fa-briefcase fa-fw"></i></a>
                    <strong>PROJECT SUBMISSIONS</strong></h1>
                </div>

            </section>


            <div class="site-content site-section">


                    <div class="row">
                        <div class="col-sm-12">

                          <?php if(isset($_GET['approve'])){
                            $data = reviewProject($_GET['approve']);?>
            <div class="site-content site-section">
              <div class="row">
                  <div class="col-md-10">
                  <div class="block-full">
                  </div>
                          <form action="submission.php?approve=<?php echo $_GET['approve']; ?>" method="post" style="margin-left:20em;">
                            <?php if(isset($_POST['submit_project'])) echo $msg;  ?>
                            <div class="content-box-large box-with-header">
<div>


<div class="row">
  <div class="col-sm-12">
    <input type="text" class="form-control" placeholder="Project Title" name="ProjectTitle" value="<?php echo $data['project_name']; ?>" readonly/>
  </div>
</div>

<hr>
<div class="row">
  <div class="col-sm-12">
    <input type="text" class="form-control" placeholder="Project Department" name="ProjectDepartment" value="<?php echo $data['project_department']; ?>" readonly/>
  </div>
</div>

<hr>

<div class="row">

<div class="col-sm-12">
      <div class="form-group">
        <textarea class="form-control" name="ProjectContent" rows="8" cols="100" placeholder="Enter Project Content" readonly><?php foreach($read as $read){ echo $read; } ?></textarea>

    </div>
  </div>

</div>

<hr>
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
<?php } else if(isset($_GET['report'])){
$data = viewReport($_GET['report']); ?>
<center><h1 style="text-decoration:underline; font-family:arial; font-size:5em;">Project Report</h1></center>
<div class="site-content site-section">
<div class="row">
<div class="col-md-10">
<div class="block-full">
</div>

<form action="?report=<?php echo $_GET['report']; ?>" method="post" style="margin-left:20em;">
  <?php if(isset($_POST['submit_report'])) echo $msg;
  ?>
  <div class="content-box-large box-with-header">
<div>



<div class="row">

<div class="col-sm-12">
<div class="form-group">
<textarea class="form-control" name="ProjectReport" rows="20" cols="100" placeholder="Enter Project Report" readonly><?php echo $data['report']; ?></textarea>

</div>
</div>

</div>

<hr>

</div>

</div>
</form>
<a href="submission.php" style="margin-left:20em;">
<button class="btn btn-primary" type="submit" name="submit_report" style="margin-bottom:2em;">
<i class="fa fa-return"></i>
Return to Submission
</button>
</a>

</div>

</div>

</div>


  <?php }else { ?>

                            <div class="site-block">
                              <?php if(isset($_POST['submit_report'])) echo $msg;  ?>
                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Project Title</th>
                                                <th class="text-center">Department</th>
                                                <th class="text-center">Submitted By</th>
                                                <th class="text-center">Supervisor</th>
                                                <th class="text-center">View Report</th>
                                                <th class="text-center">Approve Project</th>
                                                <th class="text-center">Decline Project</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          <?php
                                          foreach(fetchAllSubmissions() as $submissions) {
                                           ?>
                                        <tr class="active">

                                        <td><?php echo $submissions['project_name'];  ?></td>
                                        <td><?php echo $submissions['project_department'];  ?></td>
                                        <td><?php echo $submissions['submitted_by'];  ?></td>
                                        <td><?php echo $submissions['super_fullname'];  ?></td>
                                        <td><a href="?report=<?php echo $submissions['submission_id']; ?>"><button class="btn btn-success">View Report</button></a></td>

                                        <?php if($submissions['status'] == 'Processing' ){ ?>

                                        <td><a href="?approve=<?php echo $submissions['submission_id']; ?>"><button class="btn btn-warning">Approve Project</button></a></td>

                                      <?php } else if($submissions['status'] == "Approved"){ ?>

                                        <td><button class="btn btn-success">Project Approved</button></td>

                                      <?php } else{ ?>

                                      <td><button class="btn btn-danger">Project Declined</button></td>

                                      <?php } ?>


                                        <?php if($submissions['status'] == 'Processing' ){ ?>

                                        <td><a href="?reject=<?php echo $submissions['submission_id']; ?>"><button class="btn btn-danger">Declice Project</button></a></td>

                                      <?php } else if($submissions['status'] == "Rejected"){ ?>

                                        <td><button class="btn btn-danger">Project Declined</button></td>

                                        <?php } else{ ?>

                                        <td><button class="btn btn-danger">Cancel</button></td>

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
