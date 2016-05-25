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
        redirect('/users_profiles');

      } else {
          $this->session->set_flashdata('error', 'invalid credentials');
          redirect('/index');
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
      		redirect('/index');

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
      	redirect('/users_profiles');
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
            return (($a/$b)*100);
        }

	    $user = $this->session->userdata('user');
	    $child = $this->Scoot->get_children();
        $projected_event = array();             
        $last_boom = array();
        $count_down = array();
        $min_date = array();
        $div = array();
        $faces = array();

        $recent = new DateTime();                                   //GIVES A NEW CURRENT OBJECT

        foreach ($child as $value) {
            $rates = $this->Scoot->get_boom_dates($value['id']);

            if (isset($rates[0])) {
                $date1 = new DateTime($rates[0]['created_at']);
                    } else {
                        $date1 = $recent;
                    }

            if (isset($rates[1])) {
                $date2 = new DateTime($rates[1]['created_at']);
                    } else {
                        $date2 = $recent;
                    }

            $event_diff = date_diff($date2,$date1);                 //date1 = most recent;  date2 = event prior    SUBTRACTION
            // var_dump($event_diff,'event_diff 1st');              //check good, no invert attributes(negative)   
            $pickles = $event_diff->d;
            // var_dump($pickles, 'testing');                
            $projected_date = date_add($date1,$event_diff);         //ADDS THE MOST RECENT + DAYS BETWEEN THE MOST RECENT AND PRIOR
            // var_dump($projected_date,'projected_date');          //check good, all dates are in the future
            $finally = date_diff($recent,date_add($date1,$event_diff));           //gives the days remaining, Countdown (((date1 - date2) +date1) - now())
            // $date_avg = date_diff($recent,$date1);                  //    ((future - now)/diff(A-B)) * 100
            var_dump($finally,'finally');                             
            //    (projected_date - recent) / date1 - date2         (((date1 + (date1-date2)) - recent) / (date1 - date2))*100
            $a = date_diff($recent,date_add($date1,$event_diff));
            $b = date_diff($date2,$date1);


            if ($a->days = 0) { $a->days = 1;}
            if ($b->days = 0) { $b->days = 1;}
                var_dump(percentages($a->days,$b->days));

            if (percentages($a->days,$b->days) > 80) {
                $div[] = '<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:' . percentages($a->days,$b->days) .'%">';
                $faces[] = '<div><img class="faces" src="../assets/img/sad.png" alt="sad" >';
            }

            elseif ((percentages($a->days,$b->days) < 79) && (percentages($a->days,$b->days)) > 50 ) {
                $div[] = '<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:' . percentages($a->days,$b->days) .'%">';
                $faces[] = '<div><img class="faces" src="../assets/img/neutral.jpg" alt="neutral">';
            }

            else {
                $div[] = '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:' . percentages($a->days,$b->days) .'%">';
                $faces[] = '<div><img class="faces" src="../assets/img/happy.jpg" alt="happy">';
            }
        }

	    $data = array(
            'child' => $child,
            'user' => $user,    
            'div' => $div,
            'faces'=> $faces
            );       

	    $this->load->view('/login', $data);
  	}

//CLEARS ALL SESSION DATA AND LOGS OUT OF THE PROGRAM  		
  	public function reset() {
  		$this->session->sess_destroy();
		redirect("/index");	
	}

}

?>
