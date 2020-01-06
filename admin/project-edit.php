<?php
    require "header.php";
    ?>

    <main>
        
            <section class="site-section site-section-light site-section-top themed-background-fire ">
            <div class="container text-center">
                    <h1 class="animation-slideDown"><strong>ADD PROJECT</strong></h1>
                </div>
            
            </section>
        

            <div class="site-content site-section">


            <html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css\bootstrap.min.css">
    <title>Create Project</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
    }
</style>
<body>

<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Create Project</h3> 
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="#">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Project Title" name="ptitle" type="text" autofocus>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Project Department" name="pdepartment" type="text" autofocus>
                            </div>
                            

                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Create Project" name="create-project" >

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

<?php

include("includes/dbh.inc.php");//make connection here
if(isset($_POST['create-project']))
{
    $ptitle=$_POST['ptitle'];
    $pdepartment=$_POST['pdepartment'];
    

    if($ptitle=='')
    {
        //javascript use for input checking
        echo"<script>alert('Please enter the Project Title')</script>";
exit();//this use if first is not work then other will not show
    }

    if($pdepartment=='')
    {
        echo"<script>alert('Please enter the Department')</script>";
exit();
    }

   
//here query check weather if user already registered so can't register again.
    $check_project_query="select * from project WHERE project_name='$ptitle'";
    $run_query=mysqli_query($conn,$check_project_query);

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Project $ptitle is already existing in our database, Please try another one!')</script>";
exit();
    }
//insert the user into the database.
    $insert_project="insert into project (project_name,project_department) VALUE ('$ptitle','$pdepartment')";
    if(mysqli_query($conn,$insert_project))
    {
        echo"<script>window.open('project.php','_self')</script>";
    }

}

?>






            </div>



    </main>