<?php
    require "header.php";
   require "includes/functions.inc.php";
    ?>

    <main>

            <section class="site-section site-section-light site-section-top themed-background-dark-fire ">
            <div class="container text-center">
                    <h1 class="animation-slideDown">
                    <i class = "fa fa-user" aria-hidden="true"></i>
                    <strong>USER PROFILE</strong></h1>
                </div>

            </section>


            <div class="site-content site-section">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 site-block">
                        <?php foreach(fetchAllUsers() as $users) { ?>
                        <fieldset>
                          

                                <legend>Vital Info</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Username</label>
                                    <div class="col-md-8">
                                        <span class="form-control-static"><?php echo $users['uidUsers']; ?></span>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">First Name</label>
                                    <div class="col-md-8">
                                        <span class="form-control-static"><?php echo $users['firstname']; ?></span>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Last Name</label>
                                    <div class="col-md-8">
                                        <span class="form-control-static"><?php echo $users['lastname']; ?></span>
                                    </div>
                                </div>
                                <br>
                                 <div class="form-group">
                                    <label class="col-md-4 control-label">Middle Name</label>
                                    <div class="col-md-8">
                                        <span class="form-control-static"><?php echo $users['middlename']; ?></span>
                                    </div>
                                </div>
                                <br>
                                 <div class="form-group">
                                    <label class="col-md-4 control-label">Department</label>
                                    <div class="col-md-8">
                                        <span class="form-control-static"><?php echo $users['department']; ?></span>
                                    </div>
                                </div>
                                <br>
                                 <div class="form-group">
                                    <label class="col-md-4 control-label">Course Of Study</label>
                                    <div class="col-md-8">
                                        <span class="form-control-static"><?php echo $users['course']; ?></span>
                                    </div>
                                </div>
                                <br>
                                 <div class="form-group">
                                    <label class="col-md-4 control-label">Nationality</label>
                                    <div class="col-md-8">
                                        <span class="form-control-static"><?php echo $users['nationality']; ?></span>
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
                              <?php } ?>
                        </fieldset>

                        </div>
                        <div>
                        <a href="user-edit.php?edit=<?php echo $users['idUsers']; ?>" >
                        <button type="button" name= "submit1" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> Edit Profile</button>
                       </a>


                        </div>
                    </div>

                </div>
    </main>


<?php
require "footer.php";
?>
