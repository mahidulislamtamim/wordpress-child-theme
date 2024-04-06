<?php
/*
Developed BY : Mahidul Islam
Github Url: https://github.com/mahidulislamtamim
*/

add_action('wp_enqueue_scripts', 'enqueue_child_scripts', 100);
function enqueue_child_scripts()
{
    // Add custom css file
    wp_deregister_style( 'onepress-child-theme-custom-style' );
    wp_register_style( "onepress-child-theme-custom-style", esc_url( get_stylesheet_directory_uri() ) . '/style.css');
    if (!wp_style_is("onepress-child-theme-custom-style", "enqueued")) {
        wp_enqueue_style( 'onepress-child-theme-custom-style' );
    }

    // Add custom js file
    wp_register_script( "onepress-child-theme-custom-js", esc_url( get_stylesheet_directory_uri() ).'/custom.js', ["jquery"] );
    if (!wp_script_is("onepress-child-theme-custom-js", "enqueued")) {
        wp_enqueue_script("onepress-child-theme-custom-js");
    }
}


// Add custom css js in header by condition
add_action('wp_head', 'checking_logged_in', 100);
function checking_logged_in()
{
    if(isset($_SESSION["your-custom-session"])){ 
        ?>
        <style type="text/css">
            /* custom css  */
        </style>

        <script>
            jQuery(document).ready(function(){
                /* custom css  */
            });
        </script>
        <?php
    }
}