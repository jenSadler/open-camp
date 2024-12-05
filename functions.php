<?php 

/**
 * Theme Functions
 * @package frx
 * */

 if(!defined('FRX_DIR_PATH')){
	define('FRX_DIR_PATH', untrailingslashit(get_template_directory()));
}

if(!defined('FRX_DIR_URI')){
	define('FRX_DIR_URI', untrailingslashit(get_template_directory_uri()));
}


require_once (FRX_DIR_PATH . '/inc/helpers/autoloader.php');
require_once (FRX_DIR_PATH . '/inc/helpers/template-tags.php');
//require_once (FRX_DIR_PATH . '/inc/helpers/breadcrumbs.php');
//require_once (FRX_DIR_PATH . '/inc/helpers/ajax.php');


function frx_get_theme_instance(){
	\FRX_THEME\Inc\FRX_THEME::get_instance();
}

frx_get_theme_instance();


add_action('wp_ajax_filter_projects', 'filter_projects');
add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');
add_filter( 'frx_saved_item_html', 'change_frx_saved_item_html');
add_filter('comment_form_default_fields', 'website_remove');
add_filter( 'comment_form_default_fields', 'wc_comment_form_change_cookies' );	
add_action('after_setup_theme', 'remove_admin_bar');


function change_frx_saved_item_html( $inner_html_to_return ) {
	return $inner_html_to_return;
	
}
function filter_projects() {
  get_template_part('template-parts/ajax'); } 


function get_breadcrumb() {
  get_template_part('template-parts/breadcrumbs');

}

function website_remove($fields){
	if(isset($fields['url']))
		unset($fields['url']);
	return $fields;
}

function wc_comment_form_change_cookies( $fields ) {
	$commenter = wp_get_current_commenter();

	$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

	$fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
					 '<label for="wp-comment-cookies-consent">'.__(' Save my name and email in this browser for the next time I comment.', 'textdomain').'</label></p>';
	return $fields;
}

function remove_admin_bar() {
	if (!current_user_can('administrator') && !current_user_can('editor') && !is_admin()) {
	  show_admin_bar(false);
	}
}

function playground_sidebar_registration() {

    $shared_args = array(

        'before_title'  => '<h5 class="widget-title">',

        'after_title'   => '</h5>',

        'before_widget' => '<div id="%1$s" class="widget %2$s">',

        'after_widget'  => '</div>',

    );

    

    register_sidebar(

        array_merge(

            $shared_args,

            array(

                'name'        => __( 'Footer 1', 'playground' ),

                'id'          => 'footer-1',

                'description' => __( 'Add widgets here.', 'playground' ),

            )

        )

    );

    

    register_sidebar(

        array_merge(

            $shared_args,

            array(

                'name'        => __( 'Footer 2', 'playground' ),

                'id'          => 'footer-2',

                'description' => __( 'Add widgets here.', 'playground' ),

            )

        )

    );

    

    register_sidebar(

        array_merge(

            $shared_args,

            array(

                'name'        => __( 'Footer 3', 'playground' ),

                'id'          => 'footer-3',

                'description' => __( 'Add widgets here.', 'playground' ),

            )

        )

    );


}

add_action( 'widgets_init', 'playground_sidebar_registration' );



?>