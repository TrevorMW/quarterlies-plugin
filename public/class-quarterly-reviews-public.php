<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       google.com
 * @since      1.0.0
 *
 * @package    Quarterly_Reviews
 * @subpackage Quarterly_Reviews/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Quarterly_Reviews
 * @subpackage Quarterly_Reviews/public
 * @author     Trevor Wagner <trevor.wagner@blueacorn.com>
 */
class Quarterly_Reviews_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/quarterly-reviews-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/quarterly-reviews-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * 
	 */
	public function get_employee_list()
	{
		$data = $_POST;
		$resp = new Ajax_Response($data['action']);

		if(!isset($data['employeeEmail'])){
			$resp->message = 'Looks like youre not a registered employee. Please notify HR.';
			$resp->status = false;
		} else {
			$employeeEmail  = filter_var( trim($data['employeeEmail']), FILTER_SANITIZE_STRING);
			$employeeList   = Employee::getEmployeeRecords(true);
			$employeeRecord = Employee::employeeExists($employeeEmail);

			if(count($employeeRecord) == 1 && count($employeeList) > 0){
				$idx = array_search($employeeRecord[0], $employeeList, true);

				if($idx !== false){
					unset($employeeList[$idx]);
				}
			}

			$resp->data = array(
				'employeeSelectOptions' => Employee::getEmployeeOptionItems($employeeList)
			);
			$resp->status = true;
		}

		echo $resp->encodeResponse();
		die(0);
	}
}
