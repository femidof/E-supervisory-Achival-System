<?php
    require "header.php";
   require "includes/functions.inc.php";
    ?>

    <?php

    if(isset($_POST['edit_profile'])){
   if(updateProfile($_GET['edit'], $_POST['Fullname'], $_POST['Department'],  $_POST['Nationality'], $_POST['State'])){
     $error = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Student record has been updated</button></div>";
   }else{
     $error = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-danger'>An unknown error occured!</button>
     </div>";
   }

 }

    ?>
    <head>
<style type="text/css">
.dropzone.dz-clickable {
    cursor: pointer;
}

.dropzone {
    position: relative;
    border: 2px dashed #eaedf1;
    background-color: #f9fafc;
    padding: 10px;
}
form {
    display: block;
    margin-top: 0em;
}

</style>
    </head>

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
                        <div class="block-full">
                        <form action="#" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Drop profile picture here to upload</span></div></form>
                        </div>
                        <fieldset>
                                <legend> <a href="profile.php" style="text-decoration:none;"> <i class="fa fa-mail-reply"></i> </a> Vital Info</legend>

                              <?php if(isset($_GET['edit'])){
                              $data = fetchUser($_GET['edit']);?>
                                <form action="profile-edit.php?edit=<?php echo $_GET['edit']; ?>" method="post">
                                  <?php if(isset($_POST['edit_profile'])) echo $error;  ?>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Username</label>
                                    <div class="col-md-8">
                                       <?php echo $data['super_user']; ?>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Fullname</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="" name="Fullname" value="<?php echo $data['super_fullname']; ?>"/>
                                    </div>
                                </div>
                                <br>
                                     <div class="form-group">
                                    <label class="col-md-4 control-label">Department</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="" name="Department" value="<?php echo $data['super_department']; ?>"/>
                                    </div>
                                </div>
                                <br>
                                  <div class="form-group">
                                    <label class="col-md-4 control-label">Nationality</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="" name="Nationality" value="<?php echo $data['super_nationality']; ?>"/>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">State Of Origin</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="" name="State" value="<?php echo $data['stateoforigin']; ?>"/>
                                    </div>
                                </div>


                                <center>
                                <button class="btn btn-primary" type="submit" name="edit_profile" style="margin-top:10px;">
													        <i class="fa fa-save"></i>  Save Profile
                                </button>
                              </center>
                              </form>
                            <?php } ?>
                        </fieldset>

                        </div>

                    </div>

                </div>
    </main>
    <script>
    document.querySelector('#page-content > div.row > div:nth-child(2) > div.block.full > form')
    </script>


<?php
require "footer.php";
?>
