<?php
    include "header.php";
    require "includes/functions.inc.php";
    require "includes/dbh.inc.php";



if(isset($_POST['submit_report'])){
if(submitReport($_GET['report'],$_POST['ProjectReport'])){
  $msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Report has been submitted</button></div>";
}else{
$msg = mysqli_error($db);
}

}

if(isset($_GET['submit'])){
  $view_project_query=" UPDATE submission SET status = 'Processing' WHERE submission_id = '".$_GET["submit"]."' ";//select query for viewing projects.
  $run=mysqli_query($conn,$view_project_query);

if($run){
  $msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Report has been submitted</button></div>";
}

else{
  echo mysqli_error($conn);
}
}

if(isset($_GET['del'])){
  $view_project_query=" UPDATE submission SET status = NULL WHERE submission_id = '".$_GET["del"]."' ";//select query for viewing projects.
  $run=mysqli_query($conn,$view_project_query);

if($run){
  $msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Report has been submitted</button></div>";
}

else{
  echo mysqli_error($conn);
}
}

if(isset($_GET['review'])){
$data = reviewProject($_GET['review']);

$project_name = $data['project_name'];

$read = file("../projects/".$project_name.".txt");

foreach($read as $read){ echo $read; }
}
//****************************************************************************************************************************************************
if(isset($_POST["submit"]))
{
      function highlight($text, $words) {
          preg_match_all('~\w+~', $words, $m);
          if(!$m)
              return $text;
          $re = '~\\b(' . implode('|', $m[0]) . ')\\b~i';
          return preg_replace($re, '<b style=" color: red";>$0</b>', $text);
      }

      $text = $read;

    $words = $_POST['words'];
    print highlight($text, $words);

}

 //**************************************************************************************************************************************************
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

                          <?php if(isset($_GET['review'])){
                            $data = reviewProject($_GET['review']);?>
            <div class="site-content site-section">
              <div class="row">
                  <div class="col-md-10">
                  <div class="block-full">
                  </div>
                  <a href="submission.php" style="margin-left:20em;">
                  <button class="btn btn-primary" type="submit" name="" style="margin-bottom:2em;">
                            <i class="fa fa-reply"></i>
                            Return
                          </button>
                          </a>
                          <form method="post" style="margin-left:20em;">
                            <?php if(isset($_POST['create_project'])) echo $msg;  ?>
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
    <input type="text" class="form-control" placeholder="Project Keywords" name="words" value="<?php if(isset($_POST['submit'])) echo $words; ?>"/>
  </div>
</div>

<hr>

<div class="row">

<div class="col-sm-6">
      <div class="form-group">
        <textarea class="form-control" name="" rows="8" cols="100" placeholder="Enter Project Content" readonly><?php  echo $read; ?></textarea>

    </div>
  </div>

  <div class="col-sm-6">
    <?php
    if(isset($_POST['submit'])){
    print highlight($text, $words);
    }

    ?>
    </div>

</div>

<hr>
</div>


</div>
<button class="btn btn-primary" type="submit" name="submit" style="margin-bottom:2em;">
          <i class="fa fa-reply"></i>
          Review Project
        </button>
                        </form>

                  </div>

              </div>

</div>
<?php } else if(isset($_GET['report'])){
?>
<center><h1 style="text-decoration:underline; font-family:arial; font-size:5em;">Project Report</h1></center>
<div class="site-content site-section">
<div class="row">
<div class="col-md-10">
<div class="block-full">
</div>

<form action="?report=<?php echo $_GET['report']; ?>" method="post" style="margin-left:20em;">
  <?php if(isset($_POST['submit_report'])) echo $msg;  ?>
  <div class="content-box-large box-with-header">
<div>



<div class="row">

<div class="col-sm-12">
<div class="form-group">
<textarea class="form-control" name="ProjectReport" rows="20" cols="100" placeholder="Enter Project Report"></textarea>

</div>
</div>

</div>

<hr>

</div>
<button class="btn btn-primary" type="submit" name="submit_report" style="margin-bottom:2em;">
<i class="fa fa-save"></i>
Submit Project Report
</button>

</div>
</form>


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
                                                <th class="text-center">Review Project</th>
                                                <th class="text-center">Report</th>
                                                <th class="text-center">Submit Project</th>
                                                <th class="text-center">Cancel Project</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          <?php
                                          foreach(fetchAllSubmissions() as $submissions) {
                                           ?>
                                        <tr class="active">

                                        <td><?php echo $submissions['project_name'];  ?></td>
                                        <td><?php echo $submissions['project_department'];  ?></td>
                                        <td><?php echo $submissions['firstname']. ",". $submissions['lastname'];  ?></td>                            
                                        <td><a href="?review=<?php echo $submissions['id']; ?>"><button class="btn btn-success">Review Project</button></a></td>

                                        <?php if($submissions['report'] == NULL ){ ?>

                                        <td><a href="?report=<?php echo $submissions['submission_id']; ?>"><button class="btn btn-success">Compile Report</button></a></td>

                                      <?php } else{ ?>

                                        <td><button class="btn btn-success">Report Compiled</button></td>

                                    <?php } ?>

                                    <?php if($submissions['status'] == NULL ){ ?>

                                    <td><a href="?submit=<?php echo $submissions['submission_id']; ?>"><button class="btn btn-success">Submit Project</button></a></td>

                                  <?php } else if($submissions['status'] == "Processing"){ ?>

                                      <td><button class="btn btn-warning">Submitted to Administrator</button></td>

                              <?php } else if($submissions['status'] == "Rejected"){ ?>

                                  <td><button class="btn btn-warning">Project Rejected</button></td>

                          <?php } else if($submissions['status'] == "Approved"){ ?>

                              <td><button class="btn btn-warning">Project Approved</button></td>

                        <?php } ?>

                                <?php if($submissions['status'] == "Processing" ){ ?>

                                  <td><a href="?del=<?php echo $submissions['submission_id']; ?>"><button class="btn btn-danger">Cancel</button></a></td>

                              <?php } else if($submissions['status'] == "Approved"){ ?>

                                  <td><button class="btn btn-default">Cancel</button></td>

                          <?php } else if($submissions['status'] == "Rejected"){ ?>

                              <td><button class="btn btn-default">Cancel</button></td>

                      <?php } else if($submissions['status'] == NULL){ ?>

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
