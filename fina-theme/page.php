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

<!--POST TYPE PARTNERS-->
<section class="uk-margin-medium-bottom">
    <div class="uk-container uk-container-expand uk-background-default">
        <div class="uk-container uk-margin-medium-top uk-margin-medium-bottom">
            <div class="uk-grid">
                <div class="uk-width-1-1">

                    <?php
                    while ( have_posts() ) : the_post(); ?>
                        <h2 class="uk-margin-small-top uk-margin-remove-bottom"><?php echo get_field("about_us_title") ?></h2>
                        <p class="uk-text-lead uk-margin-small-bottom"><?php the_content() ?></p>
                    <?php endwhile;
                    ?>

                    <div class="uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-1@s uk-margin-medium-top uk-text-center" data-uk-grid>

                        <?php
                        $query = new WP_Query([
                            'order'=>'ASC',
                            'order_by'=>'date',
                            'post_type'=> 'partner',
                            'posts_per_page' => -1
                        ]);

                        if($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post(); ?>
                                <!-- Partner begin -->
                                    <div>
                                        <img class="uk-border-circle uk-margin-remove-bottom" src="<?php echo get_the_post_thumbnail_url(); ?>" width="200" height="200" alt="" />
                                        <h4 class="uk-margin-small-top uk-margin-remove-bottom"><?php echo get_field("identity") ?></h4>
                                        <p class="uk-margin-remove-top"><?php echo get_field("fonction") ?></p>
                                    </div>
                                <!-- Partner end -->
                            <?php endwhile;
                        else : ?>
                            <div> <img class="uk-border-circle uk-margin-remove-bottom" src="<?php echo get_stylesheet_directory_uri() ?>/images/content/team1.jpg" width="200" height="200" alt="" />
                                <h4 class="uk-margin-small-top uk-margin-remove-bottom">Dylan Jackson</h4>
                                <p class="uk-margin-remove-top">President and CEO</p>
                            </div>
                            <div> <img class="uk-border-circle uk-margin-remove-bottom" src="<?php echo get_stylesheet_directory_uri() ?>/images/content/team2.jpg" width="200" height="200" alt="" />
                                <h4 class="uk-margin-small-top uk-margin-remove-bottom">Pamela James</h4>
                                <p class="uk-margin-remove-top">Chief Financial Officer</p>
                            </div>
                            <div> <img class="uk-border-circle uk-margin-remove-bottom" src="<?php echo get_stylesheet_directory_uri() ?>/images/content/team3.jpg" width="200" height="200" alt="" />
                                <h4 class="uk-margin-small-top uk-margin-remove-bottom">Sean Jacobs</h4>
                                <p class="uk-margin-remove-top">Chief Information Officer</p>
                            </div>
                        <?php endif;
                        wp_reset_postdata()
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END POST TYPE PARTNERS-->

<!--JOB ABOUT US-->
<section class="uk-margin-large-bottom">
    <div class="uk-container">
        <div class="uk-grid uk-margin-top">
            <div class="uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                <div class="uk-card uk-card-medium uk-card-secondary uk-card-body uk-margin-bottom">
                    <h6 class="uk-text-uppercase uk-margin-remove-bottom"><?php echo get_field('titre_job'); ?></h6>
                    <p class="uk-margin-small-top"><?php echo get_field('content_job'); ?></p>
                    <?php $link = get_field('submit_job_link'); ?>
                    <a class="uk-button uk-button-primary" href="<?php if($link){ echo $link['url']; } ?>"><?php if($link){ echo $link['title']; }else{ echo "hors service"; } ?></a>
                </div>
            </div>
            <div class="uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                <p class="uk-text-lead"><?php echo get_field('inspiration_quote'); ?></p>
                <ul class="uk-list idz-list-check">
                    <?php
                    if( have_rows('check_list') ):
                        while ( have_rows('check_list') ) : the_row();
                        $element = get_sub_field('check_list_element'); ?>
                        <li><?php echo $element ?></li>
                        <?php endwhile;
                    else : ?>
                        <li>Approximately 1,200 financial consultants</li>
                        <li>$117.9 billion enrolled in advisory solutions</li>
                        <li>100,000+ financial plans provided to date</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--END JOB ABOUT US-->

<?php get_footer(); ?>