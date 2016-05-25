<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');
session_start();
class Childs extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model('Scoot');	
	}

	//SELECTS THE CHILD BY ID AND SETS USER TO SESSION DATA
  	public function select_child($id) {
      $user = $this->session->userdata('user');
  		$child = $this->Scoot->child_by_id($id);
  		$data = $this->Scoot->get_events($id);
      $boom_dates = $this->Scoot->get_boom_dates($id);

        $log = array(
            'user' => $user,
            'child' => $child,
            'data' => $data,
            'boom_dates' => $boom_dates);

  		$this->load->view("/select_child", $log);
  	}
//CREATES A BOOM EVENT ENTRY
  	public function boom_boom($id) {
        $user = $this->session->userdata('user');
        $child = $this->Scoot->child_by_id($id);
        $data = $this->Scoot->booms_by_id($id);
    
        $rates = $this->Scoot->get_boom_dates($child['id']);
    
        if (isset($rates[0])) {
            $date1 = new DateTime($rates[0]['created_at']);
                } else {
                    $date1 = new DateTime();   
        } 


        if (isset($rates[1])) {
            $date2 = new DateTime($rates[1]['created_at']);
                } else {
                    $date2 = new DateTime();   
        } 

        $event_diff = date_diff($date2,$date1);
        $event_diff = $event_diff->format('%d Day %h Hours');

        $data = array(
            'child' => $child,
            'data' => $data,
            'user' => $user,
            'event_diff' => $event_diff
            );

  		$this->load->view("/boom_boom", $data);
  	 
    }
//CREATES A FOOD AND/OR WATER ENTRY
  	public function food_and_water($id) {
        $user = $this->session->userdata('user');
  		  $child = $this->Scoot->child_by_id($id);
  		  $data = $this->Scoot->get_intake_by_id($id);

        $data = array(
          'child' => $child,
          'data' => $data,
          'user' => $user
          );

  		$this->load->view("/food_and_water", $data);
  	}
//CREATES A MEDICINE ENTRY
  	public function medicine($id) {
        $user = $this->session->userdata('user');
        $child = $this->Scoot->child_by_id($id);
        $data = $this->Scoot->medicine_by_id($id);

        $data = array(
            'child' => $child,
            'data' => $data,
            'user' => $user
            );

  		$this->load->view("/medicine", $data);
  	}
//RENDERS THE ADD CHILD VIEW PAGE
  	public function add_child() {
  		$this->load->view("/add_child");
  	}
//ADDS A NEW CHILD TO THE DB
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

  		$this->Scoot->create_child($child);
  		redirect('/users_profiles');
  	}
//REMOVES A CHILD FROM THE DB
  	public function delete($id) {
  		$this->Scoot->delete($id);
  		redirect('/users_profiles');
  	}
//ADDS AN EVENT TO THE DB, USERS ID IS SET BY SESSION DATA AND INSERTED INTO THE USER2_ID
    public function add_event($id) {
      $parent_id = $this->session->userdata['user']['user_id'];

      $child = array(
          'category' => $this->input->post('category'),
          'description' => $this->input->post('description'),
          'comments' => $this->input->post('comments'),
          'amount' => $this->input->post('amount'),
          'user2_id' => $parent_id,
          'id' => $id
          );

      $child_id = $child['id'];
      $this->Scoot->add_entry($child);
      redirect('/select_child/' . $child_id);
    }
//REMOVES A PARTICULAR EVENT WHERE THE USER IS THE ORIGINAL EVENT CREATOR
    public function rem_entry($id) {
        $this->Scoot->remove_event_by_id($id);
        redirect('/users_profiles');
    }

}