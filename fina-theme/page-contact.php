<?php get_header(); ?>

<!--FIL D'ARIANE-->
<section id="pagetitle-container">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <!-- Breadcrumb begin -->
                <ul class="uk-breadcrumb uk-margin-top uk-float-right">
                    <li><a href="<?php echo get_home_url() ?>"><?php echo get_the_title( get_option('page_on_front') ); ?></a></li>
                    <li><a href="#"><?php echo get_the_title(); ?></a></li>
                </ul>
                <!-- Breadcrumb end -->
            </div>
        </div>
    </div>
</section>
<!--END FIL D'ARIANE-->

<!--SECTION BODY-->
<section class="uk-margin-large-bottom">
    <div class="uk-container">
        <div class="uk-grid uk-margin-medium-top">
            <div class="uk-width-1-1 uk-margin-medium-bottom">
                <!--SECTION HEADER-->
                <?php while ( have_posts() ) : the_post(); ?>
                    <h2><?php echo get_field("contact_title") ?></h2>
                    <p class="uk-text-lead"><?php the_content() ?></p>
                <?php endwhile; ?>
                <!--SECTION HEADER END-->
                <div class="uk-card uk-card-default uk-card-medium uk-margin-medium-top">
                    <!--SECTION CARDS-->
                    <div class="uk-card-body">
                        <div class="uk-child-width-1-3@m uk-grid-divider uk-grid-medium uk-grid-match" data-uk-grid>
                            <?php
                            if( have_rows('card_list') ):
                                while ( have_rows('card_list') ) : the_row();
                                    $card_titre         = get_sub_field('card_list_title');
                                    $card_description   = get_sub_field('card_list_description');
                                    $card_mail          = get_sub_field('card_list_mail'); ?>

                                <div>
                                    <h6 class="uk-text-uppercase uk-margin-remove-bottom"><?php echo $card_titre; ?></h6>
                                    <p class="uk-margin-small-top"><?php echo $card_description; ?></p>
                                    <ul class="uk-list idz-list-contact uk-text-success uk-margin-remove-top">
                                        <li><span class="uk-label uk-label-success"><i class="fa fa-envelope"></i></span> <span class="uk-margin-small-left"><?php echo $card_mail; ?></span></li>
                                    </ul>
                                </div>

                                <?php endwhile;
                            else : ?>
                                <div>
                                    <h6 class="uk-text-uppercase uk-margin-remove-bottom">Investor Relations</h6>
                                    <p class="uk-margin-small-top">For existing or prospective Limited Partner/investor inquiries</p>
                                    <ul class="uk-list idz-list-contact uk-text-success uk-margin-remove-top">
                                        <li><span class="uk-label uk-label-success"><i class="fa fa-envelope"></i></span> <span class="uk-margin-small-left">investorrelations@fina.com</span></li>
                                    </ul>
                                </div>
                                <div>
                                    <h6 class="uk-text-uppercase uk-margin-remove-bottom">Public Relations</h6>
                                    <p class="uk-margin-small-top">For press, speaking or marketing related inquiries</p>
                                    <ul class="uk-list idz-list-contact uk-text-success uk-margin-remove-top">
                                        <li><span class="uk-label uk-label-success"><i class="fa fa-envelope"></i></span> <span class="uk-margin-small-left">publicrelations@fina.com</span></li>
                                    </ul>
                                </div>
                                <div>
                                    <h6 class="uk-text-uppercase uk-margin-remove-bottom">Business Plan Submissions</h6>
                                    <p class="uk-margin-small-top">For business plan submissions. Please submit here or using form below.</p>
                                    <ul class="uk-list idz-list-contact uk-text-success uk-margin-remove-top">
                                        <li><span class="uk-label uk-label-success"><i class="fa fa-envelope"></i></span> <span class="uk-margin-small-left">businessplan@fina.com</span></li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!--SECTION CARDS END-->
                    <!--SECTION GOOGLE-->
                    <div class="uk-card-media-bottom">
                        <div id="map">
                            <div id="map" class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=london&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de"></a></div><style>.mapouter{text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style></div>
                        </div>
                    </div>
                    <!--SECTION GOOGLE END-->
                </div>
            </div>
            <!--SECTION FORM-->
            <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">
                <h3><?php _e('Drop Us a line','wp-theme-base-translate') ?></h3>
                <form class="uk-form" method="post">
                    <input name="form" type="hidden" value="message">
                    <div class="uk-margin uk-width-2-3">
                        <input class="uk-input" name="name" value="" type="text" placeholder="<?php _e('Full name','wp-theme-base-translate') ?>"> </div>
                    <div class="uk-margin uk-width-2-3">
                        <input class="uk-input" name="email" value="" type="email" placeholder="<?php _e('Email address','wp-theme-base-translate') ?>"> </div>
                    <div class="uk-margin uk-width-2-3">
                        <input class="uk-input" name="subject" value="" type="text" placeholder="<?php _e('Subject','wp-theme-base-translate') ?>"> </div>
                    <div class="uk-margin">
                        <textarea class="uk-textarea" name="message" rows="5" placeholder="Message"></textarea>
                    </div>
                    <div>
                        <input class="uk-button uk-button-primary uk-float-left" id="buttonsend" type="submit" value="<?php _e('Send Message','wp-theme-base-translate') ?>">
                    </div>
                </form>
            </div>
            <!--SECTION FORM END-->
        </div>
    </div>
</section>
<!--SECTION BODY END-->

<?php get_footer(); ?>