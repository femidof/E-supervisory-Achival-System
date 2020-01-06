<?php
    require "header.php";
    require "includes/dbh.inc.php";
    require "includes/functions.inc.php";
    ?>

    <?php
    if(isset($_GET['delete'])){
    	if(deleteProject($_GET['delete'])){
    		$msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Record has been deleted successfully!</button></div>";
    	}else{
    		$msg = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-danger'>An unknown error occured!</button></div>";
    	}
    }
    ?>

    <main>

            <section class="site-section site-section-light site-section-top themed-background-dark-fire ">
            <div class="container text-center">
                    <h1 class="animation-slideDown"><strong>PROJECT</strong></h1>
                </div>

            </section>


            <div class="site-content site-section">


                    <div class="row">

                        <div class="col-sm-6 col-sm-offset-3 ">
                        <div class="site-block">
                        <table class="table">
						  <thead>
							<tr>
							  <th>PROJECT TITLE</th>
							  <th>PROJECT DEPARTMENT</th>
					<!--		  <th>DELETE PROJECT</th> -->


							</tr>
						  </thead>
							<?php
        include("includes/dbh.inc.php");
        $view_project_query="select * from project";//select query for viewing projects.
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
            <?php
            /* $sql="SELECT super_user FROM supervisors";
            $result = mysqli_query($conn,$sql);


           //echo "select name='super_user'";
           echo "</select>";
          */ ?>
         <!--   <td>
              <a href="?delete=<?php echo $row['id']; ?>">
                <button class="btn btn-danger">Delete</button>
              </a>
            </td>
            -->



							</tr>
							<?php } ?>
						  </tbody>
						</table>

                            </div>

                        </div>

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
