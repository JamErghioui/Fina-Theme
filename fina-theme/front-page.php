<?php
get_header();
?>

<!--SLIDER-->
<section id="slideshow-container">
        <!-- Slideshow wrapper begin -->
        <div data-uk-slideshow="autoplay: true; animation: slide; max-height: 500">
            <div class="uk-position-relative">
                <ul class="uk-slideshow-items">
                <?php
                $query = new WP_Query([
                    'order'=>'ASC',
                    'order_by'=>'date',
                    'post_type'=> 'slide',
                    'posts_per_page' => -1
                ]);

                if($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                    <!-- Slide begin -->
                    <li>
                        <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center">
                            <img src="<?php
                                echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : 'wp-content/themes/fina-theme/images/slideshow/bg_slide1.jpg' ;
                            ?>" alt="" uk-cover>
                        </div>
                        <div class="uk-container uk-position-center">
                            <div class="uk-grid">
                                <div class="uk-width-3-4@l uk-width-1-1@s uk-margin-medium-left">
                                    <h1 class="uk-margin-small-bottom"><?php the_title() ?></h1>
                                    <h3 class="uk-margin-small-top uk-margin-medium-bottom idz-thin uk-visible@m">You do life, we do investing</h3>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Slide end -->
                <?php
                    endwhile;
                else :
                ?>
                    <li>
                        <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center">
                            <img src="wp-content/themes/fina-theme/images/slideshow/bg_slide1.jpg" alt="" uk-cover>
                        </div>
                        <div class="uk-container uk-position-center">
                            <div class="uk-grid">
                                <div class="uk-width-3-4@l uk-width-1-1@s uk-margin-medium-left">
                                    <h1 class="uk-margin-small-bottom">Personnalisez votre slider.</h1>
                                    <h3 class="uk-margin-small-top uk-margin-medium-bottom idz-thin uk-visible@m">Dans la section Carrousel</h3>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php
                endif;
                wp_reset_postdata()
                ?>
                </ul>
            </div>
            <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
        </div>
        <!-- Slideshow wrapper end -->
    </section>
<!--END-SLIDER-->

<!--ASSETS-->
<section style="padding-top: 30px">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="uk-card uk-card-default uk-card-body">
                        <h2 class="uk-text-center"><?php echo get_field('titre_asset') ?></h2>
                        <div class="uk-child-width-1-4@l uk-child-width-1-2@m uk-child-width-1-1@s" data-uk-grid>
                        <?php
                        $query = new WP_Query([
                            'order'=>'ASC',
                            'order_by'=>'date',
                            'post_type'=> 'asset',
                            'posts_per_page' => -1
                        ]);

                        if($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                        ?>
                            <!-- Atout begin -->
                            <div class="uk-text-center"> <img class="uk-margin-bottom" src="
                            <?php
                                echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : 'wp-content/themes/fina-theme/images/content/content_icon1.png' ;
                            ?>" alt="">
                                <h6 class="uk-text-uppercase uk-text-muted uk-margin-remove-top uk-margin-small-bottom"><?php the_title() ?></h6>
                                <p class="uk-margin-remove-top"><?php the_content() ?></p>
                            </div>
                            <!-- Atout end -->
                        <?php
                            endwhile;
                        else :
                        ?>
                            <div class="uk-text-center"> <img class="uk-margin-bottom" src="wp-content/themes/fina-theme/images/content/content_icon1.png" alt="">
                                <h6 class="uk-text-uppercase uk-text-muted uk-margin-remove-top uk-margin-small-bottom">Atout</h6>
                                <p class="uk-margin-remove-top">Personnalisez vos atouts dans la section Atouts</p>
                            </div>
                            <div class="uk-text-center"> <img class="uk-margin-bottom" src="wp-content/themes/fina-theme/images/content/content_icon2.png" alt="">
                                <h6 class="uk-text-uppercase uk-text-muted uk-margin-remove-top uk-margin-small-bottom">Atout</h6>
                                <p class="uk-margin-remove-top">Personnalisez vos atouts dans la section Atouts</p>
                            </div>
                            <div class="uk-text-center"> <img class="uk-margin-bottom" src="wp-content/themes/fina-theme/images/content/content_icon3.png" alt="">
                                <h6 class="uk-text-uppercase uk-text-muted uk-margin-remove-top uk-margin-small-bottom">Atout</h6>
                                <p class="uk-margin-remove-top">Personnalisez vos atouts dans la section Atouts</p>
                            </div>
                            <div class="uk-text-center"> <img class="uk-margin-bottom" src="wp-content/themes/fina-theme/images/content/content_icon4.png" alt="">
                                <h6 class="uk-text-uppercase uk-text-muted uk-margin-remove-top uk-margin-small-bottom">Atout</h6>
                                <p class="uk-margin-remove-top">Personnalisez vos atouts dans la section Atouts</p>
                            </div>
                        <?php
                        endif;
                        wp_reset_postdata()
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--END-ASSETS-->

<!--CONTENT-&-CATEGORY-->
<section class="uk-margin-large-bottom idz-invest-product">
        <div class="uk-container">
            <div class="uk-grid uk-margin-small-top">
                <div class="uk-width-3-5@l uk-width-1-1@m uk-width-1-1@s">
                    <h2 class="uk-margin-remove-bottom"><?php echo get_bloginfo( 'name' ) ?></h2>
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post(); ?>
                        <h3 class="uk-margin-remove-top idz-thin"><?php echo get_field("front_sub_title"); ?></h3>
                        <p class="uk-text-lead"><?php echo get_the_content(); ?></p>
                    <?php endwhile; // End of the loop.
                    ?>
                    <div class="uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-small uk-grid-match uk-margin-medium-top" data-uk-grid>
                        <?php

                        // On recupère la categorie parent a l'aide du slug , pour en extraire l'id

                        $category_parent = get_terms('category', [
                            'slug' => 'news'
                        ]);

                        // On recupère tout les enfants de la catégorie parent à l'aide de son id

                        $categories = get_terms('category', [
                                'hide_empty' => true,
                                'child_of' => $category_parent[0]->term_id
                        ]);

                        /* Start the Loop */
                        foreach($categories as $category){

                            $color = get_field('color', $category);
                            $link = get_category_link($category);

                            echo "  <div>
                                        <div class=\"uk-card uk-card-primary uk-card-small uk-card-body uk-inline idz-invest-card \" style='background-color: $color;'>
                                            <h6 class=\"uk-text-uppercase uk-margin-small-bottom\"> $category->name </h6>
                                            <p class=\"uk-margin-remove-top\"> $category->description </p>
                                            <div class=\"uk-position-bottom-right\"> <a href=\"$link\"><i class=\"fa fa-2x fa-angle-right\"></i></a> </div>
                                        </div>
                                    </div>";
                        }
                        // End of the loop.
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--END-CONTENT-&-CATEGORY-->

<!--FORM SECTION-->
<section>
    <div class="uk-container uk-container-expand idz-create-account">
        <div class="uk-container uk-margin-medium-top uk-margin-medium-bottom">
            <div class="uk-width-1-1">
                <h2 class="uk-margin-small-bottom"><?php _e('Open your account','wp-theme-base-translate'); ?></h2>
                <p class="uk-text-lead uk-margin-remove-top uk-visible@m"><?php _e('Connect with over 5 millions investors in the world’s leading social investment network','wp-theme-base-translate'); ?></p>

                <!--FORM-->
                <form class="uk-grid-small uk-margin-bottom" data-uk-grid method="post">
                    <input name="form" type="hidden" value="account">
                    <div class="uk-width-1-5@l uk-width-1-4@s">
                        <input class="uk-input" type="text" placeholder="<?php _e('Full name','wp-theme-base-translate') ?>" name="fullname"> </div>
                    <div class="uk-width-1-5@l uk-width-1-4@s">
                        <input class="uk-input" type="text" placeholder="<?php _e('Email address','wp-theme-base-translate') ?>" name="email"> </div>
                    <div class="uk-width-1-5@l uk-width-1-4@s">
                        <input class="uk-input" type="text" placeholder="<?php _e('Phone number','wp-theme-base-translate') ?>" name="phone"> </div>
                    <div class="uk-width-1-5@l uk-width-1-4@s">
                        <input class="uk-button uk-button-primary" type="submit" value="<?php _e('Create account','wp-theme-base-translate'); ?>">
                    </div>
                </form>
                <!-- END FORM-->

            </div>
        </div>
    </div>
</section>
<!--END-FORM SECTION-->

<?php
get_footer();
?>