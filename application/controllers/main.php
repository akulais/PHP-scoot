<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');
session_start();
class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model('Scoot');	
	}
//LOADS THE BASE VIEW INDEX
	public function index() {
		$this->load->view('/index');
	}
//PERFORMS THE LOGIN FUNCTION, LOGIN VALIDATION, AND SETS SESSION DATA
    public function login() {
        $name = $this->input->post('name');
        $role = $this->input->post('role');
        $password = md5($this->input->post('password'));
        $login = $this->Scoot->login($name);

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
//REGISTERS NEW USERS TO THE DB
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
//PASSES API KEY TO MAP PAGE TO PERFORM THE API CALL
	public function map() {
		$api= array(
			'key' => "src='https://www.google.com/maps/embed/v1/search?key=AIzaSyBsvz4KB38nW-sWE0nmNkwWbDrUvUVu07k&q=hospitals+near+me&zoom=14'"
        );

		$this->load->view('/map', $api);
	}
//OBTAINS CHILD'S INFORMATION, RENDERS PROGRESS BARS, FACES, SETS SESSION DATA TO USER
	public function users_profiles() {
//CONVERTS DATA TO A FRACTION, IS MULTIPLIED MY 100 TO CONVERT TO A PERCENT FOR THE PROGRESS BAR        
        function percentages($a,$b) {
            return ($b/$a)*100;
        }

	    $user = $this->session->userdata('user');
	    $child = $this->Scoot->get_children();
        $projected_event = array();             
        $last_boom = array();
        $count_down = array();
        $min_date = array();
        $div = array();
        $faces = array();

        foreach ($child as $value) {
            $rates = $this->Scoot->get_boom_dates($value['id']);
    
            if (isset($rates[0])) {
                $date1 = new DateTime($rates[0]['created_at']);
                    } 

            if (isset($rates[1])) {
                $date2 = new DateTime($rates[1]['created_at']);
                    } 

            $event_diff = date_diff($date2,$date1);                 //date1 = most recent;  date2 = event prior    SUBTRACTION
            $recent = new DateTime();                               //GIVES A NEW CURRENT OBJECT
                
            $projected_date = date_add($date1,$event_diff);         //ADDS THE MOST RECENT + DAYS BETWEEN THE MOST RECENT AND PRIOR
            $finally = date_diff($date1,$projected_date);           //gives the days remaining, Countdown
            $date_avg = date_diff($recent,$date1);                  //    ((now - most recent)/diff(A-B)) * 100
            
            $date_diff = $event_diff->days;
                if ($date_diff == 0 ) { $date_diff = 1;}
            $date_avg = $date_avg->days;
                if ($date_avg == 0 ) { $date_avg = 1;}

            if (percentages($date_avg,$date_diff) > 80) {
                $div[] = '<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:' . percentages($date_avg,$date_diff) .'%">';
                $faces[] = '<div><img class="faces" src="../assets/img/sad.png" alt="sad" >';
            }

            elseif ((percentages($date_avg,$date_diff) < 79) && (percentages($date_avg,$date_diff)) > 50 ) {
                $div[] = '<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:' . percentages($date_avg,$date_diff) .'%">';
                $faces[] = '<div><img class="faces" src="../assets/img/neutral.jpg" alt="neutral">';
            }

            else {
                $div[] = '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:' . percentages($date_avg,$date_diff) .'%">';
                $faces[] = '<div><img class="faces" src="../assets/img/happy.jpg" alt="happy">';
            }

            $min_date[] = $date1;    
            $last_boom[] = $event_diff;
            $count_down[] = $finally;
            $projected_event[] = $projected_date;
        }

	    $data = array(                                 //(most recent event + (most recent - 2nd most recent)) - now() = count down diff
            'child' => $child,                         //recent - (last_boom + (date1-date2))
            'user' => $user,                                            //(event_diff)
            'projected_event' => $projected_event,     //most recent event - average/diff (event_diff)
            'last_boom' => $last_boom,                 //last boom event by child stored in a for loop
            // 'event_diff' => $event_diff,         //time between the recent and recent prior boom
            'count_down' => $count_down,
            'min_date' => $min_date,
            'div' => $div,
            'faces'=> $faces
            );       

	    $this->load->view('/login', $data);
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
  		redirect('/main/users_profiles');
  	}
//REMOVES A CHILD FROM THE DB
  	public function delete($id) {
  		$this->Scoot->delete($id);
  		redirect('/main/users_profiles');
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
      redirect('/main/select_child/' . $child_id);
    }
//CLEARS ALL SESSION DATA AND LOGS OUT OF THE PROGRAM  		
  	public function reset() {
  		$this->session->sess_destroy();
		redirect("/main/index");	
	}
//REMOVES A PARTICULAR EVENT WHERE THE USER IS THE ORIGINAL EVENT CREATOR
    public function rem_entry($id) {
        $this->Scoot->remove_event_by_id($id);
        redirect('/main/users_profiles');
    }

}

?>
