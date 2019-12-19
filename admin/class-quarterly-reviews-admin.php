<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       google.com
 * @since      1.0.0
 *
 * @package    Quarterly_Reviews
 * @subpackage Quarterly_Reviews/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Quarterly_Reviews
 * @subpackage Quarterly_Reviews/admin
 * @author     Trevor Wagner <trevor.wagner@blueacorn.com>
 */
class Quarterly_Reviews_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Quarterly_Reviews_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Quarterly_Reviews_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/quarterly-reviews-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Quarterly_Reviews_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Quarterly_Reviews_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/quarterly-reviews-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * 
	 */
	public function createPostTypes(){

		// Create Question Post Type
		register_post_type( 'question', 
			array(
				'label'                 => __( 'Question', 'text_domain' ),
				'description'           => __( 'Custom Post Types for all hotel based details', 'text_domain' ),
				'labels'                => array(
					'name'                  => _x( 'Questions', 'Post Type General Name', 'text_domain' ),
					'singular_name'         => _x( 'Question', 'Post Type Singular Name', 'text_domain' ),
					'menu_name'             => __( 'Questions', 'text_domain' ),
					'name_admin_bar'        => __( 'Questions', 'text_domain' ),
					'archives'              => __( 'Question Archives', 'text_domain' ),
					'attributes'            => __( 'Question Attributes', 'text_domain' ),
					'parent_item_colon'     => __( 'Parent Question:', 'text_domain' ),
					'all_items'             => __( 'All Questions', 'text_domain' ),
					'add_new_item'          => __( 'Add New Question', 'text_domain' ),
					'add_new'               => __( 'Add New Question', 'text_domain' ),
					'new_item'              => __( 'New Question', 'text_domain' ),
					'edit_item'             => __( 'Edit Question', 'text_domain' ),
					'update_item'           => __( 'Update Question', 'text_domain' ),
					'view_item'             => __( 'View Question', 'text_domain' ),
					'view_items'            => __( 'View Question', 'text_domain' ),
					'search_items'          => __( 'Search Questions', 'text_domain' ),
					'not_found'             => __( 'Question Not found', 'text_domain' ),
					'not_found_in_trash'    => __( 'Question Not found in Trash', 'text_domain' ),
					'items_list'            => __( 'Questions list', 'text_domain' ),
					'items_list_navigation' => __( 'Questions list navigation', 'text_domain' ),
					'filter_items_list'     => __( 'Filter Questions list', 'text_domain' ),
				),
				'supports'              => array( 'title', 'editor' ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 10,
				'menu_icon'             => 'dashicons-clipboard',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => false,
				'can_export'            => true,
				'has_archive'           => false,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			)
		);

		// Create Reservations Post Type
		register_post_type( 'employee', 
			array(
				'label'                 => __( 'Employee', 'text_domain' ),
				'description'           => __( 'Post Type that holds Employee details', 'text_domain' ),
				'labels'                => array(
					'name'                  => _x( 'Employees', 'Post Type General Name', 'text_domain' ),
					'singular_name'         => _x( 'Employee', 'Post Type Singular Name', 'text_domain' ),
					'menu_name'             => __( 'Employees', 'text_domain' ),
					'name_admin_bar'        => __( 'Employees', 'text_domain' ),
					'archives'              => __( 'Employee Archives', 'text_domain' ),
					'attributes'            => __( 'Employee Attributes', 'text_domain' ),
					'parent_item_colon'     => __( 'Parent Employee:', 'text_domain' ),
					'all_items'             => __( 'All Employees', 'text_domain' ),
					'add_new_item'          => __( 'Add New Employee', 'text_domain' ),
					'add_new'               => __( 'Add New Employee', 'text_domain' ),
					'new_item'              => __( 'New Employee', 'text_domain' ),
					'edit_item'             => __( 'Edit Employee', 'text_domain' ),
					'update_item'           => __( 'Update Employee', 'text_domain' ),
					'view_item'             => __( 'View Employee', 'text_domain' ),
					'view_items'            => __( 'View Employees', 'text_domain' ),
					'search_items'          => __( 'Search Employee', 'text_domain' ),
					'not_found'             => __( 'Employee Not found', 'text_domain' ),
					'not_found_in_trash'    => __( 'Employee Not found in Trash', 'text_domain' ),
					'featured_image'        => __( 'Featured Image', 'text_domain' ),
					'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
					'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
					'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
					'insert_into_item'      => __( 'Insert into Reservation', 'text_domain' ),
					'uploaded_to_this_item' => __( 'Uploaded to this Reservation', 'text_domain' ),
					'items_list'            => __( 'Reservations list', 'text_domain' ),
					'items_list_navigation' => __( 'Reservations list navigation', 'text_domain' ),
					'filter_items_list'     => __( 'Filter Reservations list', 'text_domain' ),
				),
				'supports'              => array( 'title', 'editor', 'thumbnail' ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 15,
				'menu_icon'             => 'dashicons-businessperson',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => false,
				'can_export'            => true,
				'has_archive'           => false,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			)

		);

		// Create Reservations Post Type
		register_post_type( 'department', 
			array(
				'label'                 => __( 'Department', 'text_domain' ),
				'description'           => __( 'Post Type that holds Department details', 'text_domain' ),
				'labels'                => array(
					'name'                  => _x( 'Departments', 'Post Type General Name', 'text_domain' ),
					'singular_name'         => _x( 'Department', 'Post Type Singular Name', 'text_domain' ),
					'menu_name'             => __( 'Departments', 'text_domain' ),
					'name_admin_bar'        => __( 'Departments', 'text_domain' ),
					'archives'              => __( 'Department Archives', 'text_domain' ),
					'attributes'            => __( 'Department Attributes', 'text_domain' ),
					'parent_item_colon'     => __( 'Parent Department:', 'text_domain' ),
					'all_items'             => __( 'All Department', 'text_domain' ),
					'add_new_item'          => __( 'Add New Department', 'text_domain' ),
					'add_new'               => __( 'Add New Department', 'text_domain' ),
					'new_item'              => __( 'New Department', 'text_domain' ),
					'edit_item'             => __( 'Edit Department', 'text_domain' ),
					'update_item'           => __( 'Update Department', 'text_domain' ),
					'view_item'             => __( 'View Department', 'text_domain' ),
					'view_items'            => __( 'View Departments', 'text_domain' ),
					'search_items'          => __( 'Search Department', 'text_domain' ),
					'not_found'             => __( 'Department Not found', 'text_domain' ),
					'not_found_in_trash'    => __( 'Department Not found in Trash', 'text_domain' ),
					
					'items_list'            => __( 'Departments list', 'text_domain' ),
					'items_list_navigation' => __( 'Departments list navigation', 'text_domain' ),
					'filter_items_list'     => __( 'Filter Departments list', 'text_domain' ),
				),
				'supports'              => array( 'title', 'editor' ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 15,
				'menu_icon'             => 'dashicons-building',
				'show_in_admin_bar'     => false,
				'show_in_nav_menus'     => false,
				'can_export'            => true,
				'has_archive'           => false,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			)
		);

		// Create Reservations Post Type
		register_post_type( 'subdepartment', 
			array(
				'label'                 => __( 'Sub Department', 'text_domain' ),
				'description'           => __( 'Post Type that holds Department details', 'text_domain' ),
				'labels'                => array(
					'name'                  => _x( 'Sub Departments', 'Post Type General Name', 'text_domain' ),
					'singular_name'         => _x( 'Sub Department', 'Post Type Singular Name', 'text_domain' ),
					'menu_name'             => __( 'Sub Departments', 'text_domain' ),
					'name_admin_bar'        => __( 'Sub Departments', 'text_domain' ),
					'archives'              => __( 'Sub Department Archives', 'text_domain' ),
					'attributes'            => __( 'Sub Department Attributes', 'text_domain' ),
					'parent_item_colon'     => __( 'Parent Sub Department:', 'text_domain' ),
					'all_items'             => __( 'All Sub Department', 'text_domain' ),
					'add_new_item'          => __( 'Add New Sub Department', 'text_domain' ),
					'add_new'               => __( 'Add New Sub Department', 'text_domain' ),
					'new_item'              => __( 'New Sub Department', 'text_domain' ),
					'edit_item'             => __( 'Edit Sub Department', 'text_domain' ),
					'update_item'           => __( 'Update Sub Department', 'text_domain' ),
					'view_item'             => __( 'View Sub Department', 'text_domain' ),
					'view_items'            => __( 'View Sub Department', 'text_domain' ),
					'search_items'          => __( 'Search Sub Department', 'text_domain' ),
					'not_found'             => __( 'Sub Department Not found', 'text_domain' ),
					'not_found_in_trash'    => __( 'Sub Department Not found in Trash', 'text_domain' ),
					'items_list'            => __( 'Sub Departments list', 'text_domain' ),
					'items_list_navigation' => __( 'Sub Departments list navigation', 'text_domain' ),
					'filter_items_list'     => __( 'Filter Sub Departments list', 'text_domain' ),
				),
				'supports'              => array( 'title', 'editor' ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 15,
				'menu_icon'             => 'dashicons-building',
				'show_in_admin_bar'     => false,
				'show_in_nav_menus'     => false,
				'can_export'            => true,
				'has_archive'           => false,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			)
		);

		// Create Reservations Post Type
		register_post_type( 'job-titles', 
			array(
				'label'                 => __( 'Job Titles', 'text_domain' ),
				'description'           => __( 'Post Type that holds Job Title details', 'text_domain' ),
				'labels'                => array(
					'name'                  => _x( 'Job Titles', 'Post Type General Name', 'text_domain' ),
					'singular_name'         => _x( 'Job Title', 'Post Type Singular Name', 'text_domain' ),
					'menu_name'             => __( 'Job Titles', 'text_domain' ),
					'name_admin_bar'        => __( 'Job Titles', 'text_domain' ),
					'archives'              => __( 'Job Title Archives', 'text_domain' ),
					'attributes'            => __( 'Job Title Attributes', 'text_domain' ),
					'parent_item_colon'     => __( 'Parent Job Title:', 'text_domain' ),
					'all_items'             => __( 'All Job Titles', 'text_domain' ),
					'add_new_item'          => __( 'Add New Job Title', 'text_domain' ),
					'add_new'               => __( 'Add New Job Title', 'text_domain' ),
					'new_item'              => __( 'New Job Title', 'text_domain' ),
					'edit_item'             => __( 'Edit Job Title', 'text_domain' ),
					'update_item'           => __( 'Update SJob Title', 'text_domain' ),
					'view_item'             => __( 'View Job Title', 'text_domain' ),
					'view_items'            => __( 'View Job Titles', 'text_domain' ),
					'search_items'          => __( 'Search Job Title', 'text_domain' ),
					'not_found'             => __( 'Job Title Not found', 'text_domain' ),
					'not_found_in_trash'    => __( 'Job Title Not found in Trash', 'text_domain' ),
					'items_list'            => __( 'Job Titles list', 'text_domain' ),
					'items_list_navigation' => __( 'Job Titles list navigation', 'text_domain' ),
					'filter_items_list'     => __( 'Filter Job Titles list', 'text_domain' ),
				),
				'supports'              => array( 'title', 'editor' ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 15,
				'menu_icon'             => 'dashicons-award',
				'show_in_admin_bar'     => false,
				'show_in_nav_menus'     => false,
				'can_export'            => true,
				'has_archive'           => false,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			)
		);
		
		// Create Reservations Post Type
		register_post_type( 'review-questions', 
			array(
				'label'                 => __( 'Review Questions', 'text_domain' ),
				'description'           => __( 'Post Type that holds Review Questions details', 'text_domain' ),
				'labels'                => array(
					'name'                  => _x( 'Review Questions', 'Post Type General Name', 'text_domain' ),
					'singular_name'         => _x( 'Review Question', 'Post Type Singular Name', 'text_domain' ),
					'menu_name'             => __( 'Review Questions', 'text_domain' ),
					'name_admin_bar'        => __( 'Review Questions', 'text_domain' ),
					'archives'              => __( 'Review Question Archives', 'text_domain' ),
					'attributes'            => __( 'Review Question Attributes', 'text_domain' ),
					'parent_item_colon'     => __( 'Parent Review Question:', 'text_domain' ),
					'all_items'             => __( 'All Review Questions', 'text_domain' ),
					'add_new_item'          => __( 'Add New Review Question', 'text_domain' ),
					'add_new'               => __( 'Add New Review Question', 'text_domain' ),
					'new_item'              => __( 'New Review Question', 'text_domain' ),
					'edit_item'             => __( 'Edit Review Question', 'text_domain' ),
					'update_item'           => __( 'Update Review Question', 'text_domain' ),
					'view_item'             => __( 'View Review Question', 'text_domain' ),
					'view_items'            => __( 'View Review Question', 'text_domain' ),
					'search_items'          => __( 'Search Review Question', 'text_domain' ),
					'not_found'             => __( 'Review Question Not found', 'text_domain' ),
					'not_found_in_trash'    => __( 'Review Question Not found in Trash', 'text_domain' ),
					'items_list'            => __( 'Review Questions list', 'text_domain' ),
					'items_list_navigation' => __( 'Review Questions list navigation', 'text_domain' ),
					'filter_items_list'     => __( 'Filter Review Questions list', 'text_domain' ),
				),
				'supports'              => array( 'title' ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 15,
				'menu_icon'             => 'dashicons-list',
				'show_in_admin_bar'     => false,
				'show_in_nav_menus'     => false,
				'can_export'            => true,
				'has_archive'           => false,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			)
		);
	}

	/**
	 *  Add essential theme pages.
	 */
	public function createThemePages(){
		$pagesToCreate = [
			'new review'
		];

		if(count($pagesToCreate) > 0){
			foreach( $pagesToCreate as $pageID ){
				$slug = sanitize_title_with_dashes($pageID);
				$pageExists = Quarterly_Reviews::the_slug_exists($slug);
				
				if(!$pageExists){
					$result = wp_insert_post(array(
						'post_type' => 'page',
						'post_title' => ucfirst($pageID),
						'post_content' => '',
						'post_status' => 'publish',
						'post_author' => 1,
						'post_slug' => $slug
					));
				}
			}
		}
	}
}
