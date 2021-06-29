<?php 

/** 
 * @package scheduler-new
 */

 /*
 Plugin Name: scheduler-new
 Plugin URI: https://poweroins.com
 Description: Scheduler for osce
 Version: 1.0.0
 Auther: Poweroins IT solutions
 Author URI: http://poweroins.com
 License: GPLv2 or later 
 Text Domain: Poweroins
 */

if( ! defined('ABSPATH')){
    die;
}

define( 'SCEDULE_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

class scheduler_new {
    
    //changed for seconfd commit and push

    function __construct(){
        add_action('init', array( $this, 'custom_post_type') );
    }

    function register(){
        add_action('wp_enqueue_scripts', array($this, 'enqueue'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));   
        // add_action('wp_enqueue_scripts', array($this, 'enqueue'));  //Add client side script
    }

    function activate(){
        echo 'The plugin was activated';
        // generated a CPT
        $this->custom_post_type();
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate(){
        echo 'The plugin was deactivated';
         // flush rewrite rules
         flush_rewrite_rules();
    }

    function uninstall(){
        // delete CPT
        // delete all the plugin data from the DB
    }

    function custom_post_type(){
        register_post_type('book',['public' => true, 'label' => 'books']);
    }

    function enqueue(){
        //enqueue all script
        wp_enqueue_style( 'pluginstyle', plugins_url('/client/calendar/style.css', __FILE__) );
        // wp_enqueue_style( 'clientpluginstyle', plugins_url('/assets/clientstyle.css', __FILE__) );
        wp_enqueue_script( 'pluginscript', plugins_url('/client/calendar/script.js', __FILE__) );
        wp_enqueue_script( 'bootstrap', plugins_url('/assets/bootstrap.min.js', __FILE__) );
        wp_enqueue_script( 'bootstrap', plugins_url('/assets/jquary.min.js', __FILE__) );
        wp_localize_script( 'pluginscript', 'plugin_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    }    

 }
//  require_once SCEDULE_PLUGIN_DIR . '/client/index.php';
function loadPlugin(){
    require_once SCEDULE_PLUGIN_DIR . '/client/index.php';
}
function loadadmin(){
    require_once SCEDULE_PLUGIN_DIR . '/admin/index.php';
}




/* AJAX request */

## Fetch all records
add_action( 'wp_ajax_scheduler', 'scheduler_callback' );
add_action( 'wp_ajax_nopriv_scheduler', 'scheduler_callback' );
function scheduler_callback() {

  global $wpdb;
  $page_content = array();
  $booked = $wpdb->get_results("SELECT category, date, COUNT(*) as count FROM booked GROUP BY category,date");
  $page_content['category']=$_POST['category'];
  $page         = '/client/calendar/calendar.php';
  ob_start();
  require_once SCEDULE_PLUGIN_DIR . $page;
  $page_content['calendar'] = ob_get_clean();
  ob_end_clean();
  $page_content['booked'] = $booked;
  // Fetch all records
  //   $response = $wpdb->get_results("SELECT * FROM employee");

  echo json_encode($page_content);
  wp_die(); 
}


if( class_exists('scheduler_new')){
    $scheduler_new = new scheduler_new('creee scheduler initialized');
    $scheduler_new->register();
}

// Adding Shortcode
function cf_shortcode() {
	ob_start();
	loadPlugin();
	return ob_get_clean();
}

add_shortcode( 'scheduler', 'cf_shortcode' );

// creating admin page

add_action('admin_menu', 'scheduler_admin');

function scheduler_admin(){
    add_menu_page( 'Scheduler CREE', 'Scheduler creee', 'manage_options', 'test-plugin', 'scheduler_admin_init' );
}   
function scheduler_admin_init(){
    echo loadadmin();
    echo loadPlugin();
}





//activation
register_activation_hook(__FILE__, array( $scheduler_new, 'activate') );
//  add_action('init', 'function_name');

//deactivation
register_deactivation_hook(__FILE__, array( $scheduler_new, 'activate') );

//uninstall
register_uninstall_hook(__FILE__, array( $scheduler_new, 'uninstall') );

//include("./assets/includes/config.php");
// include("./client/index.php");
// include('.\assets\includes\general_functions.php');
?>