<?php
    require "header.php";
    require "includes/functions.inc.php";
    ?>

    <main>
      <section class="site-section site-section-light site-section-top themed-background-dark-fire">
      <div class="container">
                    <h1 class="text-center animation-slideDown"><i class="fa fa-arrow-right"></i> <strong>PROFILE</strong></h1>

                </div>
      </section>


      <div class="site-content site-section">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 site-block">
                        <?php foreach(fetchAllUsers() as $users) { ?>
                        <?php /* if($users['profileext']=="n/a"){
                        echo "<img class='img-responsive' style='width:50%' src='img/profiles/profile.png'/>";
                        } */
                        ?>
                        <fieldset>


                                <legend>Vital Info</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Username</label>
                                    <div class="col-md-8">
                                        <span class="form-control-static"><?php echo $users['super_user']; ?></span>
                                    </div>
                                </div>
                                  <br>
                                  <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Full Name</label>
                                    <div class="col-md-8">
                                        <span class="form-control-static"><?php echo $users['super_fullname']; ?></span>
                                    </div>
                                </div>
                                 <br>
                                 <div class="form-group">
                                    <label class="col-md-4 control-label">Department</label>
                                    <div class="col-md-8">
                                        <span class="form-control-static"><?php echo $users['super_department']; ?></span>
                                    </div>
                                </div>
                                  <br>
                                 <div class="form-group">
                                    <label class="col-md-4 control-label">Nationality</label>
                                    <div class="col-md-8">
                                        <span class="form-control-static"><?php echo $users['super_nationality']; ?></span>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">State Of Origin</label>
                                    <div class="col-md-8">
                                        <span class="form-control-static"><?php echo $users['stateoforigin']; ?></span>
                                    </div>
                                </div>
                                <br>

                        </fieldset>

                        </div>
                        <div>
                        <a href="profile-edit.php?edit=<?php echo $users['super_id']; ?>" >
                        <button type="button" name= "submit1" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> Edit Profile</button>
                       </a>
                       </div>
                         <?php } ?>
                       </div>

    </main>


<?php
require "footer.php";
?>
