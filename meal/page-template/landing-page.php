<?php
/*
 * Template Name:Landing Page template
 */

get_header();
?>
    <div class="main-wrap " id="section-home">
        <?php
        $current_post_id=get_the_ID();
        $current_post_id=get_post_meta($current_post_id,'select_sections',true);

      foreach ($current_post_id as $current_section_id){
         $meal_section_id=$current_section_id;
         $current_section_meta_type=get_post_meta($meal_section_id,"select_section_type",true);
          get_template_part("/sections-templates/{$current_section_meta_type}");
      }

        ?>




        <div class="map-wrap" id="map" data-aos="fade"></div>


        <footer class="ftco-footer">
            <div class="container">

                <div class="row">
                    <div class="col-md-4 mb-5">
                        <div class="footer-widget">
                            <h3 class="mb-4">About Meal</h3>
                            <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild
                                Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. </p>
                            <!-- <input type="submit" class="btn btn-primary btn-outline-primary" value="Send Message"> -->
                            <p><a href="https://free-template.co" target="_blank"
                                  class="btn btn-primary btn-outline-primary">More Templates</a></p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="footer-widget">
                            <h3 class="mb-4">Lunch Service</h3>
                            <p>Booking from 12:00pm &mdash; 1:30pm</p>
                            <h3 class="mb-4">Dinner Service</h3>
                            <p>Everyday: <br> Booking from 6:00pm &mdash; 9:00pm</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="footer-widget">
                            <h3 class="mb-4">Follow Along</h3>
                            <ul class="list-unstyled social">
                                <li><a href="#"><span class="fa fa-tripadvisor"></span></a></li>
                                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                            </ul>
                        </div>
                        <div class="footer-widget">
                            <h3 class="mb-4">Newsletter</h3>
                            <form action="#" class="ftco-footer-newsletter">
                                <div class="form-group">
                                    <button class="button"><span class="fa fa-envelope"></span></button>
                                    <input type="email" class="form-control" placeholder="Enter Email">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="row pt-5">
                    <div class="col-md-12 text-center">
                        <p>&copy; Copyright 2018. All Rights Reserved. Designed &amp; Developed by <a
                                    href="https://free-template.co/">Free-Template.co</a></p>
                    </div>
                </div>
            </div>
        </footer>

    </div>
<?php
get_footer();