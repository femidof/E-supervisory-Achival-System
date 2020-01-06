<?php
    require "header.php";
    require "includes/dbh.inc.php";
    require "includes/functions.inc.php";
    ?>

    <?php

    if(isset($_POST['respond'])){
		if(respondToRequest($_GET['process'],$_POST['Status'],$_POST['ProjectSupervisor'])){
			$msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Record has been updated</button></div>";
		}else{
			$msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-danger'>An unknown error occured!</button></div>";
		}

}


    if(isset($_GET['delete'])){
    	if(deleteRequest($_GET['delete'])){
    		$msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Record has been deleted successfully!</button></div>";
    	}else{
    		$msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-danger'>An unknown error occured!</button></div>";
    	}
    }
    ?>

    <main>

            <section class="site-section site-section-light site-section-top themed-background-dark-fire ">
            <div class="container text-center">
                    <h1 class="animation-slideDown"><strong>PROJECT REQUEST</strong></h1>
                </div>

            </section>


            <?php if(isset($_GET['process'])){
              $data = fetchRequest($_GET['process']);
            ?>
            <div class="site-content site-section">
                    <div class="row">
                        <div class="col-md-10">
                        <div class="block-full">
                        </div>
                                <form action="?process=<?php echo $_GET['process']; ?>" method="post" style="margin-left:20em;">
                                  <?php if(isset($_POST['respond'])) echo $msg;  ?>
                                  <div class="content-box-large box-with-header">
      <div>

      <div class="row">
        <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Project Title" name="ProjectTitle" value="<?php echo $data['project_name']; ?>" disabled/>
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
          <input type="text" class="form-control" placeholder="Requested By" name="Requested By" value="<?php echo $data['requested_by']; ?>" disabled/>
        </div>
      </div>

      <hr>
      <div class="row">
        <div class="col-sm-12">
          <select class="form-control" name="ProjectSupervisor" id="name">
						<option value="">SELECT SUPERVISOR</option>
						<?php $sql = "SELECT super_id, super_fullname FROM supervisors";
								$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {


									while($row = mysqli_fetch_assoc($result))
						 {
							?>

							<option value="<?php echo htmlentities($row['super_id']);?>"><?php echo htmlentities($row['super_fullname']);?></option>
						<?php
						}}
						else{
								echo "0 results";
						}
						?>
					</select>
        </div>
      </div>

      <hr>

      <div class="row">

      <div class="col-sm-12">
            <div class="form-group">
              <select class="form-control" name="Status">
                <option value="">-Select Option-</option>
                <option value="Reject">Reject</option>
                <option value="Approved">Approve</option>
              </select>

          </div>
        </div>

      </div>

      <hr>

    </div>
    <button class="btn btn-primary" type="submit" name="respond" style="margin-bottom:2em;">
                <i class="fa fa-save"></i>
                Respond
              </button>

  </div>
                              </form>


                        </div>

                    </div>

                </div>

<?php }else { ?>


            <div class="site-content site-section">


                    <div class="row">

                        <div class="col-sm-6 col-sm-offset-3 ">

                        <div class="site-block">
                        <table class="table">
						  <thead>
							<tr>
							  <th>PROJECT TITLE</th>
							  <th>PROJECT DEPARTMENT</th>
							  <th>REQUESTED BY</th>
                <th>STATUS</th>
							  <th>DELETE REQUEST</th>


							</tr>
						  </thead>
							<?php
        include("includes/dbh.inc.php");
        $view_project_query="select * from request";//select query for viewing projects.
        $run=mysqli_query($conn,$view_project_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {

            $project_name=$row[1];
            $project_department=$row[2];


        ?>

							 <tbody>

							<tr class="active">

							<td><?php echo $project_name;  ?></td>
              <td><?php echo $project_department;  ?></td>
              <td><?php echo $row['requested_by'];  ?></td>



              <?php if($row['status'] == "Processing" ){ ?>

                <td> <a href="?process=<?php echo $row['id']; ?>" style="text-decoration:none; color:#fff;">
                <button class="btn btn-danger">
                <?php echo $row['status'];  ?>
                </button>
                </a>
                </td>

            <?php } else if($row['status'] == "Approved"){ ?>

              <td><button class="btn btn-success">Approved</button></td>

          <?php } ?>

              <td>
              <a href="?delete=<?php echo $row['id']; ?>">
              <button class="btn btn-danger">Delete</button>
              </a>
              </td>



							</tr>
							<?php } ?>
						  </tbody>
						</table>

                            </div>

                        </div>

                    </div>

                    </div>

                  <?php } ?>
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
