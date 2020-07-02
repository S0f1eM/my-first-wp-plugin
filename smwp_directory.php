<?php
/**
* @package: Wordpress Directory
* @author: Sophie Marchand
* @link:
* @version:  0.1
*
* @wordpress-plugin
* Plugin Name: Wordpress Directory 
* Plugin URI: https://github.com/S0f1eM/wordpress_directory.git
* Description: Plugin to deal with The institute directory I worked for.
*/

/**
 *Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 *requirements check
 */
define( 'PLUGIN_DIR', dirname(__FILE__).'/' );  


/**
 *check if the class doesn't exist allready
 */
if ( ! class_exists("smwp_Directory") ) {
  
  class smwp_Directory {
      /**
     * Static property to hold our singleton instance
     *
     */
     static $instance = false;

      /**
       * Constructor
       */
      const PREFIX = "smwpDir_";
      //const DEBUG_MODE = TRUE;

     /**
      * This is our constructor
      *
      * @return void
      */
      

      protected function __construct() {
      add_action    ( 'plugins_loaded',           array( $this, 'textdomain'        )       );
      add_action    ( 'admin_enqueue_scripts',        array( $this, 'admin_scripts'     )     );
    }

/**
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     *
     * @return void
     */
    private function __wakeup()
    {
    }


    /**
     * If an instance exists, this returns it.  If not, it creates one and
     * retuns it.
     *
     * @return WP_Comment_Notes
     */
    public static function getInstance() {
      
      if ( !self::$instance )
        self::$instance = new self;
      
      return self::$instance;
    }
   
  /**
     * load textdomain
     *
     * @return void
     */
    public function textdomain() {
      load_plugin_textdomain( 'smwpDir_', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }
    /**
     * Admin styles
     *
     * @return void
     */
    public function admin_scripts() {
       wp_register_script('smwp-directory', plugins_url('js/smwp_dir_scripts.js', dirname(__FILE__)), array('jquery'),0.1, true );
        wp_register_style('admin', plugins_url('css/smwp_dir_backoffice_style.css', dirname(__FILE__)), array(), 0.1, 'all');
    }


    /**
     *options
     */
    public function smwpDir_register_options() {

      if (function_exists("add_options_page")) {
          add_options_page(
           'smwp Directory', 
           'manage_options',
           'smwp_directory',
           'smwp_directory_options');
      }
    }
  }
 
/**
 * load styles
 */

function smwpDir_load_ressources() {

    //style CSS back offce
    wp_register_style( 'admin', plugins_url("assets/css/smwp_dir_backoffice_style.css", __FILE__));
    wp_enqueue_style( 'admin');
    //script javascript - à effacer si pas de js
    wp_register_script('javascript', plugins_url("assets/js/smwp_dir_scripts.js", __FILE__));
    wp_enqueue_script( 'javascript' );

}
add_action('admin_enqueue_scripts', 'smwpDir_load_ressources');


/**
 * add_menu_page() ajoute un onglet en haut du menu du tableau de bord 
 * add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )
 * https://developer.wordpress.org/reference/functions/add_menu_page/
 */
function _smwpDir_setup_menu(){
  $admin_path = 'smwp_directory/admin/pages/dashboard.php';
  $capability = 'edit_others_pages';

    add_menu_page(
        __('smwp Directory', 'textdomain'), //string $page_title
         'Annuaire',                        //string $menu_title
          $capability,                      // $capability
          $admin_path,                      //string $menu_slug
         '',                                //callable $function =''  -- smwp_directory_init
         'dashicons-welcome-widgets-menus', //string $icon_url = ''
          18                                //int $position = null
          );
  //add_submenu_page() permet d'ajouter des sous pages d'options 
       add_submenu_page(
          $admin_path,
          'Other Options', 
          'Toutes les options',
          $capability,
          $admin_path, 
          ''
          );
       add_submenu_page(
          $admin_path,
          'Create Person', 
          'Ajouter une personne',
          $capability,
          'smwp_directory/admin/pages/add-person.php',
          ''
          );
        add_submenu_page(
          $admin_path,
          'Update Person', 
          'Mise à jour d\'une personne',
          $capability,
          'smwp_directory/admin/pages/update-person.php',
          ''
          );
          add_submenu_page(
          $admin_path,
          'Delete Person', 
          'Effacer une personne',
          $capability,
          'smwp_directory/admin/pages/delete-person.php',
          ''
          );

          add_submenu_page(
          $admin_path,
          'Update Lab Name', 
          'Mise à jour d\'unité',
          $capability,
          'smwp_directory/admin/pages/update-labo.php',
          ''
          );        
          add_submenu_page(
          $admin_path,
          'Update Address', 
          'Mise à jour adresse',
          $capability,
          'smwp_directory/admin/pages/update-address.php',
          ''
          );
          add_submenu_page(
          $admin_path,
          'Create Address', 
          'Ajouter Adresse',
          $capability,
          'smwp_directory/admin/pages/add-address.php',
          ''
          );

          add_submenu_page(
          $admin_path,
          'Show Directory', 
          'Voir l\'annuaire',
          'edit_pages',
          'smwp_directory/admin/pages/directory.php',
          ''
        );
}
add_action('admin_menu','_smwpDir_setup_menu');


/**
 *creation d'une page annuaire à l'activation du plugin
 */
function smwp_directory_create_page() {
    //global $wpdb;//object - class which contains a set of functions used to interact with a database.
   $single_template = dirname( __FILE__ ) . '/includes/templates/annuaire.php';

    $my_post = array(
                'post_title' => 'Annuaire du Module',
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => 1,
                'post_type' => 'page',
                'can_export' => true,
                'page_template' => 'annuaire-mysql.php'//template de page qui se trouve dans dossier template-parts
                );
      //ne créé pas la page si il y en a déjà une
      if ( is_page($my_post) ) {
          return false;
      }
      else {
         wp_insert_post( $my_post );
      } 
}
/**
 *lance la fonction qui créé la page annuaire à l'activation du plugin
*/
register_activation_hook(__FILE__, "smwp_directory_create_page");


/**
 *remove page directory when deactivate plugin
 */
function smwp_directory_remove_page() {

    //récupère l'id de la page annuaire pour la fonction wp-delete_post
    $page = get_page_by_path( 'Annuaire du Module' );
    //supprime la page annuaire à la désactivation du plugin 
    //true = $force_delete : ne passe pas par la case trash et est effacé définitivement
    wp_delete_post($page->ID, true);
}
/**
 *lance la fonction qui efface la page annuaire à la désactivation du plugin
 */
register_deactivation_hook(__FILE__, "smwp_directory_remove_page");
}

/**
 *Ajout du petit lien vers les options sous le nom du plugin dans la page qui liste les plugin installés
  */
function smwpDir_plugin_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        // The "page" query string value must be equal to the slug
        // of the Settings admin page we defined earlier, which in
        // this case equals "myplugin-settings".
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=smwp_directory/admin/pages/dashboard.php">Options</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}
add_filter('plugin_action_links', 'smwpDir_plugin_action_links', 10, 2);


/**
 *Instantiate our class
  */
$smwp_directory = smwp_Directory::getInstance();
