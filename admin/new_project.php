<?php
    require "header.php";
   require "includes/functions.inc.php";
   require "includes/dbh.inc.php";
    ?>

    <?php

    if(isset($_POST['edit_profile'])){
   if(updateProfile($_GET['edit'],$_POST['Username'], $_POST['Firstname'], $_POST['Department'], $_POST['Course'], $_POST['Nationality'], $_POST['State'])){
     $error = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Student record has been updated</button></div>";
   }else{
     $error = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-danger'>An unknown error occured!</button>
     </div>";
   }

 }
?>

<?php

if(isset($_POST['create_project'])){

  $project_title = $_POST['ProjectTitle'];
  $project_department = $_POST['ProjectDepartment'];

  $result = $conn->query("SELECT id FROM project WHERE project_name = '".$project_title."' LIMIT 1");
    			if($result->num_rows > 0){
            echo "<script type = 'text/javascript'> alert('Sorry You Cannot Have Projects With The Same Name. Go Back'); window.location = 'new_project.php'; </script>";
    exit();
  }
  else{

  $file = fopen("../projects/".$project_title.".txt","w+") or die("file not open");

$sql=mysqli_query($conn, "insert into project(project_name, project_department) values('$project_title','$project_department')");
$error = "<div style='margin-bottom:30px;'><button type='button' class='btn btn-lg btn-block btn-success'>Project has been Uploaded</button></div>";


  fclose($file);
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
                    <strong>CREATE A NEW PROJECT</strong></h1>
                </div>

            </section>


            <div class="site-content site-section">
                    <div class="row">
                        <div class="col-md-10">
                        <div class="block-full">
                        </div>
                                <form action="new_project.php" method="post" style="margin-left:20em;">
                                  <?php if(isset($_POST['create_project'])) echo $error;  ?>
                                  <div class="content-box-large box-with-header">
      <div>

      <div class="row">
        <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Project Title" name="ProjectTitle" />
        </div>
      </div>

      <hr>
<div class="row">
        <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Project Department" name="ProjectDepartment"/>
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
    </main>
    <script>
    document.querySelector('#page-content > div.row > div:nth-child(2) > div.block.full > form')
    </script>


<?php
require "footer.php";
?>
