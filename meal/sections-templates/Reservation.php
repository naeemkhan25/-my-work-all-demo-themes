<?php
global $meal_section_id;
$meal_post=get_post($meal_section_id);
$meal_post_title=$meal_post->post_title;
$meal_post_content=$meal_post->post_content;
?>
<div class="section bg-light" data-aos="fade-up" id="<?php echo esc_attr($meal_post->post_name);?>">
    <div class="container">
        <div class="row section-heading justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class="heading mb-3"><?php echo esc_html($meal_post_title); ?></h2>
                <p class="sub-heading mb-5">
                    <?php
                    echo $meal_post_content;
                    ?>
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
    <div class="text-center">
        <?php

        ?>

    </div>
            <div class="col-md-10 p-5 form-wrap">
                <form action="#<?php //echo home_url("/") ?>" method="post">
                    <?php
                    wp_nonce_field("reservation","nr");
                    ?>
                    <div class="row mb-4">
                        <div class="form-group col-md-4">
                            <label for="name" class="label">Name</label>
                            <div class="form-field-icon-wrap">
                                <span class="icon ion-android-person"></span>
                                <input type="text" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email" class="label">Email</label>
                            <div class="form-field-icon-wrap">
                                <span class="icon ion-email"></span>
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone" class="label">Phone</label>
                            <div class="form-field-icon-wrap">
                                <span class="icon ion-android-call"></span>
                                <input type="text" class="form-control" id="phone">
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="persons" class="label">Number of Persons</label>
                            <div class="form-field-icon-wrap">
                                <span class="icon ion-android-arrow-dropdown"></span>
                                <select name="persons" id="persons" class="form-control">
                                    <option value="1">1 person</option>
                                    <option value="2">2 persons</option>
                                    <option value="3">3 persons</option>
                                    <option value="4">4 persons</option>
                                    <option value="5">5+ persons</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date" class="label">Date</label>
                            <div class="form-field-icon-wrap">
                                <span class="icon ion-calendar"></span>
                                <input type="text" class="form-control" id="date">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="time" class="label">Time</label>
                            <div class="form-field-icon-wrap">
                                <span class="icon ion-android-time"></span>
                                <input type="text" class="form-control" id="time">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <input id="reservenow" type="submit" class="btn btn-primary btn-outline-primary btn-block"
                                   value="Reserve Now">
                            <a href="#"  style="display: none" class="btn btn-primary btn-outline-primary btn-block" id="payment"><?php
                                _e("conform payment","meal");
                                ?></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- .section -->