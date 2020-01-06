<?php
    require "header.php";
    ?>

    <main>
        
            <!-- Media Container -->
            <div class="media-container">
                <!-- Intro -->
                <section class="site-section site-section-light site-section-top">
                    <div class="container text-center">
                        <h1 class="animation-slideDown"><strong>Welcome to our E-Supervisory System!</strong></h1>
                        <h2 class="h3 animation-slideUp hidden-xs">Explore over 5.000 products!</h2>
                    </div>
                </section>
                <!-- END Intro -->

                <!-- For best results use an image with a resolution of 2560x279 pixels -->
                <img src="img/placeholders/headers/store_home.jpg" alt="" class="media-image animation-pulseSlow">
            </div>
         
        
<!-- Home Carousel -->
<div id="home-carousel" class="carousel carousel-home slide" data-ride="carousel" data-interval="5000">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="active item">
                        <a href ="project.php">
                        <section class="site-section site-section-light site-section-top themed-background-dark-default">
                            <div class="container">
                            <h1 class="text-center animation-fadeIn">
                            <i class = "fa fa-folder" aria-hidden="true"></i>
                                </h1>
                                <h1 class="text-center animation-slideDown hidden-xs"><strong>PROJECT</strong></h1>
                                <h2 class="text-center animation-slideUp push hidden-xs">Select/Check Your Project Status </h2>
                               
                            </div>
                        </section>
                        </a>
                    </div>
                    <div class="item">
                    <a href ="project.php">
                        <section class="site-section site-section-light site-section-top themed-background-dark-fire">
                            <div class="container">
                            <h1 class="text-center animation-fadeIn">
                            <i class = "fa fa-user" aria-hidden="true"></i>
                                </h1>
                                <h1 class="text-center animation-fadeIn360 hidden-xs"><strong>USER</strong></h1>
                                <h2 class="text-center animation-fadeIn360 push hidden-xs">Letting you focus on creating your project</h2>
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