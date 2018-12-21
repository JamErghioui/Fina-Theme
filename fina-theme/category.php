<?php get_header(); ?>

<!--FIL D'ARIANE-->
<section id="pagetitle-container">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <ul class="uk-breadcrumb uk-margin-top uk-float-right">
                    <li><a href="<?php echo get_home_url() ?>"><?php echo get_the_title( get_option('page_on_front') ); ?></a></li>
                    <?php
                    $queried_object = get_queried_object();
                    $link = get_category_link($queried_object);

                    if($queried_object->parent != 0){
                        $parent = get_terms('category', [
                            'term_taxonomy_id' => $queried_object->parent
                        ]);
                        $link_parent = get_category_link($parent[0]);

                        echo "<li><a href='$link_parent'>".$parent[0]->name."</a></li>";
                    }
                    ?>

                    <li><a href="<?php echo $link; ?>"><?php echo $queried_object->name; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--END FIL D'ARIANE-->


<!--POST LOOP-->
<section class="uk-margin-large-bottom">
    <div class="uk-container">
        <div class="uk-grid uk-margin-medium-top">
            <!--POST-->
            <div class="uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s">
                <?php
                $current_category = get_queried_object();
                if( have_posts() ) :
                    while( have_posts() ) : the_post();
                        $category = get_the_category();
                        ?>
                        <article class="uk-article idz-article">
                            <p class="uk-article-meta">
                                <span class="uk-label uk-label-success uk-visible@m"> <?php echo $current_category->name; ?> </span>
                                <?php echo get_the_date( 'D j M, Y' ); ?> &nbsp;&nbsp; | &nbsp;&nbsp; <?php _e('Written by','wp-theme-base-translate') ?> <?php echo get_the_author_meta('display_name') ?>
                            </p>
                            <h3 class="uk-margin-small-top">
                                <a class="uk-link-reset" href="<?php echo get_permalink() ?>"><?php the_title() ?></a>
                            </h3>
                            <img class="uk-margin-bottom" src="<?php
                            echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() :  get_stylesheet_directory_uri().'/images/content/blog_picture.jpg' ;
                            ?>" alt="">
                            <div class="uk-margin-large-left" style="text-align: justify">
                                <div class="uk-margin-small-bottom">
                                    <a href="" class="uk-icon-button twitter uk-margin-small-right" data-uk-icon="icon: twitter"></a>
                                    <a href="" class="uk-icon-button facebook uk-margin-small-right" data-uk-icon="icon: facebook"></a>
                                    <a href="" class="uk-icon-button linkedin uk-margin-small-right" data-uk-icon="icon: linkedin"></a>
                                    <a href="" class="uk-icon-button" data-uk-icon="icon: mail"></a>
                                </div>
                                <p><?php echo wp_trim_words( get_the_content(), 40, '...' );?></p>
                                <div> <a class="uk-button uk-button-text" href="<?php echo get_permalink() ?>"><?php _e('Continue Reading','wp-theme-base-translate') ?>...</a> </div>
                            </div>
                        </article>
                    <?php endwhile;

                    $args = [
                        'prev_text' => __( '<' ),
                        'next_text' => __( '>' )
                    ];

                    echo "<nav class=\"uk-pagination uk-margin-large-top\" data-uk-margin>";
                    echo paginate_links($args);
                    echo "</nav>";

                endif;
                ?>
            </div>
            <!--END POST-->
            <!--MENU CATEGORY ASIDE-->
            <div class="uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s">
                <aside class="uk-margin-medium-bottom">
                    <div class="uk-card uk-card-default idz-widget-card uk-card-body">
                        <h5 class="uk-text-uppercase uk-margin-remove-bottom">Categories</h5>
                        <ul class="uk-list uk-list-divider idz-categories-widget">
                            <?php
                            wp_nav_menu([
                                'theme_location' => 'category-menu',
                                'container_class' => false,
                                'items_wrap' => '%3$s',
                                'container' => false,
                            ]);
                            ?>
                        </ul>
                    </div>
                </aside>
            </div>
            <!--END MENU CATEGORY ASIDE-->
        </div>
    </div>
</section>
<!--END POST LOOP-->

<?php get_footer(); ?>