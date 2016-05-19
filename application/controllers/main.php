<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');
session_start();
class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model('Scoot');	
	}

	public function index() {
		$this->load->view('/index');
	}

  public function login() {
      $name = $this->input->post('name');
      // var_dump('name', $name);
      $role = $this->input->post('role');
      // var_dump('role', $role);
        $password = md5($this->input->post('password'));
        // var_dump('password', $password);
        $login = $this->Scoot->login($name);
        // var_dump('login', $login); die();

        if(($login && $login['password'] == $password) && ($login && $login['role'] == $role)) {
        $user = array(
            'user_id' => $login['id'],
            'name' => $login['name'],
            'role' => $login['role'],
            'is_logged_in' => true
            );

        $this->session->set_userdata('user', $user);
        redirect('/main/users_profiles');

      } else {
          $this->session->set_flashdata('error', 'invalid credentials');
          redirect('/main/index');
       }
    }
	public function register() {
		$this->load->library('form_validation');
    	$this->form_validation->set_rules('name', 'Name', 'required');
    	$this->form_validation->set_rules('role', 'Role', 'required');
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
    	$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[confirm_password]');
    	$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

		if ($this->form_validation->run()==FALSE) {
      		$this->view_data['errors'] = validation_errors();
      		$this->session->set_flashdata('error', $this->view_data['errors']);
      		redirect('/main/index');

      	} else {	

		$user_info = array(
	        'name' => $this->input->post('name'),
	        'role' => $this->input->post('role'),
	        'email' => $this->input->post('email'),
	        'password' => md5($this->input->post('password'))
	        );

      	$this->Scoot->add_user($user_info);
// Issue on login function////////////////////////////////
      	/////////////////////////////////////////////////
      	$login = $this->Scoot->login($user_info['name']);
	    $user = array(
	        'user_id' => $login['id'],
	        'name' => $login['name'],
	        'is_logged_in' => TRUE
	        );
      
      	$this->session->set_userdata('user', $user);
      	redirect('/main/users_profiles');
		} 
	}


	public function map() {
		// $api= array(
		// 	'key' => 'key here');
      // var_dump($api['key']); die();
		$this->load->view('/map');
	}
	
	public function users_profiles() {
	    $user = $this->session->userdata('user');
	    $child = $this->Scoot->get_children();
	    $data = array('child' => $child, 'user' => $user);
	    // var_dump($data); die;
	    $this->load->view('/login', $data);
  	}
  	// public function add_food($id) {

  	// }

  	public function select_child($id) {
  		$child = $this->Scoot->child_by_id($id);
  		$data = $this->Scoot->get_events($id);
      $log = array('child' => $child,
        'data' => $data);
      // var_dump($log); die();
  		$this->load->view("/select_child", $log);
  	}

  	public function boom_boom($id) {
      $child = $this->Scoot->child_by_id($id);
      $data = $this->Scoot->booms_by_id($id);
      $data = array('child' => $child,
        'data' => $data);
      // var_dump($data); die;
  		$this->load->view("/boom_boom", $data);
  	}

  	public function food_and_water($id) {
  		$child = $this->Scoot->child_by_id($id);
  		$data = $this->Scoot->get_intake_by_id($id);
      $data = array('child' => $child,
        'data' => $data);
      // var_dump($data); die;
  		$this->load->view("/food_and_water", $data);
  	}

  	public function medicine($id) {
      $child = $this->Scoot->child_by_id($id);
      $data = $this->Scoot->medicine_by_id($id);
      $data = array('child' => $child,
        'data' => $data);
      // var_dump($data); die();
  		$this->load->view("/medicine", $data);
  	}

  	public function add_child() {
  		$this->load->view("/add_child");
  	}

  	public function new_child() {
  		$child = array(
	        'name' => $this->input->post('name'),
	        'image' => $this->input->post('image'),
	        'age' => $this->input->post('age'),
	        'allergies' => $this->input->post('allergies'),
	        'foods_likes' => $this->input->post('foods_likes'),
	        'foods_dislikes' => $this->input->post('foods_dislikes'),
	        'dr_name' => $this->input->post('dr_name'),
	        'dr_contact_info' => $this->input->post('dr_contact_info')
	        );
  		// $data = $this->input->post('name');
  		// var_dump($child); die;
  		$this->Scoot->create_child($child);
  		redirect('/main/users_profiles');
  	}

  	public function delete($id) {
  		$this->Scoot->delete($id);
  		redirect('/main/users_profiles');
  	}

    public function add_event($id) {
      $parent_id = $this->session->userdata['user']['user_id'];
      // var_dump($parent_id); die();
      $child = array(
          'category' => $this->input->post('category'),
          'description' => $this->input->post('description'),
          'comments' => $this->input->post('comments'),
          'amount' => $this->input->post('amount'),
          'user2_id' => $parent_id,
          'id' => $id
          );
      $child_id = $child['id'];
      // var_dump($child_id); die();
      $this->Scoot->add_entry($child);
      redirect('/main/select_child/' . $child_id);
    }
  		
  	public function reset() {
  		$this->session->sess_destroy();
		  redirect("/main/index");	
	}

}

?>
