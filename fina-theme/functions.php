<?php

/*
 *  INCLUDE CSS & JS
 *
 */

if ( ! function_exists( 'fina_enqueue' ) ) {
    function compact_enqueue() {
        wp_enqueue_style( 'mainStyle', get_stylesheet_directory_uri() . '/css/main.css');
        wp_enqueue_script('mainJs', get_stylesheet_directory_uri() . '/js/main.js', array('boostrap-js'), false, true);
    }
    add_action( 'wp_enqueue_scripts', 'fina_enqueue' );
}

/*
 *  ACTIVATE MENUS
 *
 */

if ( ! function_exists('fina_menu_setup') ) {
    function fina_menu_setup(){
        add_theme_support('menus');

        register_nav_menus([
            'header-menu' => 'Header navigation menu',
            'category-menu' => 'Article category list',
            'footer-menu-1' => 'Footer menu gauche',
            'footer-menu-2' => 'Footer menu centre',
            'footer-menu-3' => 'Footer menu droite'
        ]);
    }
    add_action('init', 'fina_menu_setup');
}

/*
 *  ACTIVATE POST THUMBNAILS
 *
 */

add_theme_support('post-thumbnails');

/*
 *  CREATE POST-TYPE
 *
 */

if( ! function_exists('fina_theme_type') ) {
    function fina_theme_type(){
        register_post_type('slide', [
            'labels' => [
                'name' => __('Carrousel')
            ],
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
        ]);
        register_post_type('asset', [
            'labels' => [
                'name' => __('Atouts'),
                'singular_name' => __('Atout')
            ],
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
        ]);
        register_post_type('partner', [
            'labels' => [
                'name' => __('Partenaires'),
                'singular_name' => __('Partenaire')
            ],
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'thumbnail' ),
        ]);
    }
    add_action('init','fina_theme_type');
}

/*
 *  ACTIVATE WIDGETS
 *
 */

if ( ! function_exists('fina_theme_widgets') ) {
    function fina_theme_widgets(){
        register_sidebar([
            'name' => 'Page : Contact ( Google-map )',
            'id' => 'widgets-contact-1',
            'description' => 'Google map',
            'before_widget' => '<div class="uk-card-media-bottom">',
            'after_widget' => '</div>'
        ]);
    }
    add_action('widgets_init','fina_theme_widgets');
}

/*
 *  FORM MANAGEMENT
 *
 */

/*
 * Si pas le droit de créer de fichier, créer au préalable
 * Ensuite donner la permission suffisante au fichier
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['form'])){
        switch ($_POST['form']) {
            case "account":

                //$_SESSION["formSubmit"] = "Veuillez consulter vos mail pour confirmer votre inscription.";

                $log = fopen(__DIR__."/logs/log.txt", "a");
                $txt = date("Y-m-d H:i:s"). ". Form : " . $_POST['form'] . ". Name : " . $_POST['fullname'] . ". Email : " . $_POST['email'] . ". Phone: " . $_POST['phone'] ."\n";

                fwrite($log, $txt);
                fclose($log);

                wp_redirect(get_page_link(320));
                exit;
                break;

            case "message":

                //$_SESSION["formSubmit"] = "Votre message a bien été envoyé.";

                $log = fopen(__DIR__."/logs/log.txt", "a");
                $txt = date("Y-m-d H:i:s"). ". Form : " . $_POST['form'] . ". Name : " . $_POST['name'] . ". Email : " . $_POST['email'] . ". Message : " . $_POST['subject'] ."\n";

                fwrite($log, $txt);
                fclose($log);

                wp_redirect(get_page_link(320));
                exit;
                break;
        }
    }
}