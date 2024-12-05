<?php 
/**
 * enqueue theme assets
 * 
 * @package frx
 */

 namespace FRX_THEME\Inc;
 use FRX_THEME\Inc\Traits\Singleton;
 
 class Menus{
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
        add_action('init', [$this,'register_menus']);
       
    }

    public function register_menus(){
        register_nav_menus(
            [
                'frx-header-menu'=> __('Header Menu','frx'),
                'frx-footer-menu'=> __('Extra Menu','frx'),
                'frx-signin-menu'=> __('Sign In Menu','frx')
            ]
        );
    }

    public function get_menu_id($location){
        //get all the locations available
        $locations = get_nav_menu_locations();
        //get object id by location
        $menu_id = $locations[$location];
        return ! empty($menu_id) ? $menu_id: '';
    }

    public function get_child_menu_items($menu_array, $parent_id){
        $child_menus=[];

        if(!empty($menu_array) && is_array($menu_array)){
            foreach($menu_array as $menu){
                if(intval($menu->menu_item_parent)===$parent_id){
                    array_push($child_menus,$menu);
                }
            }
        }

        return $child_menus;
    }
  
 }

?>