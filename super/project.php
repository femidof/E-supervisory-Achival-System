<?php
    require "header.php";
    require "includes/functions.inc.php";
    require "includes/dbh.inc.php";

    ?>

    <main>

            <section class="site-section site-section-light site-section-top themed-background-fire ">
            <div class="container text-center">
                    <h1 class="animation-slideDown"><strong>PROJECT SUPERVISING</strong></h1>
                </div>

            </section>


            <div class="site-content site-section">


                    <div class="row">

                        <div class="col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 site-block">

                        <div class="site-block">
                        <table class="table">
						  <thead>
							<tr>
							  <th>PROJECT TITLE</th>
							  <th>PROJECT DEPARTMENT</th>
							  <th>STUDENT SUPERVISED</th>

							</tr>
						  </thead>
              <tbody>
                <?php
                foreach(fetchAllProjects() as $projects) {
                 ?>
              <tr class="active">

              <td><?php echo $projects['project_name']; ?></td>
              <td><?php echo $projects['project_department']; ?></td>
              <td><?php echo $projects['requested_by']; ?></td>

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
