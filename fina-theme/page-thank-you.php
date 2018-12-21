<?php get_header(); ?>
    <section class="uk-margin-large-bottom">
        <div class="uk-container">
            <div class="uk-grid uk-margin-medium-top">
                <div class="uk-width-1-1 uk-margin-medium-bottom">
                    <h2><?php _e('Thank you','wp-theme-base-translate'); ?></h2>
                    <p>
                        <?php echo isset($_SESSION["formSubmit"]) ? $_SESSION["formSubmit"] : ""; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>