<?php
    get_header();
?>

<script src="<?php echo get_stylesheet_directory_uri() . '/js/splide.min.js'; ?>"></script>
<link href="<?php echo get_stylesheet_directory_uri() . '/css/splide.min.css'; ?>" rel="stylesheet" >

    <main id="primary" class="site-main case-study">

        <section class="case-study-intro py-5">
            <div class="container h-100" style="position:relative; ">
                <h6 style="color:white;font-family: 'Mulish', sans-serif !important; margin: 0px 2px;">Case-study</h6>
                <div class="row h-100 d-flex align-items-center">
                    <div class="col-12 text-center">

                        <h1>Availability Manager</h1>
                        <h3>A Woocommerce Bookings extension</h3>

                        <hr class="accent hr-red">

                        <p>The Woocommerce Bookings plugin had everything the client needed, except that it proved unwieldy in their use case. They needed a way to change data in bulk, saving heaps of time and preventing crucial user errors.</p>

                    </div>
                    <div class="col-12 d-flex justify-content-end">

                        <div id="image-slider" class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <img class="about_page_screenshot" src="http://carrassi/wp-content/uploads/2022/01/chrome_8hROCQN5D8.png"/>
                                        <div>
                                            Description 01
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <img class="about_page_screenshot" src="http://carrassi/wp-content/uploads/2022/01/chrome_8hROCQN5D8.png"/>
                                        <div>
                                            Description 02
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <img class="about_page_screenshot" src="http://carrassi/wp-content/uploads/2022/01/chrome_8hROCQN5D8.png"/>
                                        <div>
                                            Description 03
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 text-center">
                        <button class="btn_about_page_item red">
                            Case-study
                        </button>
                    </div>
                </div>

                <div class="row h-100 d-flex align-items-center">
                    <div class="col-6">
                        <h6 style="color:white;font-family: 'Mulish', sans-serif !important; margin: 0px 2px;">Case-study</h6>

                        <h1>Availability Manager</h1>
                        <hr class="accent hr-red">

                        <!--                    <h3>A Woocommerce Bookings extension</h3>-->
                        <p>The Woocommerce Bookings plugin had everything the client needed, except that it proved unwieldy in their use case. They needed a way to change data in bulk, saving heaps of time and preventing crucial user errors.</p>
                        <a href='<?php echo get_page_link(183); ?>'>
                            <button class="btn_about_page_item red">
                                Case-study
                            </button>
                        </a>
                    </div>
                    <div class="col-6 d-flex justify-content-end">

                        <div class="image_base red" style="    display: inline-block;
                                                                background: url(http://carrassi/wp-content/uploads/2022/01/chrome_8hROCQN5D8.png);
                                                                /* background-size: cover; */
                                                                background-repeat: no-repeat;
                                                                width: 598px;
                                                                height: 350px;
                                                                transform: perspective(1029px) rotateX( 4deg) rotateY( -16deg) rotateZ(  3deg);
                                                                box-shadow: 24px 16px 64px 10px rgb(0 0 0);
                                                                border-radius: 9px;
                                                                /* border: 1px solid red; */
                                                                /* top: 0; */
                                                                /* right: 0; */
                                                                /* z-index: 1; */
                                                                /* position: absolute; */
                                                                opacity: 1;
                                                           ">

                        </div>
                    </div>
                </div>

            </div>

        </section>


        <section class="contact_form" id="contact">
            <div class="container">
                <div class="col-12 mb-5">
                    <h1>
                        Contact
                    </h1>
                    <div class="contact_text">
                        Interested in developing a Wordpress plugin or Android app? Or do you have a different enquiry?
                    </div>

                </div>

                <form>
                    <div>
                        <input class="form-control mb-3" name="name" placeholder="Your name" required/>
                    </div>

                    <div>
                        <input class="form-control mb-3" name="email" type="email" placeholder="Your email" required/>
                    </div>

                    <div>
                        <textarea class="form-control mb-3" name="message" rows="10" placeholder="What's up?"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit"  class="btn btn-lg btn-yellow">

                            <div class="spinner-grow text-light spinner" role="status" style="display:none;">
                            </div>

                            <span class="button_text">
                                Submit
                            </span>
                        </button>
                    </div>

                </form>
            </div>
        </section>
    </main>

<?php
get_footer();?>