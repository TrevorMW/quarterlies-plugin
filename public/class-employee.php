<?php 

class Employee extends WP_ACF_CPT{


    /**
     * __construct function.
     *
     * @access public
     * @param mixed $id (default: null)
     * @return void
     */
    public function __construct($id = null){
        if (is_int($id)) {
            $post = get_post($id);

            if ($post instanceof WP_Post) {
                parent::__construct($post);
            } else {
                parent::__construct($id);
            }
        }
    }

    /**
     * 
     */
    public static function employeeExists($employeeEmail = false){
        $args = apply_filters( 'edit_employee_data_query_args', array(
            'post_type'      => 'employee',
            'posts_per_page' => '-1',
            'fields'         => 'ids'
        ));

        if($employeeEmail){
            $args['meta_query'] = array(array(
                'key' => 'employee_email_address',
                'value' => $employeeEmail,
                'compare' => '='
            ));
        }
        
        $loop = new WP_Query($args);

        return apply_filters('employee_data_array', $loop->posts);
    }
    
    /**
     * 
     */
    public static function getEmployeeRecords(){
        $args = apply_filters( 'edit_employee_data_query_args', array(
            'post_type'      => 'employee',
            'posts_per_page' => '-1',
            'fields'         => 'ids'
        ));

        $loop = new WP_Query($args);

        return apply_filters('employee_data_array', $loop->posts);
    }

    /**
     * 
     */
    public static function getEmployeeOptionItems($options = false){
        $data = [];

        if(count($options)){
            foreach($options as $id){
                $data[] = array('name' => get_the_title($id), 'id' => $id);
            }
        }

        return $data;
    }
}