<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');
session_start();
class Notification extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model('Scoot');	
	}

    public function med_notification1($id) {
        
    var_dump('working');        
    echo "<p> working </p>";
            redirect('/main/select_child/' . $id);
        }
    }

}

?>
