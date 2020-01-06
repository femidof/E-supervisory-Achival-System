<?php

?>
<?php
    require "header.php";
    ?>

    <main>
      <section class="site-section site-section-light site-section-top themed-background-dark-fire">
      <div class="container">
                    <h1 class="text-center animation-slideDown"><i class="fa fa-arrow-right"></i> <strong>ADMIN DASHBOARD</strong></h1>

                </div>
      </section>


              
<!-- Home Carousel -->
<div id="home-carousel" class="carousel carousel-home slide" data-ride="carousel" data-interval="5000">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="active item">
                        <a href ="submission.php">
                        <section class="site-section site-section-light site-section-top themed-background-dark-default">
                            <div class="container">
                            <h1 class="text-center animation-fadeIn">
                            <i class = "fa fa-document" aria-hidden="true"></i>
                                </h1>
                                <h1 class="text-center animation-slideDown hidden-xs"><strong>SUBMISSIONS</strong></h1>
                                <h2 class="text-center animation-slideUp push hidden-xs">Check Project Submission Status </h2>
                               
                            </div>
                        </section>
                        </a>
                    </div>
                    <div class="item">
                    <a href ="users.php">
                        <section class="site-section site-section-light site-section-top themed-background-dark-fire">
                            <div class="container">
                            <h1 class="text-center animation-fadeIn">
                            <i class = "fa fa-user" aria-hidden="true"></i>
                                </h1>
                                <h1 class="text-center animation-fadeIn360 hidden-xs"><strong>ALL USERS</strong></h1>
                                <h2 class="text-center animation-fadeIn360 push hidden-xs">Check Users and Supervisors</h2>
                             </div>
                        </section>
                        </a>
                    </div>
                    <div class="item">
                    <a href ="project.php">
                        <section class="site-section site-section-light site-section-top themed-background-dark-fire">
                            <div class="container">
                            <h1 class="text-center animation-fadeIn">
                            <i class = "fa fa-folder" aria-hidden="true"></i>
                                </h1>
                                <h1 class="text-center animation-fadeIn360 hidden-xs"><strong>PROJECTS</strong></h1>
                                <h2 class="text-center animation-fadeIn360 push hidden-xs">Review project</h2>
                             </div>
                        </section>
                        </a>
                    </div>
                <!-- END Wrapper for slides -->

                <!-- Controls -->
                <a class="left carousel-control" href="#home-carousel" data-slide="prev">
                    <span>
                        <i class="fa fa-chevron-left"></i>
                    </span>
                </a>
                <a class="right carousel-control" href="#home-carousel" data-slide="next">
                    <span>
                        <i class="fa fa-chevron-right"></i>
                    </span>
                </a>
                <!-- END Controls -->
            </div>
            <!-- END Home Carousel -->

    </main>


<?php
require "footer.php";
?>
