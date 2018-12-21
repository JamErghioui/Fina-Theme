<?php get_header(); ?>

<!--FIL D'ARIANE-->
<section id="pagetitle-container">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <ul class="uk-breadcrumb uk-margin-top uk-float-right">
                    <li><a href="<?php echo get_home_url() ?>"><?php echo get_the_title( get_option('page_on_front') ); ?></a></li>
                    <?php
                    $category = get_the_category();
                    $category_parent = $category[0]->category_parent;
                    $parent = get_terms('category', [
                        'term_taxonomy_id' => $category_parent
                    ]);
                    $link = get_category_link($parent[0]);
                    ?>
                    <li><a href="<?php echo $link; ?>"><?php echo $parent[0]->name; ?></a></li>
                    <li><?php _e('POST','wp-theme-base-translate') ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--END FIL D'ARIANE-->

<!--POST CONTENT-->
<section class="uk-margin-large-bottom">
    <div class="uk-container">
        <div class="uk-grid uk-margin-medium-top">
            <div class="uk-width-1-1 uk-margin-medium-bottom">
                <?php
                while ( have_posts() ) : the_post();
                    ?>
                    <h2><?php the_title(); ?></h2>
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                    <div class="uk-margin-large-left" style="text-align: justify">
                        <hr>
                        <div class="uk-margin-small-bottom">
                            <a href="" class="uk-icon-button twitter uk-margin-small-right" data-uk-icon="icon: twitter"></a>
                            <a href="" class="uk-icon-button facebook uk-margin-small-right" data-uk-icon="icon: facebook"></a>
                            <a href="" class="uk-icon-button linkedin uk-margin-small-right" data-uk-icon="icon: linkedin"></a>
                            <a href="" class="uk-icon-button" data-uk-icon="icon: mail"></a>
                        </div>
                        <p><?php the_content() ?></p>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
</section>
<!--END POST CONTENT-->

<?php get_footer(); ?>