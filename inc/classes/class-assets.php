<?php 
/**
 * enqueue theme assets
 * 
 * @package frx
 */

 namespace FRX_THEME\Inc;
 use FRX_THEME\Inc\Traits\Singleton;
 
 class Assets{
    use Singleton;

    protected function __construct(){
        //load classes
        $this->setup_hooks();
    }
 

    protected function setup_hooks(){
        //actions and filters
        /**
         * Actions
         */
        add_action('wp_enqueue_scripts', [$this,'register_styles']);
        add_action('wp_enqueue_scripts', [$this,'register_scripts']);
    }
    public function register_styles(){
        // Register styles.
        wp_register_style( 'bootstrap-css', FRX_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );
        wp_register_style( 'style-css', get_stylesheet_uri() , [], filemtime( FRX_DIR_PATH . '/style.css' ), 'all' );
        

        // Enqueue Styles.
        wp_enqueue_style( 'bootstrap-css' );
        wp_enqueue_style( 'style-css' );
       
    }

    public function register_scripts(){
        	
        // Register scripts.
        wp_register_script( 'main-js', FRX_DIR_URI . '/assets/main.js', [], filemtime( FRX_DIR_PATH . '/assets/main.js' ), true );
        wp_register_script( 'bootstrap-js', FRX_DIR_URI . '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], false, true );

        // Enqueue Scripts.
        wp_enqueue_script( 'main-js' );
        wp_enqueue_script( 'bootstrap-js' );	

    }
 }

?>